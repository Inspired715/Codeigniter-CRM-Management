"use strict";

$(document).ready(function () {
    var modal = document.getElementById("crm-modal");
    var span = document.getElementById("crm-close");
    
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
    }

    $('#logout_btn').click(function(){
      $.ajax({
        url: BASE_URL + "logout",
        method: "POST",
        success: function () {
          location.href = BASE_URL + 'login';    
        }
    })      
  });
})

