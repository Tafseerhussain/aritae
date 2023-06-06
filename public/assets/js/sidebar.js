function openNav() {
    if ($(window).width() < 1025 && $(window).width() > 767) {
        document.getElementById("mySidenav").style.width = "50%";
    } else if ($(window).width() < 768) {
        document.getElementById("mySidenav").style.width = "100%";
    } else {
        document.getElementById("mySidenav").style.width = "40%";
    }
    $("#sidenav-content").fadeIn();
}

function closeNav() {
    $("#sidenav-content").fadeOut("slow");
    setTimeout( function()  {
        document.getElementById("mySidenav").style.width = "0";
    }, 500);
    
}