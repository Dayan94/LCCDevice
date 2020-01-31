  $(document).ready(function() {
    $('.alert.alert-danger').hide();
    $('.alert.alert-success').hide();

      // this function is to initialize duration of animation on scroll
      AOS.init({
        duration: 1000
      });

      // this is to make scroll up button work slowly
      $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
      });

      /*Scroll to top when arrow up clicked BEGIN*/
      $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 50) {
          $('#back2Top').fadeIn();
        } else {
          $('#back2Top').fadeOut();
        }
      });
      /*Scroll to top when arrow up clicked END*/
      $('#loginModal').submit(function(event){  
        event.preventDefault();
        var email = $('#loginModal .email').val();  
        var password = $('#loginModal .password').val();  
        $.ajax({  
         url:"admin_login.php",  
         method:"POST",  
         data: {admin_login: true, email:email, password:password},  
         success:function(data)  
         { 
          var result = $.trim(data);
          if(result == 'success')  
          {  
           $('#loginModal .alert.alert-danger').hide();
           $('#loginModal .alert.alert-success').show();
           $('#loginModal button[name="login_button"]').html('logging in');  
           $('#loginModal .alert.alert-success').html("Login Successful!");
           window.setTimeout(function(){window.location = window.location},1000); 
         }  
         else  
         {  
           $('#loginModal .alert.alert-danger').show();
           $('#loginModal .alert.alert-danger').html(data); 
         }  
       }  
     }); 
      }); 

      var verify_admin_modal_original_state = $('#verify_admin_modal').clone();
      // console.log(verify_admin_modal_original_state); 

      $('#verify_admin_modal').submit(function(event){  
        event.preventDefault();  
        var password = $('#verify_admin_modal .password').val();  
        var email = $('#verify_admin_modal .admin_email').html();  
        $.ajax({  
         url:"admin_login.php",  
         method:"POST",  
         data: {verify_admin: true, email:email, password:password},  
         success:function(data)  
         { 
          var result = $.trim(data);
          if(result == 'success')  
          {  
           $('#verify_admin_modal .alert.alert-danger').hide();
           $('#verify_admin_modal .alert.alert-success').show();
           $('#verify_admin_modal button[name="login_button"]').html('verifed');   
           $('#verify_admin_modal .alert.alert-success').html("Verification Successful!"); 
           $('#verify_admin_modal').replaceWith(verify_admin_modal_original_state.clone());
           $('#verify_admin_modal').replaceWith(verify_admin_modal_original_state);
           // setTimeout( function(){$('#verify_admin_modal').modal('hide')} , 1000);
           setTimeout( function(){ $('#modal_edit_admin_profile').modal('show')} , 1000);

           var admin_email = $('#modal_edit_admin_profile .email').val();
           $.ajax({  
            url:"fetch_table_row.php",  
            method:"POST",  
            data:{fetch_admin_profile: true, admin_email: admin_email}, 
            success:function(data){ 
                  // console.log(data);
                  $('#modal_edit_admin_profile  .name').val(data.Name);  
                  $('#modal_edit_admin_profile  .address').val(data.Address);  
                  $('#modal_edit_admin_profile .phone').val(data.Phone);  
                  $('#modal_edit_admin_profile .password1').val(data.Password); 
                  $('#modal_edit_admin_profile .password2').val(data.Password); 
                }  
              });

           // $('#verify_admin_modal button[name="login_button"]').html('verify'); 
         }  
         else  
         {  
           $('#verify_admin_modal .alert.alert-danger').show();
           $('#verify_admin_modal .alert.alert-danger').html(data); 
         }  
       }  
     }); 
      }); 



      $('#edit_admin_profile_form').submit(function(event){  
       event.preventDefault();   
       var password1 = $('#edit_admin_profile_form .password1').val();  
       var password2 = $('#edit_admin_profile_form .password2').val();
       if(password1 == password2)
       {
         var name = $('#edit_admin_profile_form .name').val();  
         var address = $('#edit_admin_profile_form .address').val();  
         var phone = $('#edit_admin_profile_form .phone').val();  
         var email = $('#edit_admin_profile_form .email').val();

         $.ajax({  
          url:"edit_admin_profile.php",  
          method:"POST",   
          data: {
            edit_admin_profile: true, 
            name: name, 
            address: address,
            phone: phone, 
            email: email, 
            password: password1
          },  
          success:function(data)  
          { 
            var result = $.trim(data);
            if(result == 'success')
            {
              $('#modal_edit_admin_profile .alert.alert-danger').hide();
              $('#modal_edit_admin_profile button[name="submit"]').html('Edited');
              $('#modal_edit_admin_profile .alert.alert-success').show();
              $('#modal_edit_admin_profile .alert.alert-success').html('Admin Profile Edited Successfully!');
              window.setTimeout(function(){window.location = window.location},1000);   

            }
            else 
            {
              $('#modal_edit_admin_profile .alert.alert-danger').show();
              $('#modal_edit_admin_profile .alert.alert-danger').html(result);   

            }
          }   
        }); 
       }
       else {  
        $('#modal_edit_admin_profile .alert.alert-danger').show();
        $('#modal_edit_admin_profile .alert.alert-danger').html("Both Password should be matched");  
      }  

    });

      $('#modal_edit_admin_profile button[data-dismiss="modal"]').click(function(){
        window.location = window.location;

      });

      $('#logout').click(function(){  

       $.ajax({  
        url:"admin_login.php",  
        method:"POST",  
        data:{logout:"logout"},  
        success:function()  
        {  
         window.location = window.location; 
       }  
     });  
     });

      $('#forget_password').click(function(){
        $('#loginModal').hide();
      });

      $('#close_get_password_by_mail_modal').click(function(){
        $('#loginModal').show();
      });

      $('#get_password_by_mail_modal').submit(function(event){
        event.preventDefault();
        var email = $('#get_password_by_mail_modal .email').val();
        // alert(admin_mail_for_sending_password);

        $.ajax({  
         url:"admin_login.php",  
         method:"POST",  
         data:{send_password: true, email: email},   
         success:function(data)  
         { 
          var result = $.trim(data);
          if(result == 'success')
          {
            $('#get_password_by_mail_modal .alert.alert-danger').hide();
            $('#get_password_by_mail_modal button[name="submit"]').html('sent');
            $('#get_password_by_mail_modal .alert.alert-success').show();
            $('#get_password_by_mail_modal .alert.alert-success').html('Your Password has been sent to your Email ID');
            window.setTimeout(function(){window.location = window.location},1000);   

          }
          else 
          {
            $('#get_password_by_mail_modal .alert.alert-danger').show();
            $('#get_password_by_mail_modal .alert.alert-danger').html(result);   

          }

        }  
      });  

      });


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
           url:"submit_admin_request.php",  
           method:"POST",  
           data: {submit_admin_request: 'submit', name: name, address: address, phone: phone, email: email, password: password1},  
           success:function(data)  
           { 
            var result = $.trim(data);
            if(result == 'success')
            {
              $('#admin_request_modal .alert.alert-danger').hide();
              $('#admin_request_modal button[name="submit"]').html('sent');
              $('#admin_request_modal .alert.alert-success').show();
              $('#admin_request_modal .alert.alert-success').html('Request is sent. You will be mailed about your request is accepted or not. Thank You!');
              window.setTimeout(function(){window.location = window.location},1000);   
              
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
          $('#admin_request_modal .alert.alert-danger').show();
          $('admin_request_modal .alert.alert-danger').html("Both Password should be matched");  
        }  
      }); 

      $('#account_delete_modal .delete').click(function(){
        var email = $('#account_delete_modal .hidden_input').val();
           $.ajax({  
           url:"delete_table_row.php",  
           method:"POST",  
           data: {delete_admin_account: true, email: email},  
           success:function(data)  
           { 
              console.log(data);
              $('account_delete_modal #delete_admin').html("Deleting"); 
              window.setTimeout(function(){window.location = window.location},1000);
          }  
        });  
      });

    }); 