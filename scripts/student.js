
$(document).ready(function () {
    USER.checkSession();
    STUDENT.getStudents();
    STUDENT.loadEntranceExamPassers();
    $('#txt_passers').on('change', function() {
        STUDENT.getSpecificPasser( this );
    });
    $('#frm_student_add').submit(function(event) {
        event.preventDefault();
        var post_data = {
            image        : $("#txt_image").val(),
            first_name   : $("#txt_fname").val(),
            middle_name  : $("#txt_mname").val(),
            last_name    : $("#txt_lname").val(),
            address      : $("#txt_address").val(),
            birthdate    : $("#txt_bday").val(),
            email        : $("#txt_email").val(),
            phone_number : $("#txt_phonenumber").val(),
            program      : $("#txt_program").val(),
            grade_level  : $("#txt_grade").val()
        }
        STUDENT.insertStudent(post_data)
    });

    
    $('#frm_student_update').submit(function(event) {
        event.preventDefault();
        // var post_data = {
        //     id           : STUDENT.id,
        //     first_name   : $("#txt_fname_update").val(),
        //     middle_name  : $("#txt_mname_update").val(),
        //     last_name    : $("#txt_lname_update").val(),
        //     address      : $("#txt_address_update").val(),
        //     birthdate    : $("#txt_bday_update").val(),
        //     email        : $("#txt_email_update").val(),
        //     phone_number : $("#txt_phonenumber_update").val(),
        //     program      : $("#txt_program_update").val(),
        //     grade_level  : $("#txt_grade").val()
        // }
        // console.log(STUDENT.id)
        STUDENT.updateStudent(this)
    });
});

let STUDENT = {

    //method 
    id : 0,
    getStudents: function () {
        $.ajax({
            url: "../data/StudentData.php?action=getStudents",
            dataType: "json",
            success: function (result) {
                // console.log(result)
                var row = ``;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                    <td><a href="../assets/img/enrollees/${data["image"]}" target="_blank"><img src="../assets/img/students/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td>${data["student_number"]}</td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["phone_number"]}</td>
                        <td>${data["program"]}</td>
                        <td>${data["grade_level"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="STUDENT.getSpecificStudent(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="STUDENT.removeStudent(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_student_body").html(row);
                $('#tbl_student').DataTable();
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
    getSpecificPasser : function(this_){
        $.ajax({
            url: "../data/EnrolleeData.php?action=getSpecificEnrollee",
            dataType: "json",
            data :
            {
                id: this_.value
            },
            type : "post",
            assync: false,
            success: function (result) {
                // console.log(result)
                
                $("#txt_image").val(result.image);
                $("#txt_fname").val(result.first_name);
                $("#txt_mname").val(result.middle_name);
                $("#txt_lname").val(result.last_name);
                $("#txt_address").val(result.address);
                $("#txt_bday").val(result.birthdate);
                $("#txt_email").val(result.email);
                $("#txt_phonenumber").val(result.phone_number);
                $("#txt_program").val(result.program);
                $("#txt_grade").val(result.grade_level);
            }
        });
    },
    removeStudent: function (id) {
        // STUDENT.reset();
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
                    url: "../data/StudentData.php?action=removeStudent",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        STUDENT.getStudents();
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
    insertStudent : function(post_data) {
        
        $.ajax({
            url: "../data/StudentData.php?action=insertStudent",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                STUDENT.getStudents();

                $("#txt_fname").val("");
                $("#txt_mname").val(""),
                $("#txt_lname").val(""),
                $("#txt_address").val(""),
                $("#txt_bday").val(""),
                $("#txt_email").val(""),
                $("#txt_phonenumber").val("")
                swal("Data has been successfully added!", {
                    title: "Success!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
                $("#modal_student_form").modal("hide");
            }
        });
        
    },
    getSpecificStudent : function(id){
        $.ajax({
            url: "../data/StudentData.php?action=getSpecificStudent",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                // console.log(result)
                STUDENT.id = id;
                $("#modal_student_form_update").modal("show");
                $("#txt_id").val(id);
                $("#txt_fname_update").val(result.first_name);
                $("#txt_mname_update").val(result.middle_name);
                $("#txt_lname_update").val(result.last_name);
                $("#txt_address_update").val(result.address);
                $("#txt_bday_update").val(result.birthdate);
                $("#txt_email_update").val(result.email);
                $("#txt_phonenumber_update").val(result.phone_number);
                $("#txt_program_update").val(result.program);
                $("#txt_grade_update").val(result.grade_level);
            }
        });
    },
    updateStudent : function(_this){
        var data = new FormData( _this );
        // data.append('id', STUDENT.id)
        console.log(data)
        $.ajax({
            url: "../data/StudentData.php?action=updateStudent",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                STUDENT.getStudents();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_student_form_update").modal("hide");
            }
        });
    }
} 