
$(document).ready(function () {
    
    ENROLLEE.getEnrolleesForAccept();
    ENROLLEE.getEnrolleesForExam();
    ENROLLEE.getPrograms();

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
                        <td>
                            <button type="button"class="btn btn-danger btn-sm data-toggle="tooltip" data-placement="top" title="Reject" style='font-size:24px' onclick="ENROLLEE.failEnrollee(${data["id"]})">
                            
                                <i class='fas fa-times'></i>
                            </button>
                        </td>
                        <td><a href="../assets/img/enrollees/${data["image"]}" target="_blank"><img src="../assets/img/enrollees/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td><a href="../assets/img/enrollees/${data["requirements"]}" target="_blank"><img src="../assets/img/requirements/${data["requirements"]}" alt="Requirement" class="avatar"></a></td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
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
        swal("Hello world!");
        swal({
            title: "Are you sure?",
            text: "You want to accept this application?",
            icon: "info",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../data/EnrolleeData.php?action=acceptEnrollee",
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
                        swal("You accepted this student", {
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
            title: "Are you sure?",
            content: "input",
            text: "You want to pass this examinee? Please input grade.",
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

                $("#txt_fname").val("");
                $("#txt_mname").val("");
                $("#txt_lname").val("");
                $("#txt_address").val("");
                $("#txt_birthday").val("");
                $("#txt_email").val("");
                $("#txt_number").val("");
                $("#txt_program").val("");
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
            success: function (result) {
                var basic_info = `
                <tr>
                    <td><b>Learning Reference Number</b></td>
                    <td><img src="../assets/img/enrollees/${result.image}" alt="Avatar" class="rounded mx-auto d-block"></td>
                </tr>
                <tr>
                    <td><b>Learning Reference Number</b></td>
                    <td>${result.learning_reference_number}</td>
                </tr>
                <tr>
                    <td><b>Voucher</b></td>
                    <td>${result.voucher_number}</td>
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
                <tr>
                    <td><b>Cabuyao Registered Voter?</b></td>
                    <td>${result.registered_voter}</td>
                </tr>
                <tr>
                    <td><b>Registered At</b></td>
                    <td>${result.registered_at}</td>
                </tr>
                <tr>
                    <td><b>Registered Since</b></td>
                    <td>${result.registered_since}</td>
                </tr>
                <tr>
                    <td><b>Last School Attended</b></td>
                    <td>${result.last_school}</td>
                </tr>
                <tr>
                    <td><b>Registered Since</b></td>
                    <td>${result.school_type}</td>
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

                var education_info = `
                <tr>
                    <td><b>Junior High School</b></td>
                    <td>${result.junior_school}</td>
                </tr>
                <tr>
                    <td><b>Year Graduated</b></td>
                    <td>${result.junior_year_graduated}</td>
                </tr>
                <tr>
                    <td><b>Honors Received</b></td>
                    <td>${result.honors_junior}</td>
                </tr>
                <tr>
                    <td><b>Junior High School Address</b></td>
                    <td>${result.junior_school_address}</td>
                </tr>
                <tr>
                    <td><b>Elementary School</b></td>
                    <td>${result.elementary_school}</td>
                </tr>
                <tr>
                    <td><b>Year Graduated</b></td>
                    <td>${result.elementary_year_graduated}</td>
                </tr>
                <tr>
                    <td><b>Honors Received</b></td>
                    <td>${result.honors_elementary}</td>
                </tr>
                <tr>
                    <td><b>Junior High School Address</b></td>
                    <td>${result.elementary_school_address}</td>
                </tr>
                `;

                $("#tbl_employee_education_info_body").html(education_info);

                var family_background = `
                <tr>
                    <td><b>Civil Status</b></td>
                    <td>${result.civil_status}</td>
                </tr>
                <tr>
                    <td><b>Spouse Name</b></td>
                    <td>${result.spouse_name}</td>
                </tr>
                <tr>
                    <td><b>Spouse Legal Residence</b></td>
                    <td>${result.spouse_residence}</td>
                </tr>

                <tr>
                    <td><b>Father's Name</b></td>
                    <td>${result.father_name}</td>
                </tr>
                <tr>
                    <td><b>Highest Educational Attainment</b></td>
                    <td>${result.highest_educ_father}</td>
                </tr>
                <tr>
                    <td><b>Father's Birthday</b></td>
                    <td>${result.father_birthday}</td>
                </tr>
                <tr>
                    <td><b>Contact Number</b></td>
                    <td>${result.father_contact_no}</td>
                </tr>
                <tr>
                    <td><b>Father's Occupation</b></td>
                    <td>${result.father_occupation}</td>
                </tr>
                <tr>
                    <td><b>Monthly Income</b></td>
                    <td>${result.father_income}</td>
                </tr>
                <tr>
                    <td><b>Company</b></td>
                    <td>${result.father_company}</td>
                </tr>
                <tr>
                    <td><b>Company Address</b></td>
                    <td>${result.father_company_address}</td>
                </tr>
                <tr>
                    <td><b>Status</b></td>
                    <td>${result.father_status}</td>
                </tr>
                
                <tr>
                    <td><b>Mother's Name</b></td>
                    <td>${result.mother_name}</td>
                </tr>
                <tr>
                    <td><b>Highest Educational Attainment</b></td>
                    <td>${result.highest_educ_mother}</td>
                </tr>
                <tr>
                    <td><b>Father's Birthday</b></td>
                    <td>${result.mother_birthday}</td>
                </tr>
                <tr>
                    <td><b>Contact Number</b></td>
                    <td>${result.mother_contact_no}</td>
                </tr>
                <tr>
                    <td><b>Father's Occupation</b></td>
                    <td>${result.mother_occupation}</td>
                </tr>
                <tr>
                    <td><b>Monthly Income</b></td>
                    <td>${result.mother_income}</td>
                </tr>
                <tr>
                    <td><b>Company</b></td>
                    <td>${result.mother_company}</td>
                </tr>
                <tr>
                    <td><b>Company Address</b></td>
                    <td>${result.mother_company_address}</td>
                </tr>
                <tr>
                    <td><b>Status</b></td>
                    <td>${result.mother_status}</td>
                </tr>
                `;

                $("#tbl_employee_family_background_body").html(family_background);
                
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
                var row2 = `<option value="" disabled selected>First Choice*</option>`;

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
} 