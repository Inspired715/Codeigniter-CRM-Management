"use strict";

$(document).ready(function () {
    // function generateToken(){
    //     if($('#full_name').val() == '' || $('#phone_number').val() == '' || $('#token_email').val() == ''){
    //         Toast.danger('Please input all fields.');
    //         return;
    //     }

    //     $.ajax({
    //         url: BASE_URL + "createToken",
    //         method: "POST",
    //         data: {
    //             full_name: $('#full_name').val(),
    //             phone_number:$('#token_phone').val(),
    //             email:$('#token_email').val()
    //         },
    //         success: function (response) {
    //             let res = JSON.parse(response);
    //             if(res.status == 200){
    //                 let modal = $("#crm-modal");
    //                 modal.hide();
    //                 location.href = 'token';
    //             }else{
    //                 Toast.danger(res.message);
    //             }
    //         }
    //     })
    // }

    // window.generateToken = generateToken

    // $('#create_token').click(function(){
    //     let modal = $("#crm-modal");

    //     let modalTitle = $("#modal_title");
    //     modalTitle.html("Create Token");

    //     let modalBody = $("#modal_body");
    //     let bodyHtml = "";
    //     bodyHtml += `
    //         <div class="mb-3 fit-width">
    //             <label class="form-label">*Full name</label>
    //             <input type="text" class="form-control" id="full_name"/>
    //         </div>
    //         <div class="mb-3 fit-width">
    //             <label class="form-label">*Email</label>
    //             <input type="text" class="form-control" id="token_email"/>
    //         </div>
    //         <div class="mb-3 fit-width">
    //             <label class="form-label">*Phone number</label>
    //             <input type="number" class="form-control" id="token_phone"/>
    //         </div>
    //         <div class="mb-3"><button class="btn btn-primary" style="float:right;margin-right:10px;" onclick="window.generateToken()">Generate</button></div>
    //        `;

    //     modalBody.html(bodyHtml);
    //     modal.show();
    // });
});


