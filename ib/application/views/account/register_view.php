<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/select2/select2.min.css',
//        'js/thirdParty/plugins/iCheck/flat/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/select2/select2.full.min.js',
//        'js/thirdParty/plugins/input-mask/jquery.inputmask.js',
//        'js/thirdParty/plugins/input-mask/jquery.inputmask.date.extensions.js',
//        'js/thirdParty/plugins/input-mask/jquery.inputmask.extensions.js',
//        'js/thirdParty/plugins/iCheck/icheck.min.js',
//        'js/thirdParty/plugins/timepicker/bootstrap-timepicker.min.js',
//        'js/jquery.validate.js',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js'));
?>
<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css">

<!-- Page script -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
    $(document).ready(function() {
        $('#country_phone').on('change', function(e){
            if($(this).children('option:selected').attr('type') == 'other'){
                BootstrapDialog.show({
                    title: '電話國碼確認',
                    type: BootstrapDialog.TYPE_PRIMARY,
                    message: function(dialog) {
                        var msg = '<div class="col-xs-4">請填寫電話國碼: </div> \
                        <div class="col-xs-8">+<input id="input_phone_code" type="number" class="form-group"></div>';
                        return msg;
                    },
                    buttons: [{
                        label: '確定',
                        hotkey: 13,
                        cssClass: 'btn-success',
                        action: function(dialogRef) {
                            country_code = '+'+$("#input_phone_code").val();
                            $('option[type="other"]')
                            .attr('value', country_code)
                            .text('其他 (' + country_code + ')');
                            $('#select2-country_phone-container').text('其他 (' + country_code + ')');
                            dialogRef.close();
                        }
                    }]
                });
            }
        });
        LoadGeneral();
        //Initialize Select2 Elements
        $(".select2").select2();
        //Money Euro
        $("[data-mask]").inputmask();

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        .on('ifChecked', function(event) {
            if(this.name != 'third_party_auth')
                return;
            BootstrapDialog.show({
                type: BootstrapDialog.TYPE_WARNING,
                title: '第三方授權條款',
                message: '條款內容: brabrabra',
                size: BootstrapDialog.SIZE_LARGE,
                buttons: [{
                    label: '同意',
                    icon: 'glyphicon glyphicon-ok',
                    cssClass: 'btn-info',
                    action: function(dialog){
                        dialog.close();
                    }
                }, {
                    label: '不同意',
                    icon: 'glyphicon glyphicon-remove',
                    cssClass: 'btn-danger',
                    action: function(dialog){
                        $('input[name=third_party_auth').iCheck('uncheck');
                        dialog.close();
                    }
                }]
            });
        });

        //back step
        $('.btn-prev').click(function(){
            var step = parseInt($(this).data('step'));

            $('.content_' + step).hide();
            $('.content_' + (step-1)).show();
        });

        $("form.content_1").validate({
            /* 前端驗證之欄位規則 */

            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                passport: {
                    required: true
                },
                birthday: {
                    required: true,
                    date: true
                },
                zip: {
                    required: true
                },
                city: {
                    required: true
                },
                address: {
                    required: true
                },
                cell_phone: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                state:{
                    required: true
                }
            },
            /* 前端驗證之欄位錯誤訊息 */
            messages: {
                first_name:"此為必填欄位",
                last_name:"此為必填欄位",
                passport:"此為必填欄位",
                birthday:"需輸入正確生日格式",
                zip:"此為必填欄位",
                city:"此為必填欄位",
                address:"此為必填欄位",
                cell_phone:"此為必填欄位",
                state:"此為必填欄位",
                email:"請輸入正確的email格式"
            },
            /* 錯誤訊息顯示位置 */
            errorPlacement: function(error, elem) {
                if (elem.hasClass('gallopRule')) {
                    elem.closest('label').append(error);
                } else {
                    if (elem.siblings().hasClass('input-group-addon')) {
                        elem.closest('.input-group').after(error);
                    } else {
                        elem.after(error);
                    }
                }
            },
            /* 送出allback handler */
                submitHandler: function(formElem) {
                phone = encodeURIComponent($("#country_phone>option:selected").val() + $("#cell_phone").val());
                data = $(formElem).serialize() + '&cell_phone=' + phone;
                $.ajax({
                    url: formElem.action + '?is_ajax=1',
                    type: formElem.method,
                    data: data,
                    dataType: 'json',
                    success: function(resp) {
                        if (resp.status === true) {
                            // 若成功，則進行下一步
                            form_step_2();
                        } else {
                            alert(resp.msg);
                        }
                    }
                });
            }
        });
    });

