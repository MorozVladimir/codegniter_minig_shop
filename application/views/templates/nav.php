<?php
$user = 'Гость';
if($this->session->has_userdata('user')){$user = $this->session->userdata('user');}
?>
<nav id="nav" class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#"><p>Майнинг магазин</p></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="<?= site_url('home/index')?>">Главная</a></li>
              <li><a href="<?= site_url('home/about')?>">О сайте</a></li>
              <li><a href="<?= site_url('home/contact')?>">Контакти</a></li>
              <li><a href="<?= site_url('shop/catalog')?>">Каталог</a></li>
          </ul><ul class="nav navbar-nav navbar-right">
              <li id="reg_user"><a href="#">Привет, <?=$user?></a></li>
              <?php if($user == 'Гость'){?>
              <li><a href="<?= site_url('account/reg')?>">Регистрация</a></li>
              <li><a href="<?= site_url('account/entry')?>">Авторизация</a></li>
              <?php } else {?>
              <li><a href="<?= site_url('account/profile')?>">Профиль</a></li>
              <li><a href="<?= site_url('account/exits')?>">Выход</a></li>
              <?php }?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    


