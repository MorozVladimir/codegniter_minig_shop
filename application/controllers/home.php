<?php 

class Home extends CI_Controller {
    public function index() {
        $data['title'] = 'Главная';
        return $this->load->view('pages/home/index.php', $data);
    } 
    public function about() {
        $data['title'] = 'О сайте';
        return $this->load->view('pages/home/about', $data);
    }
    public function contact() {
        $data['title'] = 'Контакты';
        return $this->load->view('pages/home/contact', $data);
    }
}

