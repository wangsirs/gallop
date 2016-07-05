    <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/select2/select2.min.css">
    <script src="<?=ASSETS_JS?>thirdParty/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?=ASSETS_JS?>thirdParty/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?=ASSETS_JS?>thirdParty/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/all.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/flat/blue.css">
    <!-- iCheck 1.0.1 -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/iCheck/icheck.min.js"></script>
    <script src="<?=ASSETS_JS?>jquery.validate.js"></script>
    <!-- load mask -->
    <link href="<?=ASSETS_JS?>thirdParty/plugins/loadMask/jquery.loadmask.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=ASSETS_JS?>thirdParty/plugins/loadMask/jquery.loadmask.min.js"></script>    
    <!-- Page script -->
    <script>    
    var vali_rules = {

                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                ib_name: {
                    required: true
                },
                pwd: {
                    required: true,
                    minlength: 8,
                    regExp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
                },
                conPw: {
                    equalTo: "#pwd"
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
                phone: {
                    required: true
                },
                cell_phone: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
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
                },
                state:{
                    required: true
                }
            };
    var vali_messages = {
                first_name: "此為必填欄位",
                last_name: "此為必填欄位",
                ib_name: "此為必填欄位",
                pwd: "密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字",
                conPw: "此為必填欄位，密碼與確認密碼需一致",
                passport: "此為必填欄位",
                birthday: "需輸入正確生日格式",
                zip: "此為必填欄位",
                city: "此為必填欄位",
                address: "此為必填欄位",
                phone: "此為必填欄位",
                state: "此為必填欄位",
                cell_phone: "此為必填欄位",
                email: "請輸入正確的email格式",
                rule1: "需同意本調款",
                rule2: "需同意本調款",
                rule3: "需同意本調款",
                rule4: "需同意本調款",
                rule5: "需同意本調款"
            };
            
    function add_rules(rules){
        $.extend(vali_rules, rules);
    }
    
    function add_messages(msgs){
        $.extend(vali_messages, msgs);
    }
    
    </script>
    <form action="<?=$app?>/account/ib_register_save" method="post" class="content">
            <a><h3 class="text-yellow"><span class="glyphicon glyphicon-pencil"></span>&nbsp;為確保您的開戶申請及時順利通過，請填寫正確之顧問資料。</h3></a>
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">個人資料</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*姓氏:</label>
                                <input name="first_name" class="form-control" type="text" placeholder="姓氏">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*名:</label>
                                <input name="last_name" class="form-control " type="text" placeholder="名字">
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*護照或身分證號碼:</label>
                                <input name="passport" class="form-control " type="text">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*出生日期:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="birthday" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                                </div>
                                <label for="birth"></label>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*密碼:</label>
                                <input id="pwd" name="pwd" class="form-control" type="password" placeholder="密碼">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*確認密碼:</label>
                                <input id="conPw" name="conPw" class="form-control" placeholder="確認密碼" type="password">
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*性別 :</label>
                                <select name="gender" class="form-control">
                                    <option selected="selected" value="0">男</option>
                                    <option value="1">女</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">聯絡資料</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*居住國家:</label>
                                <select name="country" class="form-control select2" data-bv-field="data.map.country">
                                    <?php $this->load->view('shared/country_view'); ?>
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                    <label>*省:</label>
                                    <input name="state" class="form-control " type="text" placeholder="省">
                                </div>
                        </div>
                            <!-- /.form-group -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*居住城市:</label>
                                <input name="city" class="form-control " type="text" placeholder="居住城市">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*居住地址:</label>
                                <input name="address" class="form-control " type="text" placeholder="居住地址">
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*電話:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input id="phone" name="phone" class="form-control " type="text" placeholder="電話">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*行動電話:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input name="cell_phone" class="form-control " type="text" placeholder="行動電話">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*電子信箱:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*郵政編碼:</label>
                                <input name="zip" class="form-control " type="text" placeholder="郵政編碼">
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>
            </div>
            <?=$app_form?>            
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">申請附件(上傳文件)</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col">
                        <div class="row-md-3">
                            <div class="form-group">
                                <label>*選擇護照或身份證:</label>
                                <select id="verifyType" class="form-control">
                                    <option selected="selected">護照</option>
                                    <option>身份證</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="row-md-3">
                            <div class="form-group">
                                <label>*護照:</label>
                                <input type="file" id="passportImg" name="passportImg">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="row-md-3">
                            <div class="form-group">
                                <label>*身份證:</label>
                                <input type="file" id="idImg" name="idImg">
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">條款閱讀同意</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col">
                        <div class="form-group">
                            <label class="">
                                    <input type="checkbox" class="minimal gallopRule" name="rule1">
                                    <ins class="iCheck-helper"></ins>
                                本人同意電子簽署及條款。
                                <div class="errorMsg"></div>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="">
                                    <input type="checkbox" class="minimal gallopRule" name="rule2">
                                    <ins class="iCheck-helper"></ins>
                                本人已經閱讀並理解風險披露。
                                <div class="errorMsg"></div>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="">
                                    <input type="checkbox" class="minimal gallopRule" name="rule3">
                                    <ins class="iCheck-helper"></ins>
                                本人同意消費者之隱私政策。
                                <div class="errorMsg"></div>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="">
                                    <input type="checkbox" class="minimal gallopRule" name="rule4">
                                    <ins class="iCheck-helper"></ins>
                                本人已經閱讀、理解並同意該交易條款。
                                <div class="errorMsg"></div>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="">
                                    <input type="checkbox" class="minimal gallopRule" name="rule5">
                                    <ins class="iCheck-helper"></ins>
                                本人認為GALLOP提供之產品(如適用)是適合本人的。
                                <div class="errorMsg"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">最終聲明</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul>
                        <li>本人謹此聲明在此電子表格的"客戶資料"所提供的資訊為真實且正確。</li>
                        <li>本人進一步聲明有任何的重大變化以書面通知GALLOP。</li>
                        <li>當按下"提交"時，本人完全同意上述各項條件和條約的約束。</li>
                        <li>除非得到GALLOP同意，本交易條款的任何修改均屬無效。</li>
                        <li>客戶對於條款有任何修改或刪除，對GALLOP均不具有約束力。</li>
                        <li>上述的各條款約束了交易人與GALLOP的關係。</li>
                    </ul>
                </div>
            </div>
            <div class=" text-center">
                <button id="confirmBtn" class="btn btn-primary ">提交</button>
            </div>
            <!-- /.box -->
        </form>
    
    <script>
    $(document).ready(function() {
      LoadGeneral();
        //Initialize Select2 Elements
        $(".select2").select2();
        //Money Euro
        $("[data-mask]").inputmask();
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $.validator.addMethod(
            "regExp",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            ""
        );

        $("form.content").validate({
            /* 前端驗證之欄位規則 */            
            rules: vali_rules,
            /* 前端驗證之欄位錯誤訊息 */
            messages: vali_messages,
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
            /* 提交callback handler */
            submitHandler: function(formElem) {
            $('body').mask('創立顧問中...');
            $.ajax({
                url: formElem.action ,
                type: formElem.method,
                data: $(formElem).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status === true) {
                          BootstrapDialog.alert({
                            title: '成功訊息',
                            type: BootstrapDialog.TYPE_SUCCESS,
                            message: '新增顧問成功! ' + resp.msg,
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
    });
    </script>