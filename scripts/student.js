
$(document).ready(function () {
    STUDENT.getStudents();

    $('#frm_student_add').submit(function(event) {
        event.preventDefault();
        var post_data = {
            first_name   : $("#txt_fname").val(),
            middle_name  : $("#txt_mname").val(),
            last_name    : $("#txt_lname").val(),
            address      : $("#txt_address").val(),
            birthdate    : $("#txt_bday").val(),
            email        : $("#txt_email").val(),
            phone_number : $("#txt_phonenumber").val()
        }
        STUDENT.insertStudent(post_data)
    });

    
    $('#frm_student_update').submit(function(event) {
        event.preventDefault();
        var post_data = {
            id           : STUDENT.id,
            first_name   : $("#txt_fname_update").val(),
            middle_name  : $("#txt_mname_update").val(),
            last_name    : $("#txt_lname_update").val(),
            address      : $("#txt_address_update").val(),
            birthdate    : $("#txt_bday_update").val(),
            email        : $("#txt_email_update").val(),
            phone_number : $("#txt_phonenumber_update").val()
        }
        console.log(STUDENT.id)
        STUDENT.updateStudent(post_data)
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
                var row = ``;

                console.log();
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["phone_number"]}</td>
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
                            title: "Good job!",
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
                    title: "Good job!",
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
                STUDENT.id = id;
                $("#modal_student_form_update").modal("show");
                $("#txt_fname_update").val(result.first_name);
                $("#txt_mname_update").val(result.middle_name);
                $("#txt_lname_update").val(result.last_name);
                $("#txt_address_update").val(result.address);
                $("#txt_bday_update").val(result.birthdate);
                $("#txt_email_update").val(result.email);
                $("#txt_phonenumber_update").val(result.phone_number);
            }
        });
    },
    updateStudent : function(post_data){
        $.ajax({
            url: "../data/StudentData.php?action=updateStudent",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                STUDENT.getStudents();

                
                swal(result, {
                    title: "Nice One!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_student_form_update").modal("hide");
            }
        });
    }
} 