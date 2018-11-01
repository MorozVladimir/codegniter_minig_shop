<?php

class Account extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function reg() {       
        $submit = $this->input->post('submit');
        if(!$submit){ 
            $data['title'] = 'Регистрация';
            $data['errors'] = 'not';
            return $this->load->view('pages/account/reg.php', $data);}
        else{
            $data['title'] = 'Результаты регистрации';
            $data['errors'] = 'not';
            $login = $this->input->post('login');
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2');
            if($pass1!=$pass2){ 
                $data['errors'] = 'Пароли не совпадают';
                $data['title'] = 'Регистрация';
                return $this->load->view('pages/account/reg.php', $data);}
            else {$passw = md5($pass1);}
            $email = $this->input->post('email');
            $regdate = date('Y-m-d H:i:s');
            $status = 'norm';
            $this->user->addUser($login, $passw, $email, $regdate, $status);
            return $this->load->view('pages/account/reg_result.php', $data);}}

    public function entry() {
        $submit = $this->input->post('submit');
        if(!$submit){ 
            $data['title'] = 'Авторизация';
            $data['errors'] = 'not';
            return $this->load->view('pages/account/entry.php', $data);}
        else{
            $data['title'] = 'Результаты Авторизации';
            $login = $this->input->post('login_a');
            $pass1 = $this->input->post('pass1');
            $passw = md5($pass1);
            $res = $this->user->checkUser($login, $passw);
            if($res==TRUE){
                $data['title'] = 'Главная';
                $this->session->set_userdata('user', $login);
                return $this->load->view('pages/home/index.php', $data);
            }
            else{$data['mess'] = 'Авторизация провалена';}
            return $this->load->view('pages/account/entry_result.php', $data);
        }
        
        
    }

    public function reg_result() {
        $data['title'] = 'Результаты регистрации';
        return $this->load->view('pages/account/reg_result.php', $data);
    }

    public function entry_result() {
        $data['title'] = 'Результаты авторизации';
        return $this->load - view('pages/account/entry_result.php', $data);
    }

    public function exits() {
        
        $data['title'] = 'Главная';
        if($this->session->has_userdata('user')){$this->session->sess_destroy();}
        redirect(base_url(),'refresh');
        return $this->load->view('pages/home/index.php', $data);
    }

    public function profile() {
        $data['title'] = 'профиль';
        $data['user'] = $this->session->userdata['user'];
        return $this->load->view('pages/account/profile.php', $data);
    }

}
