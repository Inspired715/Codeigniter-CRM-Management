"use strict";

$(document).ready(function () {
    function drawChart(series, total, real){
        var chart_pie_simple = null;
        var options = {
            series: [{
            name: 'Count',
            data: series
          }],
            chart: {
            height: 350,
            type: 'bar',
          },
          plotOptions: {
            bar: {
              borderRadius: 10,
              dataLabels: {
                position: 'center', // top, center, bottom
              },
            }
          },
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              if(total == 0)
                return '0 %';
              else
                return Math.round(val / total * 100) + " %";
            },
            offsetY: -20,
            style: {
              fontSize: '12px',
              colors: ["white"]
            }
          },
          
          xaxis: {
            categories: ["FTD", "Not interested", "New", "Wrong number", "Unqualified", "Call later", "Duplicated"],
            position: 'top',
            axisBorder: {
              show: true
            },
            axisTicks: {
              show: true
            },
            tooltip: {
              enabled: true,
            },
            labels: {
                style: {
                    colors: '#5d87ff' // Specify your desired font color here
                }
            }
          },
          yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: false,
              formatter: function (val) {
                return val;
              }
            }
          
          },
          title: {
            text: 'Total: ' + total + ', Success:' + real,
            floating: true,
            offsetY: 325,
            align: 'center',
            style: {
              color: '#5d87ff',
              fontSize:'20px'
            }
          }
          };
        
          if(chart_pie_simple == null){
            chart_pie_simple = new ApexCharts(
                document.querySelector("#chart-pie-simple"),
                options
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

    $('#search_btn').click(function(){
        dataTable.ajax.reload();
    });

    var dataTable = $('#lead_table').DataTable({
      "paging":true,
      "processing":true,
      "serverSide":false,
      "ordering": false,
      "autoWidth": false,
      "columns": [
        { "data": "first_name", 'width':'200px'},
        { "data": "last_name"},
        { "data": "status",
          render(data, type, row, meta){
            switch(data){
              case "1":
                  return '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                  break;
              case "2":
                  return '<span class="badge bg-success rounded-3 fw-semibold text-center">Follow up</span>';
                  break;
              case "3":
                  return '<span class="badge bg-danger rounded-3 fw-semibold text-center">Ftd</span>';
                  break;
              case "4":
                  return '<span class="badge bg-dark rounded-3 fw-semibold text-center">Wrong number</span>';
                  break;
              case "5":
                  return '<span class="badge bg-warning rounded-3 fw-semibold text-center">Unqualified</span>';
                  break;
              case "6":
                  return '<span class="badge bg-secondary rounded-3 fw-semibold text-center">New</span>';
                  break;
              case "7":
                  return '<span class="badge bg-info rounded-3 fw-semibold text-center">Call later</span>';
                  break;
              case "88":
                  return '<span class="badge bg-dark rounded-3 fw-semibold text-center">Duplicate</span>';
                  break;
              case "99":
                  return '<span class="badge bg-dark rounded-3 fw-semibold text-center">Incomplete</span>';
                  break;
              default:
                  return '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
            }
          }
        },
        { "data": "phone_number"},
        { "data": "country"},
        { "data": "email"},
        { "data": "created_by"},
        { "data": "campaign",
          render(data, type, row, meta){
            let campagin = data;
            if(campagin.length > 0){
                if(view != 1){
                    campagin = "Success"
                }
            }
            return campagin;
          }
        },
        { "data": "created_date"},
        { "data": "id", 
          render(data, type, row,meta){
            let html = '';
            html = '<div class="text-center"><i class="ti ti-help pointer" onclick="onDetail('+data+')"></i>';
            if(view == 1){
                html += '<i class="ti ti-edit pointer" onclick="onEdit('+data+')"></i>'
            }
            html += "</div>";
            return html;
          }
        }
      ],
      "ajax":{
          url: BASE_URL + "refreshLeadTable",
          type:"POST",
          "data": function ( d ) {
              d.status = $('#filter_status').val();
              d.createdBy = $('#filter_created').val();
              d.from_date = $('#from_date').val();
              d.to_date = $('#to_date').val();
              d.country = $('#filter_country').val();
          }
      },
      "drawCallback": function(settings, json) {
        let notCnt=0,newCnt=0,followCnt=0,wrongCnt=0,unqCnt=0,moneyCnt=0,incompCnt=0, ftdCnt=0, dupCnt=0,number=0;
        let aoData = settings.aoData;
        aoData.forEach(data => {
          let item = data._aData;
          switch(item.status){
            case "1":
                notCnt ++;
                break;
            case "2":
                followCnt++;
                break;
            case "3":
                ftdCnt++;
                break;
            case "4":
                wrongCnt++;
                break;
            case "5":
                unqCnt++;
                break;
            case "6":
                newCnt++;
                break;
            case "7":
                moneyCnt++;
                break;
            case "88":
                dupCnt++;
                break;
            case "99":
                incompCnt++;
                break;
            default:
                notCnt++;
          }

          number ++;
        })
        
        drawChart(new Array(ftdCnt, notCnt, newCnt, wrongCnt, unqCnt, moneyCnt, dupCnt), number, number-incompCnt-dupCnt)
    }
   });
});