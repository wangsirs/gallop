<body onload="document.form1.submit()">
<form id="form1" name="form1" method="post" action="<?=$payUrl;?>">
        <input type='hidden' name='MemberID' value="<?=$MemberID; ?>" />
		<input type='hidden' name='TerminalID' value="<?=$TerminalID; ?>"/>
		<input type='hidden' name='InterfaceVersion' value="<?=$InterfaceVersion; ?>"/>
		<input type='hidden' name='KeyType' value="<?=$KeyType; ?>"/>
        <input type='hidden' name='PayID' value="<?=$PayID; ?>" />
        <input type='hidden' name='TradeDate' value="<?=$TradeDate; ?>" />
        <input type='hidden' name='TransID' value="<?=$TransID; ?>" />
        <input type='hidden' name='OrderMoney' value="<?=$OrderMoney; ?>" />
        <input type='hidden' name='ProductName' value="<?=$ProductName; ?>" />
        <input type='hidden' name='Amount' value="<?=$Amount; ?>" />
        <input type='hidden' name='Username' value="<?=$Username; ?>" />
        <input type='hidden' name='AdditionalInfo' value="<?=$AdditionalInfo; ?>" />
        <input type='hidden' name='PageUrl' value="<?=$PageUrl; ?>" />
        <input type='hidden' name='ReturnUrl' value="<?=$ReturnUrl; ?>" />
        <input type='hidden' name='Signature' value="<?=$Signature; ?>" />
		<input type='hidden' name='NoticeType' value="<?=$NoticeType; ?>" />
</form>
</body>