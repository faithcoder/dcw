/**
 * Created by FaithCoder on 30-Jun-22.
 */

$(document).ready(function() {

    const site_url = "http://localhost/dcw/";

    $('#showSignUpForm').click(function() {
        $('#login-form-box').hide();
        $('#register-form-box').show();
    });

    $('#showSignInForm').click(function() {
        $('#register-form-box').hide();
        $('#login-form-box').show();
    });

    $('#showForgetPassword').click(function() {
        $('#login-form-box').hide();
        $('#forgotten-form-box').show();
    });
    $('#back').click(function() {
        $('#forgotten-form-box').hide();
        $('#login-form-box').show();
    });

    $('#registerUser').click(function(e) {
        if ($('#register-form')[0].checkValidity()) {
            e.preventDefault(); //it's prevent default loading form submission

            $('#registerUser').val("Loading...").attr("disabled", true);

            //validation

            if ($("#name").val() === "") { //name field validation
                $("#name").addClass("is-invalid");
            } else {
                $("#name").removeClass("is-invalid");
            }

            if ($("#email").val() === "") { // email field validation
                $("#email").addClass("is-invalid");
            } else {
                $("#email").removeClass("is-invalid");
            }

            if ($("#r_password").val() === "") { // password field validation
                $("#r_password").addClass("is-invalid");
            } else {
                $("#r_password").removeClass("is-invalid");
            }

            if ($('#r_password').val() !== $('#c_password').val()) { // confirm password field validation
                $("#c_password").addClass("is-invalid");
            } else {
                $("#c_password").removeClass("is-invalid");
            }

            if ($('#r_password').val() === $('#c_password').val()) {
                if ($('#name').val() !== ' ' && $('#email').val() !== '') {
                    $.ajax({
                        url: site_url + 'admin/action.php' ,
                        method:'post',
                        data:$('#register-form').serialize()+'&action=register',
                        success: function (response) {
                            if(response === 'ok'){
                                window.location = 'dashboard.php';
                            }else{
                                $('#displayError').html(response);
                            }

                            //$('#register-form')[0].reset();
                        }
                    })
                }
            } else {
                //$('.passerror').html('Wrong Password');
            }

            $('#registerUser').val("Register").attr("disabled", false);

        }
    });

    $('#loginBtn').click(function (e) {
       if($('#login-form')[0].checkValidity()){
            e.preventDefault();
            $('#loginBtn').val("Processing...").attr('disabled', true);

           $.ajax({
               url: site_url + 'admin/action.php' ,
               method:'post',
               data:$('#login-form').serialize()+'&action=login',
               success: function (response) {
                   $('#loginBtn').val("Sign In").attr('disabled', false);
                   if(response === 'ok'){
                       window.location = 'dashboard.php';
                   }else{
                       $('#loginError').html(response);
                   }
                   //$('#register-form')[0].reset();
               }
           })
       }
    });

    $('#resetPassword').click(function (e) {
       if($('#forgotten-form')[0].checkValidity()){
            e.preventDefault();
            $('#resetPassword').val("Processing...").attr('disabled', true);

           $.ajax({
               url: site_url + 'admin/action.php' ,
               method:'post',
               data:$('#forgotten-form').serialize()+'&action=resetPassword',
               success: function (response) {
                   $('#resetPassword').val("Reset Password").attr('disabled', false);
                   $('#resetPasswordError').html(response);

                   //$('#register-form')[0].reset();
               }
           })
       }
    });
});