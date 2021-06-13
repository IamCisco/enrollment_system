
$(document).ready(function () {
    USER.checkSession();
    SEMESTER.getSemesters();

    $('#frm_semester_add').submit(function(event) {
        event.preventDefault();
        SEMESTER.insertSemester(this)
    });
    
    $('#frm_semester_update').submit(function(event) {
        event.preventDefault();
        // var post_data = {
        //     id               : SEMESTER.id,
        //     title            : $("#txt_title_update").val(),
        //     semester     : $("#txt_semester_update").val(),
        //     validity_date    : $("#txt_validity_update").val(),
        // }
        SEMESTER.updateSemester(this)
    });
});

let SEMESTER = {

    id : 0,
    getSemesters: function () {
        $.ajax({
            url: "../data/SemesterData.php?action=getSemesters",
            dataType: "json",
            success: function (result) {
                var row = ``;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        
                        <td style ="word-wrap:break-word">${data["semester"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="SEMESTER.getSpecificSemester(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="SEMESTER.removeSemester(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_semester_body").html(row);
                $('#tbl_semester').DataTable();
            }
        });
    },
    removeSemester: function (id) {
        // SEMESTER.reset();
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
                    url: "../data/SemesterData.php?action=removeSemester",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        SEMESTER.getSemesters();
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
    insertSemester : function(_this) {
        
        $.ajax({
            url: "../data/SemesterData.php?action=insertSemester",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                SEMESTER.getSemesters();
                $("#txt_semester").val("")
                swal("Data has been successfully added!", {
                    title: "Success!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
                $("#modal_semester_form").modal("hide");
            }
        });
    },
    getSpecificSemester : function(id){
        $.ajax({
            url: "../data/SemesterData.php?action=getSpecificSemester",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                SEMESTER.id = id;

                $("#modal_semester_form_update").modal("show");
                $("#txt_id").val(id);
                $("#txt_semester_update").val(result.semester);
            }
        });
    },
    updateSemester : function(_this){
        $.ajax({
            url: "../data/SemesterData.php?action=updateSemester",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                SEMESTER.getSemesters();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_semester_form_update").modal("hide");
            }
        });
        
    }
} 