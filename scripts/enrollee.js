
$(document).ready(function () {
    USER.checkSession();
    
    ENROLLEE.getEnrollees();

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
    getEnrollees: function () {
        $.ajax({
            url: "../data/EnrolleeData.php?action=getEnrollees",
            dataType: "json",
            success: function (result) {
                var row = ``;
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        <td><a href="../assets/img/enrollees/${data["image"]}" target="_blank"><img src="../assets/img/enrollees/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td>${data["name"]}</td>
                        <td>${data["address"]}</td>
                        <td>${data["birthdate"]}</td>
                        <td>${data["email"]}</td>
                        <td>${data["phone_number"]}</td>
                        <td>${data["date_registered"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="ENROLLEE.getSpecificEnrollee(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="ENROLLEE.removeEnrollee(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_enrollee_body").html(row);
                $('#tbl_enrollee').DataTable();
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
                        ENROLLEE.getEnrollees();
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
                console.log(result)
                // ENROLLEE.getEnrollees();

                // $("#txt_fname").val("");
                // $("#txt_mname").val(""),
                // $("#txt_lname").val(""),
                // $("#txt_address").val(""),
                // $("#txt_birthday").val(""),
                // $("#txt_email").val(""),
                // $("#txt_number").val("")
                // swal("Data has been successfully added!", {
                //     title: "Good job!",
                //     text: result,
                //     icon: "success",
                //     button: "OK",
                // });
                // $("#modal_enrollee_form").modal("hide");
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
                ENROLLEE.id = id;
                $("#modal_enrollee_form_update").modal("show");
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
    updateEnrollee : function(post_data){
        $.ajax({
            url: "../data/EnrolleeData.php?action=updateEnrollee",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                ENROLLEE.getEnrollees();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_enrollee_form_update").modal("hide");
            }
        });
    }
} 