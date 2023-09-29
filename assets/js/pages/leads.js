"use strict";

$(document).ready(function () {
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
                            <input type="type" class="form-control" value="${res.data[0].country?res.data[0].ftd_date:''}">
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

    $('#search_btn').click(function(){
        $.ajax({
            url: BASE_URL + "refreshLeadTable",
            method: "POST",
            data: {
              status: $('#filter_status').val(),
              createdBy: $('#filter_created').val()
            },
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200){
                    let html = "";
                    res.data.forEach((item) => {
                        html += '<tr>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.first_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.last_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><div class="text-center">';
                        switch(item.status){
                            case "1":
                                html += '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                                break;
                            case "2":
                                html += '<span class="badge bg-success rounded-3 fw-semibold text-center">Follow up</span>';
                                break;
                            case "3":
                                html += '<span class="badge bg-danger rounded-3 fw-semibold text-center">Ftd</span>';
                                break;
                            case "4":
                                html += '<span class="badge bg-dark rounded-3 fw-semibold text-center">Wrong number</span>';
                                break;
                            case "5":
                                html += '<span class="badge bg-warning rounded-3 fw-semibold text-center">Unqualified</span>';
                                break;
                            case "6":
                                html += '<span class="badge bg-secondary rounded-3 fw-semibold text-center">New</span>';
                                break;
                            case "7":
                                html += '<span class="badge bg-info rounded-3 fw-semibold text-center">Money</span>';
                                break;
                            default:
                                html += '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                        }

                        html += '<td class="border-bottom-0"><h6 class="mb-0 fw-semibold text-center">'+ item.phone_number +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.email + '</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.created_by + '</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0 text-center">' + item.created_date + '</h6></td>';
                        html += '<td class="border-bottom-0"><div class="text-center"><span class="badge bg-secondary rounded-3 fw-semibold more pointer" onclick="onDetail('+item.id+')">More</span></div></td>';
                        html += "</div></td>";
                    })

                    $('#lead_table').html(html);
                }else{
                    Toast.danger('Error!');
                }
            }
        })
    });
});