
/************************

  edit:Lainie
  time:2016-07-01
  document:index.html (menu)

 ************************/



$(function(){
	//桌機版
	//第二層選單
	$("div.nav > ul.menu > li:nth-child(1) > a").click(function(){

		$("ul#Sub_menu_01").slideToggle();

	});
	
	$("div.nav > ul.menu > li:nth-child(2) > a").click(function(){

		$("ul#Sub_menu_02").slideToggle();

	});
	
	$("div.nav > ul.menu > li:nth-child(3) > a").click(function(){

		$("ul#Sub_menu_03").slideToggle();

	});
	
	//第三層選單
	$("ul#Sub_menu_02 > li:nth-child(2) > a").click(function(){

		$("ul#child_menu_02").slideToggle();

	});
	
	$("ul#Sub_menu_02 > li:nth-child(3) > a").click(function(){

		$("ul#child_menu_03").slideToggle();

	});
	
	$("ul#Sub_menu_02 > li:nth-child(4) > a").click(function(){

		$("ul#child_menu_04").slideToggle();

	});
	
	$("ul#Sub_menu_02 > li:nth-child(5) > a").click(function(){

		$("ul#child_menu_05").slideToggle();

	});
	
	$("ul#Sub_menu_02 > li:nth-child(6) > a").click(function(){

		$("ul#child_menu_06").slideToggle();

	});
	
	$("ul#Sub_menu_03 > li:nth-child(2) > a").click(function(){

		$("ul#child_menu_03_2").slideToggle();

	});
	
	$("ul#Sub_menu_03 > li:nth-child(3) > a").click(function(){

		$("ul#child_menu_03_3").slideToggle();

	});
	
	$("ul#Sub_menu_03 > li:nth-child(6) > a").click(function(){

		$("ul#child_menu_03_6").slideToggle();

	});
	
	$("ul#Sub_menu_03 > li:nth-child(7) > a").click(function(){

		$("ul#child_menu_03_7").slideToggle();

	});
	
	
	//手機版
	//第二層選單
	$("a#nav-btn").click(function(){

		$("ul.menu").slideToggle();

	});

});

