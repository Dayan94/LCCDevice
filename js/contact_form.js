      $('#admin_request_modal').submit(function(event){
        event.preventDefault();  
        var name = $('#admin_request_modal .name').val();  
        var address = $('#admin_request_modal .address').val();  
        var phone = $('#admin_request_modal .phone').val();  
        var email = $('#admin_request_modal .email').val();  
        var password1 = $('#admin_request_modal .password1').val();  
        var password2 = $('#admin_request_modal .password2').val();  
        if(password1 == password2)  
        {  
          $.ajax({  
           url:"insert_user_data.php",  
           method:"POST",  
           data: {submit_admin_request: 'submit', name: name, address: address, phone: phone, email: email, password: password1, comment: 'no comment'},  
           success:function(data)  
           { 
            var result = $.trim(data);
            if(result == 'success')
            {
              $('#admin_request_modal .alert.alert-danger').hide();
              $('#admin_request_modal button[name="submit"]').html('sent');
              $('#admin_request_modal .alert.alert-success').show();
              $('#admin_request_modal .alert.alert-success').html('Request is sent. You will be mailed about your request is accepted or not. Thank You!');
              window.setTimeout(function(){window.location = window.location},2000);   
              
            }
            else 
            {
              $('#admin_request_modal .alert.alert-danger').show();
              $('#admin_request_modal .alert.alert-danger').html(result);   

            }
          }  
        });  
        }  
        else 
        {  
         $('.alert.alert-danger').html("Both Password should be matched");  
       }  
     });