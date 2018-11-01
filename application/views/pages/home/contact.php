<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?=$title?></h1>
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1_rOwHZ3vO-V45LFm2EIV1isysqsCRZoz" width="640" height="480"></iframe>
        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>
