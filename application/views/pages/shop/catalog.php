<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>

<div class="container">
    <div class="start_template">
        
        <div id="good_header">
            <div id="good_title">
                <h1><?= $title ?></h1>
                <div id="get_good"></div>
                <?php if ($user == 'admin') { ?>       
                    <a href="<?= site_url('shop/add_good') ?>">Добавить товар</a>
                <?php } ?>
            </div>
            <?php if($user!='Гость'){?>
            <div id="good_basket">
                <div id="good_description">
                    <div><span>Колличество:</span><span id="good_number"><?=$number_orders?></span></div>
                    <div><span>Общая стоимость:</span><span id="good_all_price"><?=$sum_price?></span></div>
                </div>
                <div id="good_basket_image">
                    <a href="<?=site_url('shop/edit_orders') ?>">
                        <img id="good_basket_img" src="<?= base_url('assets/images/goods_basket.jpg')?>" alt="">
                    </a>  
                </div>
            </div>
            <?php }?>
        </div> 
         
        
        
        <div class="goods">
            <?php if(count($goods) > 0){ foreach ($goods as $item): ?>
                <div class="item_good">
                    <div id="item_name"><?= $item['name']; ?></div>
                    <a href=""><img src="<?= $item['image_good'] ?>" alt=""></a>                    
                    <span class="price_good"><?= $item['price']; ?> грн.</span>
                    <?php if($user != 'Гость') {?>
                    <span class="to_basket"><a href="" id="<?=$item['id']?>">В корзину</a></span>
                    <?php }?>
                </div>
                    <?php endforeach;} ?>
        </div>

        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>

