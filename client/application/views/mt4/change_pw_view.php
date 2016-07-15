<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
//        'js/jquery.validate.js',
//        'js/bootstrap-dialog.js'));
//    echo $this->minify->deploy_js(FALSE, $assets_name.'.js');
?>
<script>
$(document).ready(function() {
    $('.change_mt4_pw').click(function() {
        $selItem = $('.mt4-select option:selected');
        if ($selItem.val() === '0') {
            BootstrapDialog.alert({
                title: '錯誤訊息',
                type: BootstrapDialog.TYPE_WARNING,
                message: '請選擇一組指定MT4帳號！',
                callback: function(result) {
                    if (result) {
                    }
                }
            });
            return false;
        }
        $.ajax({
            url: '/mt4/change_mt4_pw?is_ajax=1',
            type: 'POST',
            dataType: 'json',
            data: {mt4_id:$selItem.val()},
            success: function(res) {
                if (res.status === true) {
                    BootstrapDialog.alert({
                        title: '更改密碼訊息',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: 'MT4密碼更改成功！',
                        callback: function(result) {
                            if (result) {}
                        }
                    });
                }else{
                    BootstrapDialog.alert({
                        title: '更改密碼訊息',
                        type: BootstrapDialog.TYPE_DANGER,
                        message: 'MT4密碼更改失敗！',
                        callback: function(result) {
                            if (result) {}
                        }
                    });
                }
            }
        });
    });
    $.validator.addMethod(
        "regExp",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字"
    );

    $("form.change_pw").validate({

        rules: {
            old_pw: {
                required: true
            },
            pwd: {
                required: true,
                minlength: 8,
                regExp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            },
            pwd_conf: {
                equalTo: "#pwd"
            }
        },
        messages: {
            old_pw: '請輸入舊密碼',
            pwd: '請輸入新密碼',
            pwd_conf: '需與新密碼一致'
        },
        errorPlacement: function(error, elem){
            if (elem.siblings().hasClass('input-group-addon')) {
                elem.closest('.input-group').after(error);
            }else{
                elem.after(error);
            }
        },
        /* 提交callback handler */
        submitHandler: function(formElem) {
            $.ajax({
                url: formElem.action+ '?is_ajax=1',
                type: formElem.method,
                data: $(formElem).serialize(),
                dataType: 'json',
                success: function(resp) {
                    /* success callback, 若status=true代表密碼更改成功*/
                    if (resp.status === true) {
                        BootstrapDialog.alert({
                            title: '成功訊息',
                            type: BootstrapDialog.TYPE_SUCCESS,
                            message: '密碼更改成功，請重新登入!',
                            callback: function(result) {
                                if (result) {
                                    window.location.href = '/';
                                }
                            }
                        });
                    } else {
                        BootstrapDialog.alert({
                            title: '失敗訊息',
                            type: BootstrapDialog.TYPE_DANGER,
                            message: '密碼更改失敗，請確認輸入資料無誤!',
                            callback: function(result) {
                                if (result) {
                                    window.location.href = '/';
                                }
                            }
                        });
                    }
                },
                error: function() {
                    BootstrapDialog.alert({
                        title: 'Message',
                        message: '更改密碼程序失敗，請聯絡工程師處理!',
                        callback: function(result) {
                            if (result) {
                                window.location.href = '/';
                            }
                        }
                    });
                }
            })
        }
    })
});
</script>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container container-v-center">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <form class="change_pw" action="/mt4/change_pw_conf" method="post" novalidate="novalidate">
                <div class="box box-primary">
                    <div class="box-header">
                        <ul class="nav pull-left ui-sortable-handle">
                            <li class="pull-left header text-light-blue">
                                <h3><i class="glyphicon glyphicon-lock"></i>&nbsp;密碼變更及忘記MT4密碼</h3></li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="inputEmail3" class="control-label">舊密碼</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input name="old_pw" class="form-control" type="password" placeholder="密碼">
                            </div>
                            <div class="col-sm-6 form-group">
                                <h5 class="text-blue"><span class="glyphicon glyphicon-info-sign"></span>輸入您的登入舊密碼</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="inputEmail3" class="control-label">變更登入</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input id="pwd" name="pwd" class="form-control" type="password" placeholder="密碼">
                            </div>
                            <div class="col-sm-6 form-group">
                                <h5 class="text-blue"><span class="glyphicon glyphicon-info-sign"></span>請確認您的密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字。</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="inputEmail3" class="control-label">確定新登入</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input name="pwd_conf" class="form-control" type="password" placeholder="密碼">
                            </div>
                            <div class="col-sm-6 form-group">
                                <h5 class="text-blue"><span class="glyphicon glyphicon-info-sign"></span>請確認您的密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字。</h5>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-info pull-right send"><span class="glyphicon glyphicon-edit"></span>&nbsp;提交</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-2 form-group">
                                    <label for="" class="control-label">帳號</label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <select class="form-control mt4-select">
                                    <option value="0" selected>請選擇</option>                                          
                                        <?php if( ! empty($mt4s)){foreach ($mt4s as $mt4):?>
                                        <option value="<?=$mt4['mt4_id']?>"><?=$mt4['mt4_id']?> <?=($mt4['is_child'] == '0') ? '[主帳號]' : ''?> <?=empty($mt4['note']) ? '' : '('.$mt4['note'].')'?></option>
                                        <?php endforeach;} ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <button type="button" class="btn btn-danger  change_mt4_pw"><span class="glyphicon glyphicon-lock"></span>&nbsp;忘記MT4交易密碼</button>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <h5 class="text-blue"><span class="glyphicon glyphicon-info-sign"></span>按下後，MT4交易密碼改為登入密碼＋出生日期四碼</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>
