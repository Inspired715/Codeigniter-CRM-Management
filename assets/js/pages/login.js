"use strict";

$(document).ready(function () {
    $('#login-btn').click(function(){
        $.ajax({
            url: BASE_URL + "authCheck",
            method: "POST",
            data: {
              username: $('#username').val(),
              password: $('#password').val()
            },
            success: function (response) {
              if(response == 200){
                Toast.success('Success! User verified.');
                location.href = BASE_URL + 'leads';
              }
              else
                Toast.danger('Invalid User!');
            }
        }) 
    })    
});