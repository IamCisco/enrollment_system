
$(document).ready(function () {
    INDEX.checkSessionHome();
    INDEX.getAnnouncements();
    INDEX.getContentVMGO();
    INDEX.getContentContact();
    INDEX.getBackgroundMain();
    INDEX.getTeachers();

    
    $('#btn_update_comment').on("click", function(e){
        INDEX.updateComment();
    }); 
    $('#btnLoadAllAnnouncement').on("click", function(e){
        INDEX.getArchiveAnnouncements();
    }); 

    $('#frm_search_announcement').submit(function(event) {
        event.preventDefault();
        INDEX.searchAnnouncements(this)
    });



});

let INDEX = {
    vmgo_icons: ["bx bx-list-ul", "bx bx-show", "bx bx-target-lock"],
    contact_icons: ["bx bx-map", "bx bx-envelope", "bx bx-phone-call"],
    username : "",
    user_id : 0,
    user_level : "",
    announcement_id : 0,
    comment_id : 0,
    setAnnouncementId: function (id, title, details) {
        $("#announcement_title").html(`<b>Announcement Title : </b>${title}`);
        $("#announcement_details").html(`<b>Announcement Detail : </b>${details}`);
        this.announcement_id = id
        this.getComments(id);
    },
    getAnnouncements: function (){
        $.ajax({
            url: "../data/AnnouncementData.php?action=getAnnouncementsToDate",
            dataType: "json",
            // assync: false,
            success: function (result) {
                // console.log(result)
                var result_length = result.length;
                if(result_length > 5)
                {
                    result_length = 5
                } 
                var row = ``;
                for (var x = 0; x < result_length; x++) {
                    btn_add_comment = "";
                    data = result[x];
                    if(INDEX.user_id != 0)
                    {
                        btn_add_comment = `<a href="#portfolio"  id="${data["id"]}" onclick="INDEX.setAnnouncementId(${data["id"]},'${data["title"]}','${data["announcement"]}')"class="details-link comment_button" title="More Details"><i class="bx bx-comment-add"></i></a>`;
                    }
                    row += `
                    <div class="col-lg-4 col-md-6 portfolio-item filter-${data["type"]}">
                        <img src="../assets/img/announcements/${data["image"]}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>${data["title"]}</h4>
                            ${btn_add_comment} 
                            <a href="../assets/img/announcements/${data["image"]}" class="venobox preview-link vbox-item" title="${data["title"]}"><i class="bx bx-link"></i></a><br>
                            
                        </div>
                    </div>
                    `;
                }

                $(".portfolio-container").html(row);
                setTimeout(function(){
                    var portfolioIsotope = $('.portfolio-container').isotope({
                    itemSelector: '.portfolio-item'
                    });
                
                    $('#portfolio-flters li').on('click', function() {
                    $("#portfolio-flters li").removeClass('filter-active');
                    $(this).addClass('filter-active');
                
                    portfolioIsotope.isotope({
                        filter: $(this).data('filter')
                    });
                    INDEX.aos_init();
                    });
                }, 1000);
                
                $('.venobox').venobox();
                $('.comment_button').on("click", function(e){
                    $("#modal_comments").modal();
                }); 
            }
        });
    },
    getArchiveAnnouncements: function (){
        $.ajax({
            url: "../data/AnnouncementData.php?action=getAnnouncements",
            dataType: "json",
            // assync: false,
            success: function (result) {
                // console.log(result)
                var result_length = result.length;
                var row = ``;
                for (var x = 0; x < result_length; x++) {
                    btn_add_comment = "";
                    data = result[x];
                    if(INDEX.user_id != 0)
                    {
                        btn_add_comment = `<a href="#portfolio"  id="${data["id"]}" onclick="INDEX.setAnnouncementId(${data["id"]},'${data["title"]}','${data["announcement"]}')"class="details-link comment_button" title="More Details"><i class="bx bx-comment-add"></i></a>`;
                    }
                    row += `
                    <div class="col-lg-4 col-md-6 portfolio-item filter-${data["type"]}">
                        <img src="../assets/img/announcements/${data["image"]}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>${data["title"]}</h4>
                            ${btn_add_comment} 
                            <a href="../assets/img/announcements/${data["image"]}" class="venobox preview-link vbox-item" title="${data["title"]}"><i class="bx bx-link"></i></a><br>
                            
                        </div>
                    </div>
                    `;
                }

                $('.portfolio-container').isotope('destroy');
                $(".portfolio-container").html(row);
                setTimeout(function(){
                    var portfolioIsotope = $('.portfolio-container').isotope({
                    itemSelector: '.portfolio-item'
                    });
                
                    $('#portfolio-flters li').on('click', function() {
                    $("#portfolio-flters li").removeClass('filter-active');
                    $(this).addClass('filter-active');
                
                    portfolioIsotope.isotope({
                        filter: $(this).data('filter')
                    });
                    INDEX.aos_init();
                    });
                }, 1000);
                
                $('.venobox').venobox();
                $('.comment_button').on("click", function(e){
                    $("#modal_comments").modal();
                }); 
            }
        });
    },
    searchAnnouncements: function (_this){
        $.ajax({
            url: "../data/AnnouncementData.php?action=searchAnnouncements",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
                var result_length = result.length;
                if(result_length > 5)
                {
                    result_length = 5
                } 
                var row = ``;
                for (var x = 0; x < result_length; x++) {
                    btn_add_comment = "";
                    data = result[x];
                    if(INDEX.user_id != 0)
                    {
                        btn_add_comment = `<a href="#portfolio"  id="${data["id"]}" onclick="INDEX.setAnnouncementId(${data["id"]},'${data["title"]}','${data["announcement"]}')"class="details-link comment_button" title="More Details"><i class="bx bx-comment-add"></i></a>`;
                    }
                    row += `
                    <div class="col-lg-4 col-md-6 portfolio-item filter-${data["type"]}">
                        <img src="../assets/img/announcements/${data["image"]}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>${data["title"]}</h4>
                            ${btn_add_comment} 
                            <a href="../assets/img/announcements/${data["image"]}" class="venobox preview-link vbox-item" title="${data["title"]}"><i class="bx bx-link"></i></a><br>
                            
                        </div>
                    </div>
                    `;
                }
                $('.portfolio-container').isotope('destroy');
                $(".portfolio-container").html(row);
                
                setTimeout(function(){
                    var portfolioIsotope = $('.portfolio-container').isotope({
                    itemSelector: '.portfolio-item'
                    });
                
                    $('#portfolio-flters li').on('click', function() {
                    $("#portfolio-flters li").removeClass('filter-active');
                    $(this).addClass('filter-active');
                
                    portfolioIsotope.isotope({
                        filter: $(this).data('filter')
                    });
                    INDEX.aos_init();
                    });
                }, 1000);
                
                $('.venobox').venobox();
                $('.comment_button').on("click", function(e){
                    $("#modal_comments").modal();
                }); 
            }
        });
    },
    aos_init :function() {
        AOS.init({
            duration: 1000,
            once: true
        });
    },
    getComments: function (announcement_id) {
        
        $("#modal_announcement_detail").modal("hide");
        $.ajax({
            url: "../data/CommentData.php?action=getComments",
            dataType: "json",
            data :
            {
                announcement_id: announcement_id
            },
            type : "post",
            success: function (result) {
                console.log(result)
                var row = ``;
                for (var x = 0; x < result.length; x++) {

                    var image_url ="../assets/img"
                    data = result[x];
                    if(data["user_level"] == "admin")
                    {
                        image_url += `/admins/${data["image"]}`
                    }
                    if(data["user_level"] == "student")
                    {
                        image_url += `/students/${data["image"]}`
                    }
                    if(data["user_level"] == "teacher")
                    {
                        image_url += `/teachers/${data["image"]}`
                    }
                    var ation_buttons ="";
                    console.log(`${INDEX.user_id} == ${data["user_id"]}`)
                    if(INDEX.user_id == data["user_id"])
                    {
                        ation_buttons =
                        `
                            <a class="preview-link" onclick="INDEX.getSpecificComment(${data["id"]})" title="Edit">
                                <span class="fas fa-edit"></span>
                            </a>
                            <a class="preview-link" onclick="INDEX.removeComment(${data["id"]})" title="Delete">
                                <span class="fas fa-trash"></span>
                            </a>
                        `;
                    }
                    row += `
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-1 col-md-1">
                                <img src="${image_url}" class="avatar" alt="" />
                            </div>
                            <div class="col-xs-11 col-md-11">
                                <div>
                                    
                                    <div class="mic-info">
                                        By: <a href="#">${data["name"]}</a> on ${data["comment_date"]}
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <h6>${data["comment"]}</h6>
                                </div>
                                <div class="action">
                                    ${ation_buttons}
                                </div>
                            </div>
                        </div>
                    </li>
                    `;
                }

                $("#list_comment").html(row);
                
            }
        });
    },
    insertComment: function () {
        var date = new Date();  
        var cDay = date.getDate();
        var cMonth = date.getMonth() + 1;
        var cYear = date.getFullYear();
        var comment = $("#txt_comment").val();
        var post_data = {
            user_id         : this.user_id,
            announcement_id : this.announcement_id,
            comment         : comment,
            comment_date    : `${cYear}-${cMonth}-${cDay}`
        }
        // console.log(post_data)
        $.ajax({
            url: "../data/CommentData.php?action=insertComment",
            dataType: "json",
            data :post_data,
            type : "post",
            success: function (result) {
                console.log(result)
                swal(result, {
                    title: "Success",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                INDEX.getComments(INDEX.announcement_id)
                $("#txt_comment").val("");
                
            }
        });
    },
    removeComment: function (id) {
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
                    url: "../data/CommentData.php?action=removeComment",
                    data:
                    {
                        id: id
                    },
                    type: "post",
                    dataType: "json",
                    assync : false, 
                    success: function (result) {
                        INDEX.getComments(INDEX.announcement_id);
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
    getSpecificComment : function(id){
        $.ajax({
            url: "../data/commentData.php?action=getSpecificComment",
            dataType: "json",
            data :
            {
                id: id
            },
            type : "post",
            assync: false,
            success: function (result) {
                console.log(result)
                INDEX.comment_id = id;
                
                $("#txt_comment_update").val(result["comment"]);
                $("#modal_comment_update").modal("show");
            }
        });
    },
    updateComment : function(){
        var date = new Date();  
        var cDay = date.getDate();
        var cMonth = date.getMonth() + 1;
        var cYear = date.getFullYear();
        post_data = 
        {
            id : INDEX.comment_id,
            comment : $("#txt_comment_update").val(),
            comment_date :`${cYear}-${cMonth}-${cDay}`
        }
        $.ajax({
            url: "../data/CommentData.php?action=updateComment",
            data: post_data,
            type: "post",
            dataType: "json",
            assync : false, 
            success: function (result) {
                INDEX.getComments(INDEX.announcement_id);

                
                swal(result, {
                    title: "Success!!",
                    text: result,
                    icon: "info",
                    button: "OK",
                });
                $("#modal_comment_update").modal("hide");
            }
        });
    },
    getTeachers: function () {
        $.ajax({
            url: "../data/TeacherData.php?action=getTeachers",
            dataType: "json",
            success: function (result) {
                var row = ``;
                count = 1;
                for (var x = 0; x < result.length; x++) {
                    var delay = count*100;
                    count++
                    data = result[x];
                    row += `

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="${delay}">
                        <div class="member">
                            <div class="member-img">
                                <img src="../assets/img/teachers/${data["image"]}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>${data["name"]}</h4>
                                <span>${data["teacher_level"]}</span>
                            </div>
                        </div>
                    </div>
                    
                    `;
                }
                $("#div_teachers").html(row);
            }
        });
    },
    getContentVMGO: function () {////VMGO = vision mission g
        $.ajax({
            url: "../data/ContentData.php?action=getContentVMGO",
            dataType: "json",
            assync: false,
            success: function (result) {
                var x = 0;

                let row = '';
                $.each(result, function (index, value) {
                    row += `
                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-4 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="${(x + 1) * 100}">
                                <div class="icon"><i class="${INDEX.vmgo_icons[x]}"></i></div>
                                <h4 class="title"><a href="">${index}</a></h4>
                                <p class="description">${value}</p>
                            </div>
                        </div>
                        `;
                    x++;
                });
                $("#div_vmgo").html(row)
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
            }
        });
    }, getContentContact: function () {////VMGO = vision mission g
        $.ajax({
            url: "../data/ContentData.php?action=getContentContact",
            dataType: "json",
            assync: false,
            success: function (result) {
                var x = 0;
                let row = '';
                $.each(result, function (index, value) {
                    row += `
                        <div class="col-lg-4 col-md-6">
                            <div class="info-box  mb-4">
                                <i class="${INDEX.contact_icons[x]}"></i>
                                <h3>${index}</h3>
                                <p>${value}</p>
                            </div>
                        </div>
                        `;
                    x++;
                });
                $("#div_contacts").html(row)
            }
        });
    },
    checkSessionHome: function () {
        $.ajax({
            type: "POST",
            url: "../data/UserData.php?action=checkSession",
            dataType: "json",
            assync: false,
            success: function (result) {
                var user_type = result.user_type
                if (result.length == 0) {

                    $("#btn_content").hide();
                    $("#btn_student").hide();
                    $("#btn_teacher").hide();
                    $("#btn_announcement").hide();
                    $("#btn_addmission").hide();
                    $("#btn_logout").hide();
                    $("#btn_stats").hide();
                    $("#btn_program").hide();
                    $("#btn_grade").hide();
                    $("#btn_semeter").hide();
                    $("#btn_requirement").hide();
                    $("#btn_profile").hide();
                    $("#btn_background").hide();
                    $("#btn_login").show();
                    INDEX.user_id = 0;
                    
                }
                else {
                    if(user_type == "admin")
                    {
                        $("#btn_content").show();
                        $("#btn_student").show();
                        $("#btn_teacher").show();
                        $("#btn_announcement").show();
                        $("#btn_addmission").show();
                        $("#btn_stats").show();
                        $("#btn_program").show();
                        $("#btn_grade").show();
                        $("#btn_semeter").show();
                        $("#btn_requirement").show();
                        $("#btn_background").show();
                        $("#btn_profile").show();
                        $("#btn_login").hide();
                        $("#btn_logout").show();
                    }
                    else
                    {
                        $("#btn_login").hide();
                        $("#btn_logout").show();
                        $("#btn_profile").show();
                    }
                    
                    INDEX.fullname = result.fullname;
                    INDEX.username = result.username;
                    INDEX.user_level = result.user_level;
                    INDEX.user_id = result.id;


                    $("#txt_name").html(INDEX.fullname);
                }


            },
            error: function (e) {

            }
        });
    }
} 