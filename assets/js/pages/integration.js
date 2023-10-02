"use strict";

$(document).ready(function () {
    loadData();

    function onSending(lead_id){
        $.ajax({
            url: BASE_URL + "DD",
            method: "POST",
            data: {
              lead_id: lead_id
            },
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200 && res.data.length > 0){                
                    
                }
                else
                    Toast.warning('There is no data!');
            }
        })
    }

    window.onDetail = onSending

    function loadData(){
        $.ajax({
            url: BASE_URL + "refreshIntegrationTable",
            method: "POST",
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200){
                    let html = "";                    
                    res.data.forEach((item) => {
                        html += '<tr>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.first_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.last_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="mb-0 fw-semibold text-center">'+ item.phone_number +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.email + '</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.full_name + '</h6></td>';
                        html += '<td class="border-bottom-0"><div class="text-center"><span class="badge bg-secondary rounded-3 fw-semibold more pointer" onclick="onSending('+item.id+')">Send</span></div></td>';
                        html += '</tr>';
                    })

                    $('#integration_table').html(html);
                }else{
                    Toast.danger('Error!');
                }
            }
        })
    }
});