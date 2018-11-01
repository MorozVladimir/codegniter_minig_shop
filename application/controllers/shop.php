<?php

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('good');
        $this->load->model('user');
        $this->load->model('order');
        $this->load->helper(array('form', 'url'));
    }

    public function catalog() {
        $user = 'Гость';
        if ($this->session->has_userdata('user')) {
            $user = $this->session->userdata('user');
        }
        $data['user'] = $user;
        if ($user != 'Гость') {
            $data['number_orders'] = $this->order->get_number_ordsers_by_user($user);
            $data['sum_price'] = $sum_price = $this->order->get_sum_price_by_user($user);
        }
        $data['title'] = 'Товары для майнинга';
        $data['goods'] = $this->good->get_goods();
        $this->load->view('pages/shop/catalog.php', $data);
    }

    public function add_good() {
        $submit = $this->input->post('submit');
        if (!$submit) {
            $data['title'] = 'Добавление товара';
            return $this->load->view('pages/shop/add_good.php', $data);
        } else {
            $this->initial_good();
            $this->catalog();
        }
    }

    public function initial_good() {
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $produser = $this->input->post('produser');
        $barcode = $this->input->post('barcode');
        $vendorcode = $this->input->post('vendorcode');
        $number_good = $this->input->post('number_good');
        $price = $this->input->post('price');
        $config['upload_path'] = './assets/files/goods/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $image_name = $this->upload->data('file_name');
        $image_folder = base_url('assets/files/goods/');
        $image_good = $image_folder . $image_name;
        $this->good->add_good($name, $category, $produser, $barcode, $vendorcode, $number_good, $price, $image_good);
    }
    
    public function edit_orders() {
        $user = 'Гость';
        if ($this->session->has_userdata('user')) {
            $user = $this->session->userdata('user');
        }
        $data['user'] = $user;
        $data['title'] = 'Редактирование заказов';
        $data['orders'] = $this->order->get_group_orders_for_user($user);
        $this->load->view('pages/shop/edit_orders.php', $data);
    }
    public function submit_orders() {
        $data['title'] = 'Подтверждение заказа';
        $this->load->view('pages/shop/submit_orders.php', $data);
    }

}
