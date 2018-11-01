<?php
$this->load->view('templates/header.php');
$this->load->view('templates/nav.php');
?>
<div class="container">
    <div class="start_template">
        <h1><?= $title ?></h1>    
        
        <?php if($errors!='not'){?>
        <h5 id="danger"><?=$errors?></h5>
        <?php }?>
        
        <form id="reg_form" action="#" method="post">
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" class="form-control" id="login" name="login"
                       placeholder="Enter login" required>
                <span id="bad_username" ></span>
            </div>
            <div class="form-group">
                <label for="pass1">Пароль:</label>
                <input type="password" class="form-control" id="pass1" name="pass1"
                       placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label for="pass2">Подтверждение пароля:</label>
                <input type="password" class="form-control" id="pass2" name="pass2"
                       placeholder="Confirm password" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="Enter email" required>
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