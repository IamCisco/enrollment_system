
$(document).ready(function () {
    
    ENROLLEE.getEnrolleesForAccept();
    ENROLLEE.getEnrolleesForExam();
    ENROLLEE.getPrograms();
    ENROLLEE.getGrades();
    ENROLLEE.getSemesters();
    ENROLLEE.getRequirements();

    $('#frm_enrollee_add').submit(function(event) {
        event.preventDefault();
        ENROLLEE.insertEnrollee(this)
    });

    
    $('#frm_enrollee_update').submit(function(event) {
        event.preventDefault();
        var post_data = {
            id           : ENROLLEE.id,
            first_name   : $("#txt_fname_update").val(),
            middle_name  : $("#txt_mname_update").val(),
            last_name    : $("#txt_lname_update").val(),
            address      : $("#txt_address_update").val(),
            birthdate    : $("#txt_bday_update").val(),
            email        : $("#txt_email_update").val(),
            phone_number : $("#txt_phonenumber_update").val()
        }
        console.log(ENROLLEE.id)
        ENROLLEE.updateEnrollee(post_data)
    });
});

let ENROLLEE = {

    //method 
    id : 0,
    getEnrolleesForAccept: function () {
        $.ajax({
            url: "../data/EnrolleeData.php?action=getEnrolleesForAccept",
            dataType: "json",
            success: function (result) {
                rowCount = $('#tbl_enrollee_accept_body tr').length;

                if(rowCount > 0)
                {
                    $('#tbl_enrollee_accept').DataTable().destroy();
                }
                var row = ``;
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        <td>
                            <button type="button"class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View" style='font-size:24px' onclick="ENROLLEE.getSpecificEnrollee(${data["id"]})">
                            
                                <i class='fas fa-eye'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Accept" style='font-size:24px' onclick="ENROLLEE.acceptEnrollee(${data["id"]})">
                            
                                <i class='fas fa-check'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm data-toggle="tooltip" data-placement="top" title="Reject" style='font-size:24px' onclick="ENROLLEE.rejectEnrollee(${data["id"]})">
                            
                                <i class='fas fa-times'></i>
                            </button>
                        </td>
                        <td><a href="../assets/img/enrollees/${data["image"]}" target="_blank"><img src="../assets/img/enrollees/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td><a href="../assets/img/requirements/${data["requirements"]}" target="_blank"><img src="../assets/img/requirements/${data["requirements"]}" alt="Requirement" class="avatar"></a></td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["place_of_birth"]}</td>
                        <td>${data["citizenship"]}</td>
                        <td>${data["religion"]}</td>
                        <td>${data["sex"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["phone_number"]}</td>
                        <td>${data["date_registered"]}</td>
                        <td>${data["grade_level"]}</td>
                        <td>${data["program"]}</td>
                        
                    </tr>
                    `;
                }
                $("#tbl_enrollee_accept_body").html(row);
                $('#tbl_enrollee_accept').DataTable({
                    autoWidth : false
                });
            }
        });
    },
    getEnrolleesForExam: function () {
        $.ajax({
            url: "../data/EnrolleeData.php?action=getEnrolleesForExam",
            dataType: "json",
            success: function (result) {
                rowCount = $('#tbl_enrollee_for_exam_body tr').length;

                if(rowCount > 0)
                {
                    $('#tbl_enrollee_for_exam').DataTable().destroy();
                }
                var row = ``;
                
                // <td>
                //     <button type="button"class="btn btn-danger btn-sm data-toggle="tooltip" data-placement="top" title="Reject" style='font-size:24px' onclick="ENROLLEE.failEnrollee(${data["id"]})">
                    
                //         <i class='fas fa-times'></i>
                //     </button>
                // </td>
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        <td>
                            <button type="button"class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View" style='font-size:24px' onclick="ENROLLEE.getSpecificEnrollee(${data["id"]})">
                            
                                <i class='fas fa-eye'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Accept" style='font-size:24px' onclick="ENROLLEE.passEnrollee(${data["id"]})">
                            
                                <i class='fas fa-check'></i>
                            </button>
                        </td>
                        <td><a href="../assets/img/enrollees/${data["image"]}" target="_blank"><img src="../assets/img/enrollees/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td><a href="../assets/img/enrollees/${data["requirements"]}" target="_blank"><img src="../assets/img/requirements/${data["requirements"]}" alt="Requirement" class="avatar"></a></td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["place_of_birth"]}</td>
                        <td>${data["citizenship"]}</td>
                        <td>${data["religion"]}</td>
                        <td>${data["sex"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["phone_number"]}</td>
                        <td>${data["date_registered"]}</td>
                        <td>${data["grade_level"]}</td>
                        <td>${data["program"]}</td>
                    </tr>
                    `;
                }
                $("#tbl_enrollee_for_exam_body").html(row);
                $('#tbl_enrollee_for_exam').DataTable({
                    autoWidth : false
                });
            }
        });
    },
    removeEnrollee: function (id) {
        // ENROLLEE.reset();
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
                    url: "../data/EnrolleeData.php?action=removeEnrollee",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        ENROLLEE.getEnrolleesForAccept();
                        ENROLLEE.getEnrolleesForExam();
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
    acceptEnrollee: function (id) {
        swal({
            title: "Are you sure to accept this enrollee?",
            content: "input",
            text: "Please input examination date.",
            icon: "info",
            buttons: true,
            dangerMode: true,
          })
          .then((inputDate) => {
            if (ENROLLEE.validateDate(inputDate) != 'Invalid Date') {
                var date_ = ENROLLEE.validateDate(inputDate);
                var examDate =  date_.getFullYear()+'-'+(date_.getMonth()+1)+'-'+date_.getDate();
                
                $.ajax({
                    url: "../data/EnrolleeData.php?action=acceptEnrollee",
                    data:
                    {
                        id: id,
                        exam_date: examDate,
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        ENROLLEE.getEnrolleesForAccept();
                        ENROLLEE.getEnrolleesForExam();
                        swal("You accepted this student", {
                            title: "Success!",
                            text: result,
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
              
            } else {
                alert("invalid date")
            }
          });
    },
    rejectEnrollee: function (id) {
        swal("Hello world!");
        swal({
            title: "Are you sure?",
            text: "You want to reject this application?",
            icon: "info",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../data/EnrolleeData.php?action=rejectEnrollee",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        ENROLLEE.getEnrolleesForAccept();
                        ENROLLEE.getEnrolleesForExam();
                        swal("You reject this student", {
                            title: "Success!",
                            text: result,
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
              
            }
          });
    },
    passEnrollee: function (id) {
        // swal("Hello world!");
        swal({
            title: "Input Grade",
            content: "input",
            text: "Please input examination grade.",
            icon: "info",
            buttons: true,
            dangerMode: true,
          })
          .then((grade) => {
            if (grade !=null) {
                $.ajax({
                    url: "../data/EnrolleeData.php?action=passEnrollee",
                    data:
                    {
                        id: id,
                        exam_result : grade
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        var text = "You passed this examinee";
                        if( grade < 60) {
                            var text = "You failed this examinee";
                        }
                        ENROLLEE.getEnrolleesForAccept();
                        ENROLLEE.getEnrolleesForExam();
                        swal(text, {
                            title: "Success!",
                            text: text,
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
              
            }
          });
    },
    failEnrollee: function (id) {
        // swal("Hello world!");
        
        swal({
            title: "Are you sure?",
            content: "input",
            text: "You want to fail this examinee? Please input grade.",
            icon: "info",
            buttons: true,
            dangerMode: true,
          })
          .then((grade) => {
              
            if (grade != null) {
                $.ajax({
                    url: "../data/EnrolleeData.php?action=failEnrollee",
                    data:
                    {
                        id: id,
                        exam_result : grade
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        ENROLLEE.getEnrolleesForAccept();
                        ENROLLEE.getEnrolleesForExam();
                        swal("You pass this examinee", {
                            title: "Success!",
                            text: result,
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
              
            }
          });
    },
    insertEnrollee : function(_this) {
        
        $.ajax({
            url: "../data/EnrolleeData.php?action=insertEnrollee",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                ENROLLEE.getEnrolleesForAccept();
                ENROLLEE.getEnrolleesForExam();

                // $("#txt_fname").val("");
                // $("#txt_mname").val("");
                // $("#txt_lname").val("");
                // $("#txt_address").val("");
                // $("#txt_birthday").val("");
                // $("#txt_email").val("");
                // $("#txt_number").val("");
                // $("#txt_program").val("");
                // $("#file_image").val("");
                swal(result.message, {
                    title: result.title,
                    text: result.message,
                    icon: result.status,
                    button: "OK",
                });
                $("#modal_enrollee_form").modal("hide");
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
    updateEnrollee : function(post_data){
        $.ajax({
            url: "../data/EnrolleeData.php?action=updateEnrollee",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                ENROLLEE.getEnrolleesForAccept();
                ENROLLEE.getEnrolleesForExam();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_enrollee_form_update").modal("hide");
            }
        });
    },
    getPrograms: function () {
        $.ajax({
            url: "../data/ProgramData.php?action=getPrograms",
            dataType: "json",
            success: function (result) {
                var row1 = `<option value="" disabled selected>First Choice*</option>`;
                var row2 = `<option value="" disabled selected>Second Choice*</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row1 += `
                        <option value="${data["abbreviation"]}">${data["program"]}</option>
                    `;
                    row2 += `
                        <option value="${data["abbreviation"]}">${data["program"]}</option>
                    `;
                }
                $("#txt_program2").html(row2);
                $("#txt_program").html(row1);
            }
        });
    },
    
    getGrades: function () {
        $.ajax({
            url: "../data/GradeData.php?action=getGrades",
            dataType: "json",
            success: function (result) {
                var row1 = `<option value="" disabled selected>Please Select Grade</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row1 += `
                        <option value="${data["grade"]}">${data["grade_roman_numeral"]}</option>
                    `;
                }
                $("#txt_grades").html(row1);
            }
        });
    },
    
    getSemesters: function () {
        $.ajax({
            url: "../data/SemesterData.php?action=getSemesters",
            assync : false,
            dataType: "json",
            success: function (result) {
                var row1 = `<option value="" disabled selected>Please Select Semester</option>`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row1 += `
                        <option value="${data["semester"]}">${data["semester"]}</option>
                    `;
                }
                $("#txt_semesters").html(row1);
            }
        });
    },
    
    getRequirements: function () {
        $.ajax({
            url: "../data/RequirementData.php?action=getActiveRequirements",
            dataType: "json",
            success: function (result) {
                var row = ``;
                var input = "";
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    
                    var isRequired = "";
                    if(data["is_required"] == 1)
                    {
                        isRequired = "required"
                    }
                    var inputType = data['input_type'];
                    if (inputType == 'select') {
                        var dropdownValues = data['select_values'].split("|");
                        var options = `<option value="" disabled selected></option>`;
                        for(var y = 0; y < dropdownValues.length; y++) {
                            options += `
                            <option value="${dropdownValues[y]}">${dropdownValues[y]}</option>
                            `
                        }
                        input += `
                            <div class="form-group">
                                <label for="${data['id']}">${data['form_label']}</label>
                                <select class="form-control" id="${data['id']}" name="${data['id']}" ${isRequired} >
                                    ${options}
                                </select>
                            </div>
                        `;
                    }
                    else {
                        input += `
                            <div class="form-group">
                                <label for="${data['id']}">${data['form_label']}</label>
                                <input class="form-control" type="${inputType}" id="${data['id']}" name="${data['id']}">
                                
                            </div>
                        `;
                    }

                    
                    
                    
                }$("#div_others").html(input);
            }
        });
    },
    validateDate: function(inputText) {
        return new Date(inputText);
    }
  
} 