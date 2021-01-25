
$(document).ready(function () {
    USER.checkSession();
    CONTENT.getContents();

    
    $('#frm_content_update').submit(function(event) {
        event.preventDefault();
        var post_data = {
            id             : CONTENT.id,
            name           : $("#txt_name_update").val(),
            details        : $("#txt_detail_update").val()
        }
        CONTENT.updateContent(post_data)
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
                $('#tbl_content').DataTable();
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
    }
} 