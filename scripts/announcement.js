
$(document).ready(function () {
    USER.checkSession();
    ANNOUNCEMENT.getAnnouncements();

    $('#frm_announcement_add').submit(function(event) {
        event.preventDefault();
        ANNOUNCEMENT.insertAnnouncement(this)
    });
    
    $('#frm_announcement_update').submit(function(event) {
        event.preventDefault();
        // var post_data = {
        //     id               : ANNOUNCEMENT.id,
        //     title            : $("#txt_title_update").val(),
        //     announcement     : $("#txt_announcement_update").val(),
        //     validity_date    : $("#txt_validity_update").val(),
        // }
        ANNOUNCEMENT.updateAnnouncement(this)
    });
});

let ANNOUNCEMENT = {

    id : 0,
    getAnnouncements: function () {
        $.ajax({
            url: "../data/AnnouncementData.php?action=getAnnouncements",
            dataType: "json",
            success: function (result) {
                var row = ``;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                        <td><a href="../assets/img/announcements/${data["image"]}" target="_blank"><img src="../assets/img/announcements/${data["image"]}" alt="Avatar" class="avatar"></a></td>
                        <td>${data["title"]}</td>
                        <td style ="word-wrap:break-word">${data["announcement"]}</td>
                        <td>${data["type"]}</td>
                        <td>${data["validity_date"]}</td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="ANNOUNCEMENT.getSpecificAnnouncement(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="ANNOUNCEMENT.removeAnnouncement(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_announcement_body").html(row);
                $('#tbl_announcement').DataTable();
            }
        });
    },
    removeAnnouncement: function (id) {
        // ANNOUNCEMENT.reset();
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
                    url: "../data/AnnouncementData.php?action=removeAnnouncement",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        ANNOUNCEMENT.getAnnouncements();
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
    insertAnnouncement : function(_this) {
        
        $.ajax({
            url: "../data/AnnouncementData.php?action=insertAnnouncement",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                ANNOUNCEMENT.getAnnouncements();

                $("#txt_title").val("")
                $("#txt_announcement").val("")
                $("#txt_validity").val("")
                swal("Data has been successfully added!", {
                    title: "Success!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
                $("#modal_announcement_form").modal("hide");
            }
        });
    },
    getSpecificAnnouncement : function(id){
        $.ajax({
            url: "../data/AnnouncementData.php?action=getSpecificAnnouncement",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                ANNOUNCEMENT.id = id;

                $("#modal_announcement_form_update").modal("show");
                $("#txt_id").val(id);
                $("#txt_title_update").val(result.title);
                $("#txt_announcement_update").val(result.announcement);
                $("#txt_validity_update").val(result.validity_date);
                $("#txt_type_update").val(result.type);
            }
        });
    },
    updateAnnouncement : function(_this){
        $.ajax({
            url: "../data/AnnouncementData.php?action=updateAnnouncement",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                ANNOUNCEMENT.getAnnouncements();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_announcement_form_update").modal("hide");
            }
        });
        
    }
} 