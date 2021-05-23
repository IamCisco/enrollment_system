
$(document).ready(function () {
    USER.checkSession();
    REQUIREMENT.getRequirements();

    $('#frm_requirement_add').submit(function(event) {
        event.preventDefault();
        REQUIREMENT.insertRequirement(this)
    });
    
    $('#frm_requirement_update').submit(function(event) {
        event.preventDefault();
        // var post_data = {
        //     id               : REQUIREMENT.id,
        //     title            : $("#txt_title_update").val(),
        //     requirement     : $("#txt_requirement_update").val(),
        //     validity_date    : $("#txt_validity_update").val(),
        // }
        REQUIREMENT.updateRequirement(this)
    });
});

let REQUIREMENT = {

    id : 0,
    initialLoad : true,
    getRequirements: function () {
        $.ajax({
            url: "../data/RequirementData.php?action=getRequirements",
            dataType: "json",
            success: function (result) {
                var row = ``;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    
                    var isRequired = "";
                    if(data["is_required"] == 1)
                    {
                        isRequired = "checked"
                    }
                    var isActive = "";
                    if(data["is_active"] == 1)
                    {
                        isActive = "checked"
                    }
                    
                    row += `
                    <tr>
                        <td>${data["form_label"]}</td>
                        <td>${data["input_type"]}</td>
                        <td>${data["select_values"]}</td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" class="primary radio_required" onchange="REQUIREMENT.requireRequirement(${data["id"]}, this)" ${isRequired}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" class="primary radio_enabled" onchange="REQUIREMENT.enableRequirement(${data["id"]}, this)" ${isActive}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <button type="button"class="btn btn-info btn-sm" style='font-size:24px' onclick="REQUIREMENT.getSpecificRequirement(${data["id"]})">
                            
                                <i class='far fa-save'></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"class="btn btn-danger btn-sm "style='font-size:24px' onclick="REQUIREMENT.removeRequirement(${data["id"]})">
                              
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                    `;
                }
                $("#tbl_requirement_body").html(row);
                $('#tbl_requirement').DataTable();
            }
        });
    },
    enableRequirement : function(id, this_){
        var is_active = 0;
        if(this_.checked) { is_active = 1; this_.checked = true}
        // setTimeout(function(){
        //     alert(is_active);
        // },2000);
        $.ajax({
            url: "../data/RequirementData.php?action=updateStatus",
            type: "post",
            data: {
                id : id,
                is_active : is_active
            },
            dataType: "json",
            success: function (result) {
                // STUDENT.getStudents();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
            }
        });
    },
    requireRequirement : function(id, this_){
        var is_required = 0;
        if(this_.checked) { is_required = 1; this_.checked = true} 
        // setTimeout(function(){
        //     alert(is_required);
        // },2000);
        $.ajax({
            url: "../data/RequirementData.php?action=updateStatus",
            type: "post",
            data: {
                id : id,
                is_required : is_required
            },
            dataType: "json",
            success: function (result) {
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
            }
        });
    },
    removeRequirement: function (id) {
        // REQUIREMENT.reset();
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
                    url: "../data/RequirementData.php?action=removeRequirement",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        REQUIREMENT.getRequirements();
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
    insertRequirement : function(_this) {
        
        $.ajax({
            url: "../data/RequirementData.php?action=insertRequirement",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                REQUIREMENT.getRequirements();

                $("#txt_title").val("")
                $("#txt_requirement").val("")
                $("#txt_validity").val("")
                swal("Data has been successfully added!", {
                    title: "Success!",
                    text: result,
                    icon: "success",
                    button: "OK",
                });
                $("#modal_requirement_form").modal("hide");
            }
        });
    },
    getSpecificRequirement : function(id){
        $.ajax({
            url: "../data/RequirementData.php?action=getSpecificRequirement",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                REQUIREMENT.id = id;

                $("#modal_requirement_form_update").modal("show");
                $("#txt_id").val(id);
                $("#txt_title_update").val(result.title);
                $("#txt_requirement_update").val(result.requirement);
                $("#txt_validity_update").val(result.validity_date);
                $("#txt_type_update").val(result.type);
            }
        });
    },
    updateRequirement : function(_this){
        $.ajax({
            url: "../data/RequirementData.php?action=updateRequirement",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                REQUIREMENT.getRequirements();

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_requirement_form_update").modal("hide");
            }
        });
        
    }
} 