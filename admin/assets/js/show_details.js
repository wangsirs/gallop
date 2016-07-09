
/************************


  edit:Lainie
  time:2016-07-03
  document:index.html (顯示資料)

 ************************/
 
 $(function(){
	 
	 //身份證
	 $(".btn_ID_Card_Number").click(function(){ //顯示資料按鈕用class 去綁
		 
		 $("#ID_Card_Number_Group").show();
		 
	});
	
	$(".btn_Close_details").click(function(){
		 
		 $("#ID_Card_Number_Group").hide();
		 
	});
	
	
	//銀行帳號
	$(".btn_Bank_Account_Number").click(function(){
		 
		 $("#Bank_Account_Number_Group").show();
		 
	});
	
	$(".btn_Close_details").click(function(){
		 
		 $("#Bank_Account_Number_Group").hide();
		 
	});
	
	
	
	//居住地
	$(".btn_Living_Address").click(function(){
		 
		 $("#Living_Address_Group").show();
		 
	});
	
	$(".btn_Close_details").click(function(){
		 
		 $("#Living_Address_Group").hide();
		 
	});
	
	 
});