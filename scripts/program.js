
$(document).ready(function () {
    USER.checkSession();
    PROGRAM.getPrograms();

    $('#frm_program_add').submit(function(event) {
        event.preventDefault();
        PROGRAM.insertProgram(this)
    });
    
    $('#frm_program_update').submit(function(event) {
        event.preventDefault();
        // var post_data = {
        //     id               : PROGRAM.id,
        //     title            : $("#txt_title_update").val(),
        //     program     : $("#txt_program_update").val(),
        //     validity_date    : $("#txt_validity_update").val(),
        // }
        PROGRAM.updateProgram(this)
    });
});

let PROGRAM = {

    id : 0,
    getPrograms: function () {
        $.ajax({
            url: "../data/ProgramData.php?action=getPrograms",
            dataType: "json",
            success: function (result) {
                var row = ``;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        
                        <td style ="word-wrap:break-word">${data["program"]}</td>
                        <td>${data["abbreviation"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="PROGRAM.getSpecificProgram(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="PROGRAM.removeProgram(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_program_body").html(row);
                $('#tbl_program').DataTable();
            }
        });
    },
    removeProgram: function (id) {
        // PROGRAM.reset();
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
                    url: "../data/ProgramData.php?action=removeProgram",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        PROGRAM.getPrograms();
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
    insertProgram : function(_this) {
        
        $.ajax({
            url: "../data/ProgramData.php?action=insertProgram",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                PROGRAM.getPrograms();
                $("#txt_program").val("")
                $("#txt_abbreviation").val("")
                swal("Data has been successfully added!", {
                    title: "Success!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
                $("#modal_program_form").modal("hide");
            }
        });
    },
    getSpecificProgram : function(id){
        $.ajax({
            url: "../data/ProgramData.php?action=getSpecificProgram",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                PROGRAM.id = id;

                $("#modal_program_form_update").modal("show");
                $("#txt_id").val(id);
                $("#txt_abbreviation_update").val(result.abbreviation);
                $("#txt_program_update").val(result.program);
            }
        });
    },
    updateProgram : function(_this){
        $.ajax({
            url: "../data/ProgramData.php?action=updateProgram",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                PROGRAM.getPrograms();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_program_form_update").modal("hide");
            }
        });
        
    }
} 