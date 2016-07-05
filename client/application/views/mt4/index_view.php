    <script type="text/javascript">
    $().ready(function() {

        $('li[url]').on('click', function() {
            LoadShow('btn-frame-middle');
            $('.content').empty();
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
                    <div class="box no-border">
                        <div class="box-body box-profile" style="box-shadow: 3px 3px 10px #a9b8b7;">
                        <?php if(!empty($list_btn)){foreach ($list_btn as $num => $item): $num=$num+1;?>
                            <?php if($num == 1 || ($num >= $row_num && $num % $row_num === 1 )):?><div class="row row-expand"><?php endif;?>
                                <div class="col-sm-3">
                                    <div class="form-group block-icon">
                                        <a href="<?=$item['url']?>">
                                        <img class="profile-user-img img-responsive img-circle" src="<?=ASSETS_IMG?><?=$item['icon']?>" alt="">
                                        <h3 class="profile-username text-center"><?=$item['name']?></h3>
                                        </a>
                                    </div>
                                </div>
                        <?php if($num % $row_num === 0):?></div><?php endif;?>
                        <?php endforeach;}?>
                        </div>
                        </dlv>
                </section>
                <!-- /.content -->
                </div>
                <!-- /.container -->
            </div>