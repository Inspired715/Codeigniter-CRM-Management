"use strict";

$(document).ready(function () {
    loadData();

    function drawChart(series){
        var chart_pie_simple = null;

        var options_simple = {
            series: series,
            chart: {
              width: 380,
              type: "pie",
            },
            colors: ["#13DEB9", "black", "#ffae1f", "#fa896b", "#39b69a", "#6610f2", "#FFAE1F"],
            labels: ["Not interested", "New", "Follow up", "FTD", "Wrong number", "Unqualified", "Money"],
            responsive: [{
              breakpoint: 600,
              options: {
                chart: {
                  width: 300,
                },
                legend: {
                  position: "bottom",
                },
              },
            }, ],
            legend: {
              labels: {
                colors: ["#a1aab2"],
              },
            },
          };
        
          if(chart_pie_simple == null){
            chart_pie_simple = new ApexCharts(
                document.querySelector("#chart-pie-simple"),
                options_simple
              );
          }

          chart_pie_simple.render();

          window.dispatchEvent(new Event('resize'))
    }

    function onEdit(lead_id){
        window.location.href = BASE_URL + 'leads/edit/' + lead_id;
    }

    function onDetail(lead_id){
        $.ajax({
            url: BASE_URL + "getLeadDetail",
            method: "POST",
            data: {
              lead_id: lead_id
            },
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200 && res.data.length > 0){                
                    let modal = $("#crm-modal");
                    
                    let modalTitle = $("#modal_title");
                    modalTitle.html(res.data[0].first_name + " " + res.data[0].last_name);

                    let modalBody = $("#modal_body");
                    let bodyHtml = "";
                    bodyHtml += `
                        <div class="mb-3 fit-width">
                            <label class="form-label">Title</label>
                            <input type="type" class="form-control" value="${res.data[0].title?res.data[0].title:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">Email</label>
                            <input type="type" class="form-control" value="${res.data[0].email?res.data[0].email:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">Web site</label>
                            <input type="type" class="form-control" value="${res.data[0].web_site?res.data[0].web_site:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">Address</label>
                            <input type="type" class="form-control" value="${res.data[0].address?res.data[0].address:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">City</label>
                            <input type="type" class="form-control" value="${res.data[0].city?res.data[0].city:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">State</label>
                            <input type="type" class="form-control" value="${res.data[0].state?res.data[0].state:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">Country</label>
                            <input type="type" class="form-control" value="${res.data[0].country?res.data[0].country:''}">
                        </div>
                        <div class="mb-3 fit-width">
                            <label class="form-label">FTD date</label>
                            <input type="type" class="form-control" value="${res.data[0].ftd_date?res.data[0].ftd_date:''}">
                        </div>`;

                    res.data.forEach((item) => {
                        bodyHtml += `
                        <div class="mb-3 fit-width">
                            <label class="form-label">${item.sub_name}</label>
                            <input type="type" class="form-control" value="${item.sub_value}">
                        </div>`;
                    })

                    modalBody.html(bodyHtml);
                    modal.show();
                }
                else
                    Toast.warning('There is no data!');
            }
        })
    }

    window.onDetail = onDetail
    window.onEdit = onEdit

    function loadData(){
        $(".waitting-screen").show();
        $.ajax({
            url: BASE_URL + "refreshLeadTable",
            method: "POST",
            data: {
              status: $('#filter_status').val(),
              createdBy: $('#filter_created').val(),
              from_date: $('#from_date').val(),
              to_date: $('#to_date').val()
            },
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200){
                    let html = "";
                    let notCnt=0,newCnt=0,followCnt=0,ftdCnt=0,wrongCnt=0,unqCnt=0,moneyCnt=0;
                    let number = 1;
                    res.data.forEach((item) => {
                        html += '<tr>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0 text-center">'+ number +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.first_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.last_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><div class="text-center">';
                        switch(item.status){
                            case "1":
                                html += '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                                notCnt ++;
                                break;
                            case "2":
                                html += '<span class="badge bg-success rounded-3 fw-semibold text-center">Follow up</span>';
                                followCnt++;
                                break;
                            case "3":
                                html += '<span class="badge bg-danger rounded-3 fw-semibold text-center">Ftd</span>';
                                ftdCnt++;
                                break;
                            case "4":
                                html += '<span class="badge bg-dark rounded-3 fw-semibold text-center">Wrong number</span>';
                                wrongCnt++;
                                break;
                            case "5":
                                html += '<span class="badge bg-warning rounded-3 fw-semibold text-center">Unqualified</span>';
                                unqCnt++;
                                break;
                            case "6":
                                html += '<span class="badge bg-secondary rounded-3 fw-semibold text-center">New</span>';
                                newCnt++;
                                break;
                            case "7":
                                html += '<span class="badge bg-info rounded-3 fw-semibold text-center">Money</span>';
                                moneyCnt++;
                                break;
                            default:
                                html += '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                                notCnt++;
                        }
                        html += "</div></td>";
                        html += '<td class="border-bottom-0"><h6 class="mb-0 fw-semibold text-center">'+ item.phone_number +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0 text-center">' + item.country + '</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.email + '</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.created_by + '</h6></td>';
                        if(view == 1){
                            html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.campaign + '</h6></td>';
                        }
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0 text-center">' + item.created_date + '</h6></td>';
                        html += '<td class="border-bottom-0"><div class="text-center"><i class="ti ti-help pointer" onclick="onDetail('+item.id+')"></i>';
                        if(view == 1){
                            html += '<i class="ti ti-edit pointer" onclick="onEdit('+item.id+')"></i>'
                        }
                        html += "</div></td></tr>";

                        number ++;
                    })

                    $('#lead_table').html(html);
                    drawChart(new Array(notCnt, newCnt, followCnt, ftdCnt, wrongCnt, unqCnt, moneyCnt))

                    $(".waitting-screen").hide();
                }else{
                    Toast.danger('Error!');
                }
            }
        })
    }

    $('#search_btn').click(function(){
        loadData();
    });
});