function form_step_2() {
    //email copy
    $('#client_e_mail').val($('input[name=email]').val());

    $("html, body").animate({
        scrollTop: 0
    },"slow");
    $(".content_1").hide();
    $(".content_2").show();

    $.validator.addMethod(
        "passwd",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "請確認輸入密碼符合右側敘述之規則"
        );

    $("form.content_2").validate({
        /* 前端驗證之欄位規則 */

        rules: {
            pwd: {
                required: true,
                minlength: 8,
                passwd: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            },
            conPw: {
                equalTo: "#pwd"
            },
            leverage: {
                required: true
            },
            first_deposit: {
                required: true
            }
        },
        /* 前端驗證之欄位錯誤訊息 */
        messages: {
            pwd:"請確認輸入密碼符合右側敘述之規則",
            conPw:"此為必填欄位，密碼與確認密碼需一致",
            first_deposit:"此為必填欄位",
            leverage:"此為必填欄位"
        },
        /* 錯誤訊息顯示位置 */
        errorPlacement: function(error, elem) {
            if (elem.hasClass('gallopRule')) {
                elem.closest('label').append(error);
            } else {
                if (elem.siblings().hasClass('input-group-addon')) {
                    elem.closest('.input-group').after(error);
                } else {
                    elem.after(error);
                }
            }
        },
        /* 送出callback handler */
        submitHandler: function(formElem) {
            $.ajax({
                url: formElem.action + '?is_ajax=1',
                type: formElem.method,
                data: $(formElem).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status === true) {
                            // 若成功，則進行下一步
                            form_step_3();
                        } else {
                            alert(resp.msg);

                        }
                    }
                });
        }
    });
}

