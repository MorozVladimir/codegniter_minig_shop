<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?= $title ?></h1>
        <form action="<?= base_url('shop/add_good')?>" id="add_good_form" method="post" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="name">Название товара:</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="category">Категория товара:</label>
                <input type="text" class="form-control" id="category" name="category"
                       placeholder="Enter category" required>
            </div>
            <div class="form-group">
                <label for="produser">Производитель товара:</label>
                <input type="text" class="form-control" id="produser" name="produser"
                       placeholder="Enter produser" required>
            </div>
            <div class="form-group">
                <label for="barcode">Штрихкод товара:</label>
                <input type="text" class="form-control" id="barcode" name="barcode"
                       placeholder="Enter barcode" required>
            </div>
            <div class="form-group">
                <label for="vendorcode">Серийный номер:</label>
                <input type="text" class="form-control" id="vendorcode" name="vendorcode"
                       placeholder="Enter vendorcode" required>
            </div>
            <div class="form-group">
                <label for="number_good">Количество:</label>
                <input type="number" class="form-control" id="number_good" name="number_good"
                       min="1" placeholder="Enter number" required>
            </div>
            <div class="form-group">
                <label for="price">Цена:</label>
                <input type="number" class="form-control" id="price" name="price"
                       min="0" step="0.01" placeholder="Enter Price 0.00" required>
            </div>
            <div>
                <label for="userfile"></label>
                <input type="file" id="userfile" name="userfile" size ="50 " class="btn btn-primary">
            </div>
            <p>
                <input type="submit" id="submit" name="submit" class="btn btn-primary">
            </p>
        </form>
        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>