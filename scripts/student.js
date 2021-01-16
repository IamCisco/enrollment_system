
$(document).ready(function () {
    STUDENT.getStudents();
});

let STUDENT = {

    //method 
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
                            <button type="button"class="btn btn-info btn-sm"style='font-size:24px'>
                            
                                <i class='far fa-save'></i>
                            </button>
                            <button type="button"class="btn btn-danger btn-sm"style='font-size:24px' onclick="STUDENT.removeStudent(${data["id"]})">
                              
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
        // alertify.confirm("Do you wan to delete this data?", function (e) {
        //     if (e) {
        //         
                
        //     } else {
        //         alertify.error("Delete cancelled");
        //     }
        // });
    },
    reset : function() {
        $("#toggleCSS").attr("href", "../assets/vendor/alertify/alertify.default.css");
        alertify.set({
            labels : {
                ok     : "OK",
                cancel : "Cancel"
            },
            delay : 5000,
            buttonReverse : false,
            buttonFocus   : "ok"
        });
    }
} 