function form_step_3() {
    $("html, body").animate({
        scrollTop: 0
    },"slow");
    $(".content_2").hide();
    $(".content_3").show();
    $("form.content_3").validate({
        /* 前端驗證之欄位規則 */

        rules: {
            rule1: {
                required: true
            },
            rule2: {
                required: true
            },
            rule3: {
                required: true
            },
            rule4: {
                required: true
            },
            rule5: {
                required: true
            }
        },
        /* 前端驗證之欄位錯誤訊息 */
        messages: {
            rule1:"需同意本調款",
            rule2:"需同意本調款",
            rule3:"需同意本調款",
            rule4:"需同意本調款",
            rule5:"需同意本調款"
        },
        /* 錯誤訊息顯示位置 */
        errorPlacement: function(error, elem) {
            if (elem.hasClass('gallopRule')) {
                elem.closest('label').append(error);
            } else {
                if (elem.siblings().hasClass('input-group-addon')) {
                    elem.closest('.input-group').after(error);
                } else {
                    elem.after(error);
                }
            }
        },
        /* 送出callback handler */
        submitHandler: function(formElem) {
            $('body').mask('創立客戶中...');
            $.ajax({
                url: formElem.action + '?is_ajax=1',
                type: formElem.method,
                data: data,
                dataType: 'json',
                success: function(resp) {
                    if (resp.status === true) {
                      BootstrapDialog.alert({
                        title: '成功訊息',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: '帳號建立成功! ' + resp.msg,
                        callback: function(result) {
                          if(result){
                            window.location = '/';
                        }
                    }
                });
                  } else {
                      BootstrapDialog.alert({
                        title: '錯誤訊息',
                        type: BootstrapDialog.TYPE_DANGER,
                        message: resp.msg
                    });
                  }
                  $('body').unmask();
              }
          });
        }
    });
}
</script>
<form action="/mt4/account/register_tmp" method="post" class="content_1 content">
    <input type="hidden" name="hash" value="<?=$hash?>" />
    <a><h3 class="text-yellow"><span class="glyphicon glyphicon-pencil"></span>&nbsp;為確保您的開戶申請及時順利通過，請填寫正確之客戶資料。</h3></a>
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-noborder">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a><span class="label label-primary custom-label">1</span>個人資料</a></li>
                <li class=""><a><span class="label label-primary custom-label">2</span>使用者資料設置</a></li>
                <li class=""><a><span class="label label-primary custom-label">3</span>完成</a></li>
            </ul>
            <div class="box-header with-border register-custom-header">
                <h3 class="box-title text-maroon"><span class="glyphicon glyphicon-user"></span>&nbsp;個人訊息</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">姓名</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 form-group">
                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="姓">
                    </div>
                    <div class="col-xs-4 form-group">
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="名">
                    </div>
                    <div class="col-xs-4 form-group">
                        <select id="gender" name="gender" class="form-control">
                            <option selected="selected" value="0">先生</option>
                            <option value="1">女士</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">電郵地址</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">主要連繫號碼</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <select id="country_phone" class="form-control select2" style="width: 100%;">
                                <?php
                                if( ! empty($list_country_phone)){
                                    foreach($list_country_phone as $key => $value){
                                        ?>
                                        <option value="<?=$value['code']?>"><?=$value['territory']?> (<?=$value['code']?>)</option>
                                        <?php
                                    }
                                }
                                ?>
                                <option type="other">其他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-8">
                        <input id="cell_phone" class="form-control" type="number" placeholder="行動電話">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">生日</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="birthday" name="birthday" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">身分證/護照號碼</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <input type="text" id="passport" name="passport" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">居住國</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <select id="country" name="country" class="form-control select2" style="width: 100%">
                            <?php
                            if( ! empty($list_country)){
                                foreach($list_country as $key => $value){
                                    ?>
                                    <option value="<?=$key?>"><?=$value['name']?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-header with-border register-custom-header">
                <h3 class="box-title text-maroon"><span class="glyphicon glyphicon-home"></span>&nbsp;居住地址</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">省</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <input type="text" id="state" name="state" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">城市</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <input type="text" id="city" name="city" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">地址</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">郵政編碼</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <input type="text" id="zip" name="zip" class="form-control">
                    </div>
                </div><div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                      <label>*選擇護照或身份證:</label>
                      <select id="verifyType" class="form-control">
                          <option selected="selected">護照</option>
                          <option>身份證</option>
                      </select>
                  </div>
                  <!-- /.form-group -->
              </div>
              <div class="col-xs-6">
                  <div class="form-group">
                      <label>*正面身分證:</label>
                      <input type="file" id="passportImg" name="passportImg">
                  </div>
                  <!-- /.form-group -->
              </div>
              <div class="col-xs-6">
                  <div class="form-group">
                      <label>*反面身份證:</label>
                      <input type="file" id="idImg" name="idImg">
                  </div>
                  <!-- /.form-group -->
              </div>
          </div>
          <div class="row">
              <div class="col-xs-6">
                  <div class="form-group">
                      <label>*居住證明:</label>
                      <input type="file" id="passportImg" name="passportImg">
                  </div>
                  <!-- /.form-group -->
              </div>
          </div>
          <div class="row">
            <div class="col-xs-3 form-group">
                <label for="inputEmail3" class="control-label"></label>
            </div>
            <div class="col-xs-6 form-group">
                <button class="btn btn-block btn-primary btn-lg">下一步</button>
            </div>

        </div>
    </div>
</div>
</div>
</form>
<?=$app_form?>
<form action="/mt4/account/register_tmp" method="post" class="content_2 content" style="display:none;">
    <input type="hidden" name="hash" value="<?=$hash?>" />
    <a><h3 class="text-yellow"><span class="glyphicon glyphicon-pencil"></span>&nbsp;為確保您的開戶申請及時順利通過，請填寫正確之客戶資料。</h3></a>
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-noborder">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a><span class="label label-primary custom-label">1</span>個人資料</a></li>
                <li class="active"><a><span class="label label-primary custom-label">2</span>使用者資料設置</a></li>
                <li class=""><a><span class="label label-primary custom-label">3</span>完成</a></li>
            </ul>
            <div class="box-header with-border register-custom-header">
                <h3 class="box-title text-maroon"><span class="glyphicon glyphicon-edit"></span>&nbsp;建立您的帳戶</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4 form-group has-error">
                        <label for="inputEmail3" class="control-label">客戶專區登入帳號</label>
                    </div>
                    <div class="col-xs-8 form-group has-error">
                        <input type="text" id="client_e_mail" name="client_e_mail" class="form-control" placeholder="" disabled value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">建立密碼</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <input id="pwd" name="pwd" class="form-control" type="password" placeholder="密碼">
                    </div>
                    <div class="col-xs-6 form-group">
                        <h5 class="text-blue"><span class="glyphicon glyphicon-info-sign"></span>請確認您的密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字。</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="inputEmail3" class="control-label">確認密碼</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <input id="conPw" name="conPw" class="form-control" placeholder="確認密碼" type="password">
                    </div>
                    <div class="col-xs-6 form-group">
                        <h5 class="text-blue"><span class="glyphicon glyphicon-info-sign"></span>請確認您的密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字。</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>首次準備存入的資金量</label>
                            <input id="first_deposit" name="first_deposit" class="form-control" type="number" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>*請選擇槓桿比例</label>
                            <select name="leverage" id="leverage" class="form-control">
                                <option value="" selected="selected"></option>
                                <option value="500">1:500</option>
                                <option value="400">1:400</option>
                                <option value="300">1:300</option>
                                <option value="200">1:200</option>
                                <option value="100">1:100</option>
                                <option value="50">1:50</option>
                                <option value="10">1:10</option>
                                <option value="1">1:1</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label></label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>
                                <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false">
                                    <input type="checkbox" class="minimal gallopRule" name="third_party_auth">
                                </div>
                            </label>
                            <span class="text-red" style="font-size: larger;"><strong>授權第三方管理我的帳戶</strong></span>
                            <div class="errorMsg"></div>

                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>請填管理者MT4帳號:</label>
                            <input id="follow" name="follow" class="form-control">
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>請輸入代理商代碼:</label>
                            <input id="agentCode" name="ib_id" class="form-control" type="text" placeholder="<?=$ib_id?>" disabled="true">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <br>
                            <br>
                            <label>若不知[代理商代碼]可詢問您的理財顧問</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 form-group">
                    </div>
                    <div class="col-xs-4 form-group">
                        <button type="button" class="btn btn-block btn-primary btn-lg btn-prev" data-step="2">上一步</button>
                    </div>
                    <div class="col-xs-4 form-group">
                        <button class="btn btn-block btn-primary btn-lg">下一步</button>
                    </div>
                    <div class="col-xs-2 form-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="/mt4/account/register_save" method="post" class="content_3 content" style="display:none;">
    <input type="hidden" name="hash" value="<?=$hash?>" />
    <a><h3 class="text-yellow"><span class="glyphicon glyphicon-pencil"></span>&nbsp;為確保您的開戶申請及時順利通過，請填寫正確之客戶資料。</h3></a>
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-noborder">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a><span class="label label-primary custom-label">1</span>個人資料</a></li>
                <li class=""><a><span class="label label-primary custom-label">2</span>使用者資料設置</a></li>
                <li class="active"><a><span class="label label-primary custom-label">3</span>完成</a></li>
            </ul>
            <div class="box-header with-border register-custom-header">
                <h3 class="box-title text-maroon"></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col">
                    <div class="form-group">
                        <label class="">
                            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" class="minimal gallopRule" name="rule1" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                            </div>
                            本人同意電子簽署及條款。
                            <div class="errorMsg"></div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="">
                            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" class="minimal gallopRule" name="rule2" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                            </div>
                            本人已經閱讀並理解風險披露。
                            <div class="errorMsg"></div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="">
                            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" class="minimal gallopRule" name="rule3" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                            </div>
                            本人同意消費者之隱私政策。
                            <div class="errorMsg"></div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="">
                            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" class="minimal gallopRule" name="rule4" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                            </div>
                            本人已經閱讀、理解並同意該交易條款。
                            <div class="errorMsg"></div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="">
                            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" class="minimal gallopRule" name="rule5" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                            </div>
                            本人認為GALLOP提供之產品(如適用)是適合本人的。
                            <div class="errorMsg"></div>
                        </label>
                    </div>
                </div>
                <div class="box-header with-border register-custom-header">
                    <h3 class="box-title">最終聲明</h3>
                </div>
                <!-- /.box-header -->
                <br>
                <ul>
                    <li>本人謹此聲明在此電子表格的"客戶資料"所提供的資訊為真實且正確。</li>
                    <li>本人進一步聲明有任何的重大變化以書面通知GALLOP。</li>
                    <li>當按下"確認送出"時，本人完全同意上述各項條件和條約的約束。</li>
                    <li>除非得到GALLOP同意，本交易條款的任何修改均屬無效。</li>
                    <li>客戶對於條款有任何修改或刪除，對GALLOP均不具有約束力。</li>
                    <li>上述的各條款約束了交易人與GALLOP的關係。</li>
                </ul>
                <br><br>
                <div class="row">
                    <div class="col-xs-2 form-group">
                    </div>
                    <div class="col-xs-4 form-group">
                        <button type="button" class="btn btn-block btn-primary btn-lg btn-prev" data-step="3">上一步</button>
                    </div>
                    <div class="col-xs-4 form-group">
                        <button class="btn btn-block btn-danger btn-lg">確認送出</button>
                    </div>
                    <div class="col-xs-2 form-group">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </form>
