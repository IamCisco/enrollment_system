
$(document).ready(function () {
    INDEX.getAnnouncements();
    INDEX.getContents();

});

let INDEX = {
    content_icons : ["bx bx-list-ul","bx bx-show","bx bx-target-lock"],
    getAnnouncements: function () {
        $.ajax({
            url: "../data/AnnouncementData.php?action=getAnnouncements",
            dataType: "json",
            assync : false,
            success: function (result) {
                var row = ``;

                console.log(result);
                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    
                    <div class="testimonial-item">
                        <h3>${data["title"]}</h3>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            ${data["announcement"]}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div> 

                    `;
                }
                
                $("#div_announcement").html(row);
                $("#div_announcement").owlCarousel({
                    autoplay: true,
                    dots: true,
                    loop: true,
                    items: 1
                });
            }
        });
    },
    getContents: function () {////VMGO = vision mission g
        $.ajax({
            url: "../data/ContentData.php?action=getContents",
            dataType: "json",
            assync : false,
            success: function (result) {
                var x=0;

                console.log(result);
                let row = '';
                $.each(result, function (index, value) {
                    row +=`
                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="${(x+1)*100}">
                                <div class="icon"><i class="${INDEX.content_icons[x]}"></i></div>
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
} 