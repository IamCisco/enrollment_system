
$(document).ready(function () {
    USER.checkSession();
    TEACHER.getTeachers();
    TEACHER.loadEntranceExamPassers();
    $('#txt_passers').on('change', function() {
        TEACHER.getSpecificPasser( this );
    });
    $('#frm_teacher_add').submit(function(event) {
        event.preventDefault();
        
        TEACHER.insertTeacher(this)
    });

    
    $('#frm_teacher_update').submit(function(event) {
        event.preventDefault();
        var post_data = {
            id_number     : TEACHER.teacher_id,
            first_name    : $("#txt_fname_update").val(),
            middle_name   : $("#txt_mname_update").val(),
            last_name     : $("#txt_lname_update").val(),
            address       : $("#txt_address_update").val(),
            birthdate     : $("#txt_bday_update").val(),
            email         : $("#txt_email_update").val(),
            contact_number: $("#txt_phonenumber_update").val(),
            teacher_level : $("#txt_teacher_level_update").val()
        }
        console.log(post_data)
        TEACHER.updateTeacher(post_data)
    });
});

let TEACHER = {

    //method 
    teacher_id : 0,
    getTeachers: function () {
        $.ajax({
            url: "../data/TeacherData.php?action=getTeachers",
            dataType: "json",
            success: function (result) {
                console.log(result)
                var row = ``;
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                    <td><a href="../assets/img/teachers/${data["image"]}" target="_blank"><img src="../assets/img/teachers/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td>${data["id_number"]}</td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["contact_number"]}</td>
                        <td>${data["teacher_level"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="TEACHER.getSpecificTeacher(${data["id_number"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="TEACHER.removeTeacher(${data["id_number"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_teacher_body").html(row);
                $('#tbl_teacher').DataTable();
            }
        });
    },
    loadEntranceExamPassers: function () {
        $.ajax({
            url: "../data/EnrolleeData.php?action=getPassedEnrollee",
            dataType: "json",
            success: function (result) {
                var options = `<option value="" disabled selected>Please select an enrollee</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    options += `
                        <option value='${data["id"]}'>${data["name"]}</option>
                    `;
                }
                $("#txt_passers").append(options);
            }
        });
    },
    getSpecificTeacher : function(id_number){
        $.ajax({
            url: "../data/TeacherData.php?action=getSpecificTeacher",
            dataType: "json",
            data :
            {
                id_number : id_number
            },
            type : "post",
            assync: false,
            success: function (result) {
                console.log(result)
                
                $("#txt_fname_update").val(result.first_name);
                $("#txt_mname_update").val(result.middle_name);
                $("#txt_lname_update").val(result.last_name);
                $("#txt_address_update").val(result.address);
                $("#txt_bday_update").val(result.birthdate);
                $("#txt_email_update").val(result.email);
                $("#txt_phonenumber_update").val(result.contact_number);
                $("#txt_teacher_level_update").val(result.teacher_level);
                $("#modal_teacher_form_update").modal();
                TEACHER.teacher_id = id_number
            }
        });
    },
    removeTeacher: function (id) {
        // TEACHER.reset();
        swal("Hello world!");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../data/TeacherData.php?action=removeTeacher",
                    data:
                    {
                        id_number: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        TEACHER.getTeachers();
                        swal("Data has been deleted!", {
                            title: "Success!",
                            text: result,
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
              
            } else {
                swal("Data not deleted!", {
                    title: "Cancel",
                    text: "Data no deleted",
                    icon: "info",
                    button: "OK",
                });
            }
          });
    },
    insertTeacher : function(_this) {
        
        $.ajax({
            url: "../data/TeacherData.php?action=insertTeacher",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                if(result =="duplicate")
                {
                
                    $("#txt_title").val("")
                    $("#txt_announcement").val("")
                    $("#txt_validity").val("")
                    swal("ID Number already existing", {
                        title: "Warning",
                        text: result,
                        icon: "warning",
                        button: "OK",
                    });
                }
                else
                {
                    TEACHER.getTeachers();
                    $("#txt_title").val("")
                    $("#txt_announcement").val("")
                    $("#txt_validity").val("")
                    swal("Data has been successfully added!", {
                        title: "Success",
                        text: result,
                        icon: "success",
                        button: "OK",
                    });
                    $("#modal_announcement_form").modal("hide");
                }
                
                
            }
        });
    },
    updateTeacher : function(post_data){
        $.ajax({
            url: "../data/TeacherData.php?action=updateTeacher",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                TEACHER.getTeachers();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_teacher_form_update").modal("hide");
            }
        });
    }
} 