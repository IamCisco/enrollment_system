
$(document).ready(function () {
    USER.checkSession();
    GRADE.getGrades();

    $('#frm_grade_add').submit(function(event) {
        event.preventDefault();
        GRADE.insertGrade(this)
    });
    
    $('#frm_grade_update').submit(function(event) {
        event.preventDefault();
        // var post_data = {
        //     id               : GRADE.id,
        //     title            : $("#txt_title_update").val(),
        //     grade     : $("#txt_grade_update").val(),
        //     validity_date    : $("#txt_validity_update").val(),
        // }
        GRADE.updateGrade(this)
    });
});

let GRADE = {

    id : 0,
    getGrades: function () {
        $.ajax({
            url: "../data/GradeData.php?action=getGrades",
            dataType: "json",
            success: function (result) {
                var row = ``;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        
                        <td style ="word-wrap:break-word">${data["grade"]}</td>
                        <td>${data["grade_roman_numeral"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="GRADE.getSpecificGrade(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="GRADE.removeGrade(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_grade_body").html(row);
                $('#tbl_grade').DataTable();
            }
        });
    },
    removeGrade: function (id) {
        // GRADE.reset();
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
                    url: "../data/GradeData.php?action=removeGrade",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        GRADE.getGrades();
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
    insertGrade : function(_this) {
        
        $.ajax({
            url: "../data/GradeData.php?action=insertGrade",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                GRADE.getGrades();
                $("#txt_grade").val("")
                $("#txt_grade_roman_numeral").val("")
                swal("Data has been successfully added!", {
                    title: "Success!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
                $("#modal_grade_form").modal("hide");
            }
        });
    },
    getSpecificGrade : function(id){
        $.ajax({
            url: "../data/GradeData.php?action=getSpecificGrade",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                GRADE.id = id;

                $("#modal_grade_form_update").modal("show");
                $("#txt_id").val(id);
                $("#txt_grade_roman_numeral_update").val(result.grade_roman_numeral);
                $("#txt_grade_update").val(result.grade);
            }
        });
    },
    updateGrade : function(_this){
        $.ajax({
            url: "../data/GradeData.php?action=updateGrade",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                GRADE.getGrades();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_grade_form_update").modal("hide");
            }
        });
        
    }
} 