<?php

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('order');
        $this->load->model('good');
    }

    public function username_taken() {
        $username = $this->input->post('login');
        if ($this->user->username_exists($username)) {
            echo '1';
        }
    }

    public function set_good() {
        $user = $this->session->userdata['user'];
        $good_id = $this->input->post('gid');
        $user_id = $this->user->get_user_id_by_user($user);
        $number_goods = 1;
        $order_date = date('Y-m-d H:i:s');
        $status = 'norm';
        $this->order->insert_order($user_id, $good_id, $number_goods, $order_date, $status);
        $number_orders = $this->order->get_number_ordsers_by_user_id($user_id);       
        $sum_price = $this->order->get_sum_price_by_user($user);
        $data = ['number_orders' => $number_orders, 'sum_price' => $sum_price];
        echo json_encode($data);
    }
    
    public function plus_good_get_grup_good() {
        $user = $this->session->userdata['user'];
        $good_id = $this->input->post('gid');
        $user_id = $this->user->get_user_id_by_user($user);
        $number_goods = 1;
        $order_date = date('Y-m-d H:i:s');
        $status = 'norm';
        $this->order->insert_order($user_id, $good_id, $number_goods, $order_date, $status);
        $number_orders = $this->order->get_number_orders_for_user_by_good_id($user, $good_id); 
        $sum_price = $this->order->get_sum_price_for_user_by_good_id($user, $good_id);
        $data = ['number_orders' => $number_orders, 'sum_price' => $sum_price];
        echo json_encode($data);
    }
     
    public function minus_good_get_grup_good() {
        $user = $this->session->userdata['user'];
        $good_id = $this->input->post('gid');
        $this->order->delete_first_good_by_user_id_and_good_id($user, $good_id);     
        $number_orders = $this->order->get_number_orders_for_user_by_good_id($user, $good_id); 
        $sum_price = $this->order->get_sum_price_for_user_by_good_id($user, $good_id);
        $data = ['number_orders' => $number_orders, 'sum_price' => $sum_price];
        echo json_encode($data);
    }
    
    public function reset_order() {
        $user_id = $this->input->post('uid');
        $this->order->delete_goods_by_user_id($user_id);
        $data = ['a' => 'ok'];
        echo json_encode($data);
    }
    
    public function submit_order() {
  //      $user_id = $this->input->post('uid');
        $data = ['a' => 'ok', 'title'=>'Подтвержение заказа'];
        echo json_encode($data);
    }

}
