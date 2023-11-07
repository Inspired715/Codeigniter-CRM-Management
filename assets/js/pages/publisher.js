$(document).ready(function(){
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
        return [...document.querySelectorAll(el)]
        } else {
        return document.querySelector(el)
        }
    }
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }
    let selectHeader = select('#header')
    if (selectHeader) {
        let headerOffset = selectHeader.offsetTop
        let nextElement = selectHeader.nextElementSibling
        const headerFixed = () => {
        if ((headerOffset - window.scrollY) < 0) {
            selectHeader.classList.add('fixed-top')
        } else {
            selectHeader.classList.remove('fixed-top')
        }
        }
        window.addEventListener('load', headerFixed)
        onscroll(document, headerFixed)
    }
    
    
    $("#submit_lead").submit(function(event){
        event.preventDefault();
          $.ajax({
              url: BASE_URL + "sendLead",
              method: "POST",
              data: $('#submit_lead').serialize(),
              success: function (response) {
                response = JSON.parse(response);
                if(response.status == "success"){
                    alert("Successfuly submited.");
                }else{
                    alert('Captcha error');
                }
              }
          });
      });
    
      $('.input-phone').intlInputPhone();
})
