$(document).ready(function () {
    USER.checkSession();
    
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
    username : "",
    user_level : "",
    fullname : "",
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

                var protocol = window.location.protocol;
                var host = window.location.host;
                setTimeout(function(){
                    window.location.href = `${protocol}//${host}/enrollment-system/view/index.php`
                    
                }, 1000);
                
            },
            error: function (e) {

            }
        });
    }, 
    logout : function(formData) {
        $.ajax({
            type: "POST",
            url: "../data/UserData.php?action=logout",
            data: formData,
            dataType:"json",
            assync : false,
            success: function (result) {
                swal(result, {
                    title: "Good bye!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                var protocol = window.location.protocol;
                var host = window.location.host;
                setTimeout(function(){
                    window.location.href = `${protocol}//${host}/enrollment-system/view/index.php`
                    
                }, 1000);
            },
            error: function (e) {

            }
        });
    },
    checkSession : function() {
        $.ajax({
            type: "POST",
            url: "../data/UserData.php?action=checkSession",
            dataType:"json",
            assync : false,
            success: function (result) {
                if(result.length == 0)
                {
                    $("#btn_content").hide();
                    $("#btn_student").hide();
                    $("#btn_announcement").hide();
                    $("#btn_addmission").hide();
                    $("#btn_logout").hide();
                    $("#btn_login").show();
                }
                else
                {
                    $("#btn_content").show();
                    $("#btn_student").show();
                    $("#btn_announcement").show();
                    $("#btn_addmission").show();
                    $("#btn_logout").show();
                    $("#btn_login").hide();
                    this.fullname = result.fullname;
                    this.username = result.username;
                    this.user_level = result.user_level;
                    
                    
                    $("#txt_name").html(this.fullname);
                }
                
 
            },
            error: function (e) {

            }
        });
    }
}