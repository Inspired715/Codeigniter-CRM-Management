"use strict";

$(document).ready(function () {
    $('.more').click(function(){
        let lead_id = $(this)[0].dataset.lid;
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
    })
});