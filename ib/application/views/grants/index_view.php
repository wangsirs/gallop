    <script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button);

    $().ready(function() {
        LoadGeneral();
        var titleMsg = "<?=$username?> 您好，歡迎使用GALLOP線上帳戶管理";
        $(".content-header>h4").text(titleMsg);
    });
    </script>