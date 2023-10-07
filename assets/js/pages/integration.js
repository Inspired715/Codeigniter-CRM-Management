"use strict";

$(document).ready(function () {
    loadData();

    function onSending(lead_id){
        $(".waitting-screen").show();

        $.ajax({
            url: BASE_URL + "exportToCampaign",
            method: "POST",
            data: {
              lead_id: lead_id,
              campaign:$('#filter_campaign').val()
            },
            success: function () {
                loadData();
                $(".waitting-screen").hide();
            }
        })
    }

    window.onSending = onSending

    function loadData(){
        $.ajax({
            url: BASE_URL + "refreshIntegrationTable",
            method: "POST",
            success: function (response) {
                let res = JSON.parse(response);
                let number = 1;
                if(res.status == 200){
                    let html = "";                    
                    res.data.forEach((item) => {
                        html += '<tr>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0 text-center">'+ number +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.first_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">'+ item.last_name +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="mb-0 fw-semibold text-center">'+ item.phone_number +'</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.email + '</h6></td>';
                        html += '<td class="border-bottom-0"><h6 class="fw-semibold mb-0">' + item.full_name + '</h6></td>';
                        html += '<td class="border-bottom-0"><div class="text-center"><span class="badge bg-secondary rounded-3 fw-semibold more pointer" onclick="onSending('+item.id+')">Send</span></div></td>';
                        html += '</tr>';
                        number++;
                    })

                    $('#integration_table').html(html);
                }else{
                    Toast.danger('Error!');
                }
            }
        })
    }

    $('#update_btn').click(function(){
        $(".waitting-screen").show();
        $.ajax({
            url: BASE_URL + "updateFrom",
            method: "POST",
            data: {
                campaign:$('#update_from').val()
            },
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200){
                    Toast.success(res.message);
                }else{
                    Toast.danger(res.message);
                }

                $(".waitting-screen").hide();
            }
        })
    });

    $('#export_all_btn').click(function(){
        $(".waitting-screen").show();
        $.ajax({
            url: BASE_URL + "exportAllToCampaign",
            method: "POST",
            data: {
                campaign:$('#filter_campaign').val()
            },
            success: function (response) {
                let res = JSON.parse(response);
                if(res.status == 200){
                    loadData();
                    Toast.success(res.message);
                }else{
                    Toast.danger(res.message);
                }

                $(".waitting-screen").hide();
            }
        })
    });
});