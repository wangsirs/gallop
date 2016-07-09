
/************************

  Author:Lainie
  time:2016-07-03
  document:index.html (phone_menu)

 ************************/
 
$(function(){
	 
	 $("div#Phone_MenuBar").click(function(){
		 
		 //alert("Hello! I am an alert box!!");
		 
		 $("div#phone_MenuGroup").animate({top:"800px"},300);
		 
		 $("#Mask").show();
		 
	});
	
	
	$("#Mask , #BTN_CLOSE").click(function(){
		
		$("div#phone_MenuGroup").animate({top:"-800px"},300);
		
		$("#Mask").hide();
	
	});	
	
	//第一個子選單列 
	$("div#phone_MenuGroup > ul > li:nth-child(1) > a" ).click(function(){
		
		$("ul#sub_Menu_01").slideToggle();
	
	});
	
	//第二個子選單列 
	$("div#phone_MenuGroup > ul > li:nth-child(2) > a" ).click(function(){
		
		$("ul#sub_Menu_02").slideToggle();
	
	});
	
	//第三個子選單列 
	$("div#phone_MenuGroup > ul > li:nth-child(3) > a" ).click(function(){
		
		$("ul#sub_Menu_03").slideToggle();
	
	});
	
	
	//第三層 子選單列 
	$("ul#sub_Menu_02 > li:nth-child(2) > a" ).click(function(){
		
		$("#child_sub_Menu_02").slideToggle();
	
	});
	
	$("ul#sub_Menu_02 > li:nth-child(3) > a" ).click(function(){
		
		$("#child_sub_Menu_03").slideToggle();
	
	});
	
	$("ul#sub_Menu_02 > li:nth-child(4) > a" ).click(function(){
		
		$("#child_sub_Menu_04").slideToggle();
	
	});
	
	$("ul#sub_Menu_02 > li:nth-child(5) > a" ).click(function(){
		
		$("#child_sub_Menu_05").slideToggle();
	
	});
	
	$("ul#sub_Menu_02 > li:nth-child(6) > a" ).click(function(){
		
		$("#child_sub_Menu_06").slideToggle();
	
	});
	
	
	$("ul#sub_Menu_03 > li:nth-child(2) > a" ).click(function(){
		
		$("#child_menu_03_2").slideToggle();
	
	});
	
	$("ul#sub_Menu_03 > li:nth-child(3) > a" ).click(function(){
		
		$("#child_menu_03_3").slideToggle();
	
	});
	
	$("ul#sub_Menu_03 > li:nth-child(6) > a" ).click(function(){
		
		$("#child_menu_03_6").slideToggle();
	
	});
	
	$("ul#sub_Menu_03 > li:nth-child(7) > a" ).click(function(){
		
		$("#child_menu_03_7").slideToggle();
	
	});
	 
});