<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>

<div class="container">
    <div class="start_template">        
        <div id="good_header">
            <div id="order_title">
                <h1><?= $title ?></h1>
                <div class="all_orders">
                    <?php 
                    $count = 0;
                    if($orders){
                    foreach ($orders as $order) {?>
                        <div class="order_row">
                            <div class="order_count"><?=$count?></div>
                            <div class="order_name"><?=$order['g']?></div>
                            <div id="<?=$order['i']?>s_num" class="order_sum_num"><?=$order['s_num']?></div>
                            <div id="<?=$order['i']?>s_p" class="order_sum_price"><?=$order['s_p']?></div>
                            <div class="order_plus"><a id="<?=$order['i']?>" class="plus_good" href=""><div class="butt">+</div></a></div>
                            <div class="order_minus"><a id="<?=$order['i']?>" class="minus_good" href=""><div class="butt-">-</div></a></div>
                        </div>
                    <?php $count++;}?>
                </div>
                <div class="buttons">
                    <button class="submit_order" id="<?=$order['u_id']?>">Подтвердить заказ</button>
                    <button class="reset_order" id="<?=$order['u_id']?>">Отменть заказ</button>
                </div>
        <?php } else {?>
                <h3>В корзине нет товаров</h3>  
        <?php }
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>

