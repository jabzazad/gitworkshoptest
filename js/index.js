$(function () { $('#mainform').submit(function (event) { 
    console.log("OnSubmit")
    var form = $('#mainform')[0]; 
    if (form.checkValidity() === false) {
         event.preventDefault(); 
        }
         $(this).addClass('was-validated'); 
        }); 
    });