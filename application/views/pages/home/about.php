<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?=$title?></h1>
        <h4>Этот сайт сделан как Курсовая работа повеб-программированию, 
            работа над сайтом дала мне возможность немного освоить 
            framework php - codegniter, закрепить основы технологии AJAX и позволила мне выполнить операции с объектами JSON</h4>
        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>