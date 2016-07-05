    <script type="text/javascript">
    $().ready(function() {

        $('li[url]').on('click', function() {
            LoadShow('btn-frame-middle');
            $('.content').empty()
            $('.breadcrumb>.active').remove();
            $('.breadcrumb').append('<li class="active">' + $(this).text() + '</li> ');
            $.get($(this).attr('url'), function(data, status, xhr) {
                LoadClose('btn-frame-middle');
                if (status == 'success') {
                    $("section.content").html(data);
                } else {
                    //do nothing
                }
            });
        });
    });
    </script>
        <div class="content-wrapper" style="min-height: 563px;">
            <div class="container container-v-center">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content vertical-align">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="row row-expand">
                                <div class="col-sm-6">
                                    <div class="form-group block-icon">
                                        <a href="/main/basic_info">
                                        <img class="profile-user-img img-responsive img-circle" src="<?=ASSETS_IMG?>basicInfo.png" alt="">
                                        <h3 class="profile-username text-center">基本資料</h3>
                                        </a>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group block-icon">
                                        <a>
                                        <img class="profile-user-img img-responsive img-circle" src="<?=ASSETS_IMG?>assets.png" alt="">
                                        <h3 class="profile-username text-center">出入金查詢
</h3></a>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row row-expand">
                                <div class="col-sm-6">
                                    <div class="form-group block-icon">
                                        <a href="/main/withdraw_apply">
                                        <img class="profile-user-img img-responsive img-circle" src="<?=ASSETS_IMG?>bank_in.png" alt="">
                                        <h3 class="profile-username text-center">出金申請
</h3></a>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group block-icon">
                                        <a href="/main/deposit_apply">
                                        <img class="profile-user-img img-responsive img-circle" src="<?=ASSETS_IMG?>bank_out.png" alt="">
                                        <h3 class="profile-username text-center">存入資金
</h3></a>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                        </div>
                        </dlv>
                </section>
                <!-- /.content -->
                </div>
                <!-- /.container -->
            </div>