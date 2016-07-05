<?php if(!empty($balance)):?>
<li class="dropdown tasks-menu">
    <a role="button" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-money"></i>
        <span class="label label-danger"><?=count($balance)?></span>
    </a>
    <ul class="dropdown-menu">
        <!--<li class="header"></li>-->
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
            <?php 
            $max = 0;
            $colorSels = array('aqua', 'red', 'yellow', 'green');
           if(!empty($balance)){ foreach($balance as $item){
                if($item['balance'] > $max){
                    $max = $item['balance'];
                }
            }
            $cnt = 0;
            foreach($balance as $item):
                if($max === 0){
                    $percentage = 100;
                }else{
                    $percentage = intval(($item['balance']/$max)*100);
                }
                ?>
                <li>
                    <!-- Task item -->
                    <a href="grants/profile#list">
                        <h3>
                            MT4 ID: <?=$item['mt4_id']?>
                            <small class="pull-right">餘額: <?=round($item['balance'], BAL_DIGITS);?></small>
                          </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-<?=$colorSels[$cnt % count($colorSels)];?>" style="width: <?=$percentage?>%" role="progressbar" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100">
                            <?php
                            $cnt++;
                            ?>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endforeach;}?>
                <!-- end task item -->
            </ul>
        </li>
    </ul>
</li>
<?php endif;?>

<?php if($refresh):?>
<script>
$(document).ready(function() {
    $.ajax({url: '/grants/refresh_balance'+ '?is_ajax=1', type: 'GET', cache: false, dataType: 'json'});
});
</script>
<?php endif; ?>
