$(document).ready(function () {
    
    $('#form_login').submit(function(event) {
        event.preventDefault();
        form_data = {
            username : $("#txt_username").val(),
            password : $("#txt_password").val(),
        }

        USER.login(form_data);
        
    });
    $('#form_register').submit(function(event) {
        event.preventDefault();
        var username = $("#txt_id_number").val();
        var password = $("#txt_password_register").val();
        var confirm_password = $("#txt_confirm_password").val();
        var user_level = ""

        if(password == confirm_password)
        {
            if($('#rdb_student').is(':checked'))
            {
                user_level = "student";
            }
            else if($('#rdb_teacher').is(':checked'))
            {
                user_level = "teacher";
            }
            var post_data = {
                username   : username,
                password   : password,
                user_level : user_level,
            };
            
            USER.register(post_data);
        }
        else
        {
            
            swal("Password dont match", {
                title: "Error!",
                text: "Password dont match",
                icon: "error",
                button: "OK",
            });
        }
        
    });
 
});

let USER = {
    username : "",
    user_id : 0,
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
                // alert(result)
                if(result == "success")
                {
                    swal("Login Successful", {
                        title: "Success",
                        text: "Login Successful",
                        icon: "success",
                        button: "OK",
                    });
    
                    var protocol = window.location.protocol;
                    var host = window.location.host;
                    setTimeout(function(){
                        window.location.href = `${protocol}//${host}/website/view/Index.php`
                        
                    }, 1000);
                }
                else if(result == "error")
                {
                    swal("Login Failed", {
                        title: "Error",
                        text: "Login Failed",
                        icon: "error",
                        button: "OK",
                    });
                }
                else if(result == "disabled")
                {
                    // alert(result)
                    swal("You are disabled by system admin", {
                        title: "Info",
                        text: "You are disabled by system admin",
                        icon: "warning",
                        button: "OK",
                    });
                }
                else
                {
                    alert(1)
                    swal("Email not yet verified", {
                        title: "Warning",
                        text: "Email not yet verified",
                        icon: "warning",
                        button: "OK",
                    });
                }
                
                
            },
            error: function (e) {

            }
        });
    }, 
    register : function(formData) {
        $.ajax({
            type: "POST",
            url: "../data/UserData.php?action=register",
            data: formData,
            dataType:"json",
            assync : false,
            success: function (result) {
                if(result["type"] == "success")
                {
                    swal(result["type"], {
                        title: "Success",
                        text: result["message"],
                        icon: "success",
                        button: "OK",
                    });
                }
                else if(result["type"] == "error")
                {
                    swal(result["message"], {
                        title: "Error",
                        text: result["message"],
                        icon: "error",
                        button: "OK",
                    });
                }
                
                
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
                    window.location.href = `${protocol}//${host}/website/view/Index.php`
                    
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
                var user_type = result.user_type
                if (result.length == 0) {

                    $("#btn_content").hide();
                    $("#btn_student").hide();
                    $("#btn_teacher").hide();
                    $("#btn_announcement").hide();
                    $("#btn_addmission").hide();
                    $("#btn_logout").hide();
                    $("#btn_stats").hide();
                    $("#btn_background").hide();
                    $("#btn_profile").hide();
                    $("#btn_login").show();
                    USER.user_id = 0;

                    var protocol = window.location.protocol;
                    var host = window.location.host;
                    window.location.href = `${protocol}//${host}/website/view/Index.php`
                    
                }
                else {
                    if(user_type == "admin")
                    {
                        $("#btn_content").show();
                        $("#btn_student").show();
                        $("#btn_teacher").show();
                        $("#btn_announcement").show();
                        $("#btn_addmission").show();
                        $("#btn_stats").show();
                        $("#btn_background").show();
                        $("#btn_profile").show();
                        $("#btn_login").hide();
                        $("#btn_logout").show();
                        
                        USER.fullname = result.fullname;
                        USER.username = result.username;
                        USER.user_level = result.user_level;
                        USER.user_id = result.id;
                        $("#txt_name").html(this.fullname);
                    }
                    else
                    {
                        var protocol = window.location.protocol;
                        var host = window.location.host;
                        window.location.href = `${protocol}//${host}/website/view/Index.php`
                           
                    }
                    


                }
                
 
            },
            error: function (e) {

            }
        });
    }
}