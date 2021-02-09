
$(document).ready(function () {
    INDEX.checkSessionHome();
    setTimeout(function(){
        
        PROFILE.loadUserProfile();
    }, 1000);
    $('#frm_update_profile').submit(function(event) {
        event.preventDefault();
        PROFILE.updateProfile(this)
    });
});

let PROFILE = {

    //method 
    first_name : "",
    middle_name : "",
    last_name : "",
    email : "",
    loadUserProfile: function () {
        $.ajax({
            url: "../data/UserData.php?action=loadUserProfile",
            data: {
                id : INDEX.user_id
            },
            dataType: "json",
            type: "post",
            // assync : false,
            success: function (result) {
                $("#lbl_name").html(`${result.first_name} ${result.middle_name} ${result.last_name}`)
                $("#lbl_email").html(`<i class="fa fa-envelope user-profile-icon"></i>${result.email}`)
                $("#img_avatar").attr("src",`../assets/img/${result.image}`);

                PROFILE.first_name = result.first_name;
                PROFILE.middle_name = result.middle_name;
                PROFILE.last_name = result.last_name;
                PROFILE.email = result.email;
            }
        });
    },
    editProfile : function () {
        $("#txt_fname").val(PROFILE.first_name);
        $("#txt_mname").val(PROFILE.middle_name);
        $("#txt_lname").val(PROFILE.last_name);
        $("#txt_email").val(PROFILE.email);
    },
    updateProfile : function (_this) {
        $.ajax({
            url: "../data/UserData.php?action=updateProfile",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                PROFILE.loadUserProfile();
                $("#txt_fname").val("");
                $("#txt_mname").val("");
                $("#txt_lname").val("");
                $("#txt_email").val("");
                $("#file_image").val("");
                swal(result.message, {
                    title: result.title,
                    text: result.message,
                    icon: result.status,
                    button: "OK",
                });
                $("#modal_enrollee_form").modal("hide");
            }
        });
    }
} 