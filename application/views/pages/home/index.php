<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?= $title ?></h1>
        <div class="jumbotron">

            <h2 id="title_home">Швейцария: как и почему небольшая страна стала столицей криптомира</h2>
            <p>Швейцария — это сыр, шоколад, часы, самая сильная в Европе армия и очень спокойное в мире место для денег. Чуть более двух лет назад Швейцария привлекла к себе внимание еще одной особенностью. Сразу же после краудсейла Ethereum она стала самой востребованной юрисдикцией для бизнеса, ориентированного на работу с технологией блокчейн.

                По данным CoinDesk ICO Tracker, совокупная сумма всех инвестиций в ICO за первые 6 месяцев 2017 года превысила 1 млрд долларов США. Треть этой суммы ($370 млн) собрали швейцарские компании. Такой популярности способствует прогрессивное законодательство, относительно низкие налоговые ставки, развитая банковская инфраструктура, высокий уровень конфиденциальности и, наконец, статус страны-пионера в хорошем отношении к криптобизнесу.</p>

        </div>

    <div class="row">
        <div class="col-md-4">
            <h2>Bitcoin</h2>
            <p>Минимальная передаваемая величина (наименьшая величина дробления) — 10−8 биткойна — получила название «сатоши» в честь создателя Сатоси Накамото, хотя сам он использовал в таких случаях слово «цент»</p>
        </div>
        <div class="col-md-4">
            <h2>Ethereum</h2>
            <p>Технология Ethereum даёт возможность регистрации любых сделок с любыми активами на основе распределенной базы контрактов типа блокчейн, не прибегая к традиционным юридическим процедурам.</p>
        </div>
        <div class="col-md-4">
            <h2>Ripple</h2>
            <p> криптовалютная платформа для платёжных систем, ориентированная на операциях с обменом валют без возвратных платежей. Разработана компанией Ripple</p>
        </div>
    </div>

    <?php
    $this->load->view('templates/footer.php');
    ?>
</div>
</div>