
$(document).ready(function () {
    USER.checkSession();
    STUDENT.getStudents();
    STUDENT.getPrograms();
    STUDENT.getGrades();
    STUDENT.getSemesters();
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
            grade_level  : $("#txt_grade").val(),
            enrollee_id  : $("#txt_passers").val(),
            semester     : $("#txt_semester").val()
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
                    var checked = "";
                    if(data["status"] == 1)
                    {
                        checked = "checked"
                    }
                    row += `
                    <tr>
                        
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="STUDENT.getSpecificEnrollee(${data["enrollee_id"]})">
                            
                                <i class='far fa-eye'></i>
                            </button>
                        </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" class="primary radio_student_status" onchange="STUDENT.updateStudentStatus(${data["id"]})" ${checked}>
                                <span class="slider round"></span>
                            </label>
                        </td>
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
                        <td><a href="../assets/img/enrollees/${data["image"]}" target="_blank"><img src="../assets/img/students/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td>${data["student_number"]}</td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["phone_number"]}</td>
                        <td>${data["program"]}</td>
                        <td>${data["grade_level"]}</td>
                        
                        
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
            success: function (data) {
                result = data[0]
                // console.log(result)
                
                $("#txt_image").val(result.image);
                $("#txt_fname").val(result.first_name);
                $("#txt_mname").val(result.middle_name);
                $("#txt_lname").val(result.last_name);
                $("#txt_address").val(result.address);
                $("#txt_bday").val(result.birthdate);
                $("#txt_email").val(result.email);
                $("#txt_phonenumber").val(result.contact_number);
                $("#txt_program").val(result.program);
                $("#txt_grade").val(result.grade_level);
                $("#txt_semester").val(result.semester);
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
                if(result == "duplicate")
                {
                    swal("Student Already Existing", {
                        title: "Error!",
                        text: result,
                        icon: "warning",
                        button: "OK",
                    });
                }
                else
                {
                    STUDENT.getStudents();
                    $("#txt_fname").val("");
                    $("#txt_mname").val("");
                    $("#txt_lname").val("");
                    $("#txt_address").val("");
                    $("#txt_bday").val("");
                    $("#txt_email").val("");
                    $("#txt_phonenumber").val("");
                    $("#txt_grade").val("");
                    $("#txt_program").val("");
                    swal("Data has been successfully added!", {
                        title: "Success!",
                        text: result,
                        icon: "success",
                        button: "OK",
                    });
                    $("#modal_student_form").modal("hide");
                }
                
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
                console.log(result)
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
                $("#txt_semester_update").val(result.semester);
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
    },
    updateStudentStatus : function(id){
        // data.append('id', STUDENT.id)
        var student_status = 0;
        if($('.radio_student_status').is(':checked')) { student_status = 1; }
        console.log(data)
        $.ajax({
            url: "../data/StudentData.php?action=updateStudentStatus",
            type: "post",
            data: {
                id : id,
                status : student_status
            },
            dataType: "json",
            assync : false, 
            success: function (result) {
                // STUDENT.getStudents();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
            }
        });
    },
    getPrograms: function () {
        $.ajax({
            url: "../data/ProgramData.php?action=getPrograms",
            dataType: "json",
            assync : false,
            success: function (result) {
                var row = `<option value="" disabled selected>Please select a program</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                        <option value="${data["abbreviation"]}">${data["abbreviation"]}</option>
                    `;
                }
                $("#txt_program_update").html(row);
                $("#txt_program").html(row);
            }
        });
    },
    
    getGrades: function () {
        $.ajax({
            url: "../data/GradeData.php?action=getGrades",
            dataType: "json",
            assync : false,
            success: function (result) {
                var row1 = `<option value="" disabled selected>Please Select Grade</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row1 += `
                        <option value="${data["grade"]}">${data["grade_roman_numeral"]}</option>
                    `;
                }
                $("#txt_grade").html(row1);
                $("#txt_grade_update").html(row1);
            }
        });
    },
    
    getSemesters: function () {
        $.ajax({
            url: "../data/SemesterData.php?action=getSemesters",
            assync : false,
            dataType: "json",
            success: function (result) {
                console.log(result);
                var row1 = `<option value="" disabled selected>Please Select Semester</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row1 += `
                        <option value="${data["semester"]}">${data["semester"]}</option>
                    `;
                }
                $("#txt_semester_update").html(row1);
                $("#txt_semester").html(row1);
            }
        });
    },
    getSpecificEnrollee : function(id){
        $.ajax({
            url: "../data/EnrolleeData.php?action=getSpecificEnrollee",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (data) {
                result = data[0];
                otherInfo = data[1];
                var basic_info = `
                <tr>
                    <td><b>Enrollee Photo</b></td>
                    <td><img src="../assets/img/enrollees/${result.image}" alt="Avatar" class="rounded mx-auto d-block"></td>
                </tr>
                <tr>
                    <td><b>Fullname</b></td>
                    <td>${result.last_name}, ${result.first_name} ${result.middle_name}</td>
                </tr>
                <tr>
                    <td><b>Birthday</b></td>
                    <td>${result.birthdate}</td>
                </tr>
                <tr>
                    <td><b>Place of Birth</b></td>
                    <td>${result.place_of_birth}</td>
                </tr>
                <tr>
                    <td><b>Citizenship</b></td>
                    <td>${result.citizenship}</td>
                </tr>
                <tr>
                    <td><b>Address</b></td>
                    <td>${result.address}</td>
                </tr>
                <tr>
                    <td><b>Religion</b></td>
                    <td>${result.religion}</td>
                </tr>
                <tr>
                    <td><b>Sex</b></td>
                    <td>${result.sex}</td>
                </tr>
                `;

                $("#tbl_employee_basic_info_body").html(basic_info);

                var contact_info = `
                <tr>
                    <td><b>Mobile No.</b></td>
                    <td>${result.contact_number}</td>
                </tr>
                <tr>
                    <td><b>Telephone No.</b></td>
                    <td>${result.telephone_number}</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>${result.email}</td>
                </tr>
                `;

                $("#tbl_employee_contact_info_body").html(contact_info);

                
                var course = `
                <tr>
                    <td><b>First Choice</b></td>
                    <td>${result.program}</td>
                </tr>
                <tr>
                    <td><b>Whose choice</b></td>
                    <td>${result.whose_choice1}</td>
                </tr>
                <tr>
                    <td><b>Second Choice</b></td>
                    <td>${result.program2}</td>
                </tr>
                <tr>
                    <td><b>Whose choice</b></td>
                    <td>${result.whose_choice2}</td>
                </tr>
                `;

                $("#tbl_employee_course_body").html(course);

                var otherInfoDetails = '';
                for (let i = 0; i < otherInfo.length; i++) {
                    element = otherInfo[i];
                    otherInfoDetails += `
                        <tr>
                            <td><b>${element.form_label}</b></td>
                            <td>${element.value}</td>
                        </tr>
                    `;
                }
                
                $("#tbl_employee_other_info_body").html(otherInfoDetails);

                $("#modal_enrollee_info").modal();
                // ENROLLEE.id = id;
                // $("#modal_enrollee_form_update").modal("show");
                // $("#txt_fname_update").val(result.first_name);
                // $("#txt_mname_update").val(result.middle_name);
                // $("#txt_lname_update").val(result.last_name);
                // $("#txt_address_update").val(result.address);
                // $("#txt_bday_update").val(result.birthdate);
                // $("#txt_email_update").val(result.email);
                // $("#txt_phonenumber_update").val(result.phone_number);
            }
        });
    },
} 