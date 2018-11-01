<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?=$title?></h1>
        <form id="reg_form" action="#" method="post">
            <div class="form-group">
                <label for="login_a">Логин:</label>
                <input type="text" class="form-control" id="login_a" name="login_a"
                       placeholder="Enter login" required>
            </div>
            <div class="form-group">
                <label for="pass1">Пароль:</label>
                <input type="password" class="form-control" id="pass1" name="pass1"
                       placeholder="Enter password" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check" name="check">
                <label for="checkbox" class="form-check-label">Запомнить меня</label>
            </div>
            <p>
                <input type="submit" class="btn btn-primary" id="submit" name="submit">
            </p>
        </form>
        <?php
        $this->load->view('templates/footer.php');
        ?>
    </div>
</div>