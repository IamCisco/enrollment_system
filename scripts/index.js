
$(document).ready(function () {
    INDEX.checkSessionHome();
    INDEX.getAnnouncements();
    INDEX.getContentVMGO();
    INDEX.getContentContact();
    INDEX.getBackgroundMain();
    INDEX.getTeachers();

});

let INDEX = {
    vmgo_icons: ["bx bx-list-ul", "bx bx-show", "bx bx-target-lock"],
    contact_icons: ["bx bx-map", "bx bx-envelope", "bx bx-phone-call"],
    getAnnouncements: function () {
        $.ajax({
            url: "../data/AnnouncementData.php?action=getAnnouncements",
            dataType: "json",
            assync: false,
            success: function (result) {
                var row = ``;

                console.log(result);
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <div class="col-lg-4 col-md-6 portfolio-item filter-${data["type"]}">
                        <img src="../assets/img/announcements/${data["image"]}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>${data["title"]}</h4>
                            <p>${data["announcement"]}</p>
                            <a href="#" data-gall="portfolioGallery" class="venobox preview-link" title="More Details"><i class="bx bx-plus"></i></a>
                            <a href="../assets/img/announcements/${data["image"]}" class="details-link" title="${data["title"]}"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    `;
                }

                $("#div_portfolio").html(row);
            }
        });
    },
    getTeachers: function () {
        $.ajax({
            url: "../data/TeacherData.php?action=getTeachers",
            dataType: "json",
            success: function (result) {
                console.log(result)
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

                console.log(result);
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
                console.log(result);
                // var x=0;
                $("#hero").css("background-image", `url('../assets/img/background/${result.background1}')`);
                // console.log(result);
                // let row = '';
                // $.each(result, function (index, value) {
                //     row +=`
                //         <div class="col-lg-4 col-md-6">
                //             <div class="info-box  mb-4">
                //                 <i class="${INDEX.contact_icons[x]}"></i>
                //                 <h3>${index}</h3>
                //                 <p>${value}</p>
                //             </div>
                //         </div>
                //         `;
                //     x++;
                // });
                // console.log(result)
                // $("#div_contacts").html(row)
            }
        });
    }, getContentContact: function () {////VMGO = vision mission g
        $.ajax({
            url: "../data/ContentData.php?action=getContentContact",
            dataType: "json",
            assync: false,
            success: function (result) {
                var x = 0;

                console.log(result);
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
                console.log(result)
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
                if (result.length == 0) {
                    $("#btn_content").hide();
                    $("#btn_student").hide();
                    $("#btn_announcement").hide();
                    $("#btn_addmission").hide();
                    $("#btn_logout").hide();
                    $("#btn_login").show();
                }
                else {
                    $("#btn_content").show();
                    $("#btn_student").show();
                    $("#btn_announcement").show();
                    $("#btn_addmission").show();
                    $("#btn_logout").show();
                    $("#btn_login").hide();
                    this.fullname = result.fullname;
                    this.username = result.username;
                    this.user_level = result.user_level;


                    $("#txt_name").html(this.fullname);
                }


            },
            error: function (e) {

            }
        });
    }
} 