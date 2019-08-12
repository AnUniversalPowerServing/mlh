function sideWrapperToggle(){
if($("#wrapper").hasClass('toggled')) { 
 $("#wrapper").removeClass('toggled'); // hides SideMenu
 $('html').removeClass("stop-vertificalScroll");
 $("#page-content-wrapper").css("position","absolute");
}
else { 
 $("#wrapper").addClass("toggled");  // adds SideMenu
 $("#page-content-wrapper").css("position","fixed");
 setTimeout(function(){ $("html").addClass("stop-vertificalScroll"); },400);
}
}