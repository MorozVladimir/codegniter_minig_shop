<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1>Мой <?=$title?> - <?=$user?></h1>
        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>