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
                        
                    }, 1000);s
                }
                else
                {
                    swal("Login Failed", {
                        title: "Error",
                        text: "Login Failed",
                        icon: "error",
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
                        text: result["type"],
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
                if(result.length == 0)
                {
                    $("#btn_content").hide();
                    $("#btn_student").hide();
                    $("#btn_teacher").hide();
                    $("#btn_announcement").hide();
                    $("#btn_addmission").hide();
                    $("#btn_logout").hide();
                    $("#btn_stats").hide();
                    $("#btn_login").show();
                    var protocol = window.location.protocol;
                    var host = window.location.host;
                    window.location.href = `${protocol}//${host}/website/view/Index.php`
                }
                else
                {
                    $("#btn_content").show();
                    $("#btn_student").show();
                    $("#btn_teacher").show();
                    $("#btn_announcement").show();
                    $("#btn_addmission").show();
                    $("#btn_logout").show();
                    $("#btn_stats").show();
                    $("#btn_login").hide();
                    this.fullname = result.fullname;
                    this.username = result.username;
                    this.user_level = result.user_level;
                    this.user_id = result.id;
                    
                    
                    $("#txt_name").html(this.fullname);
                }
                
 
            },
            error: function (e) {

            }
        });
    }
}