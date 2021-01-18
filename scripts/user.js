$(document).ready(function () {
 
    $('#form_login').submit(function(event) {
        event.preventDefault();
        form_data = {
            username : $("#txt_username").val(),
            password : $("#txt_password").val(),
        }

        USER.login(form_data);
 
    });
 
});

let USER = {
    login : function(formData) {
        $.ajax({
            type: "POST",
            url: "../data/UserData.php?action=login",
            data: formData,
            dataType:"json",
            assync : false,
            success: function (result) {
                swal(result, {
                    title: "Good job!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
 
            },
            error: function (e) {

            }
        });
    }
}