<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?=$title?></h1>
        <h3 id="success">Вы успешно зарегистрированны</h3>
        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>