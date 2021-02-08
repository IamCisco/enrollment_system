
$(document).ready(function () {
    USER.checkSession();
    CONTENT.getContents();
    CONTENT.getBackgroundMain();

    
    $('#frm_content_update').submit(function(event) {
        event.preventDefault();
        var post_data = {
            id             : CONTENT.id,
            name           : $("#txt_name_update").val(),
            details        : $("#txt_detail_update").val()
        }
        CONTENT.updateContent(post_data)
    });
    
    $('#frm_background_update').submit(function(event) {
        event.preventDefault();
        CONTENT.updateBackgroundMain(this)
    });
});

let CONTENT = {

    id : 0,
    getContents: function () {
        $.ajax({
            url: "../data/ContentData.php?action=getContents",
            dataType: "json",
            success: function (result) {
                var row = ``;
                rowCount = $('#tbl_content_body tr').length;

                if(rowCount > 0)
                {
                    $('#tbl_content').DataTable().destroy();
                }
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        <td>${data["name"]}</td>
                        <td>${data["details"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="CONTENT.getSpecificContent(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_content_body").html(row);
                $('#tbl_content').DataTable({
                    "searching" : false,
                    "lengthChange" : false
                });
            }
        });
    },
    getBackgroundMain: function () {////VMGO = vision mission g
        $.ajax({
            url: "../data/BackgroundData.php?action=getBackgroundMain",
            dataType: "json",
            assync: false,
            success: function (result) {
                // var x=0;
                $("#hero").css("background-image", `url('../assets/img/background/${result.homepage}')`);
                $("#hero").css("background-position", "absolute");
            }
        });
    },
    getSpecificContent : function(id){
        $.ajax({
            url: "../data/ContentData.php?action=getSpecificContent",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                console.log(result)
                CONTENT.id = id;

                $("#modal_content_form_update").modal("show");
                $("#txt_name_update").val(result.name);
                $("#txt_detail_update").val(result.details);
            }
        });
    },
    updateContent : function(post_data){
        $.ajax({
            url: "../data/ContentData.php?action=updateContent",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                CONTENT.getContents();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_content_form_update").modal("hide");
            }
        });
    },
    updateBackgroundMain : function(_this){
        alert(1)
        $.ajax({
            url: "../data/BackgroundData.php?action=updateBackgroundMain",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                CONTENT.getBackgroundMain();

                $("#file_image_update").val("");
                swal(result.message, {
                    title: result.title,
                    text: result.message,
                    icon: result.status,
                    button: "OK",
                });
                $("#modal_update_background").modal("hide");
            }
        });
    }
} 