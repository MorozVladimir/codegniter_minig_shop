<?php

class Order extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('user');
    }
    
    public function insert_order($user_id, $good_id, $number_goods, $order_date, $status) {
        $data = [
            'user_id'=>$user_id,
            'good_id'=>$good_id,
            'number_goods'=>$number_goods,
            'order_date'=>$order_date,
            'status'=>$status
        ];
        $this->db->insert('orders',$data);
    }
    
    
    public function get_number_ordsers_by_user_id($user_id){
        $data = ['user_id'=>$user_id];               
        $this->db->select('user_id');
        $this->db->from('orders');
        $this->db->where($data);
        return $this->db->count_all_results();
    }
    
    public function get_orders_by_user_id($user_id) {
        $data = ['user_id'=>$user_id];
        return $this->db->get_where('orders', $data);
    }
    
    public function get_sum_price_by_user_id($user_id){
        $orders_data = ['user_id'=>$user_id];
        $orders_by_user_id = $this->db->get_where('orders', $orders_data)->result_array();
        
        $sum_price = 0.0;
        foreach ($orders_by_user_id as $order_by_user_id) {
            $order_good_id = $order_by_user_id['good_id'];            
            $goods_data = ['id'=>$order_good_id];
            $res = $this->db->get_where('goods', $goods_data)->result_array();
            $price_by_good_id = $res[0]['price'];            
            $sum_price = $sum_price + $price_by_good_id * $order_by_user_id['number_goods'];
        }
        return $sum_price;
    }
    
    public function get_sum_price_by_user($user){
        $user_id = $this->user->get_user_id_by_user($user);
        $orders_data = ['user_id'=>$user_id];
        $orders_by_user_id = $this->db->get_where('orders', $orders_data)->result_array();
        $sum_price = 0.0;
        foreach ($orders_by_user_id as $order_by_user_id) {
            $order_good_id = $order_by_user_id['good_id'];            
            $goods_data = ['id'=>$order_good_id];
            $res = $this->db->get_where('goods', $goods_data)->result_array();
            $price_by_good_id = $res[0]['price'];            
            $sum_price = $sum_price + $price_by_good_id * $order_by_user_id['number_goods'];
        }
        return $sum_price;
    }
    
    
    public function get_number_ordsers_by_user($user){
        $user_id = $this->user->get_user_id_by_user($user);
        $data = ['user_id'=>$user_id];               
        $this->db->select('user_id');
        $this->db->from('orders');
        $this->db->where($data);
        return $this->db->count_all_results();
    }
    
    public function get_group_orders_for_user($user){
        $user_id = $this->user->get_user_id_by_user($user);
        $res = $this->db->query("SELECT a.user_id AS 'u_id', a.id AS 'id', a.good_id AS 'i', b.name AS 'g', "
                . "SUM(a.number_goods) as 's_num', SUM(b.price) AS 's_p' "
                . "FROM orders AS a, goods AS b, users AS c "
                . "WHERE b.id = a.good_id AND c.id = $user_id AND a.user_id = c.id "
                . "AND a.status = 'norm' GROUP BY a.good_id");
        return $res->result_array();
    }
    
    public function get_number_orders_for_user_by_good_id($user, $good_id){  
        $res = $this->get_group_orders_for_user($user);
        foreach ($res as $row){
            if($row['i']==$good_id) {return $row['s_num'];}
        }       
        return  0;
    }
    
    public function get_sum_price_for_user_by_good_id($user, $good_id){  
        $res = $this->get_group_orders_for_user($user);
        foreach ($res as $row){
            if($row['i']==$good_id) {return $row['s_p'];}
        }       
        return  0;
    }
    
      
    public function delete_goods_by_user_id_and_good_id($user_id, $good_id){
        $data = ['user_id'=>$user_id, 'good_id'=>$good_id];
        $this->db->delete('orders', $data);
    }
    
    public function get_first_order_id_by_user_id_and_good_id($user, $good_id){
        $res = $this->get_group_orders_for_user($user);
        foreach ($res as $row){
            if($row['i']==$good_id) {return $row['id'];}
        } 
        return $res;
    }
    
    public function delete_first_good_by_user_id_and_good_id($user, $good_id){
        $first_order_id = $this->get_first_order_id_by_user_id_and_good_id($user, $good_id);
        $data = ['id'=>$first_order_id];
        $res = $this->db->get_where('orders',$data)->result_array();
        $num = $res[0]['number_goods'];
        if($num==1) {$this->db->delete('orders', $data); }
        else if($num>0){
            $num--;
            $u_id = $res[0]['user_id'];
            $g_id = $res[0]['good_id'];
            $o_d = $res[0]['order_date'];
            $st = $res[0]['status'];
            $this->db->delete('orders', $data);
            $this->insert_order($u_id, $g_id, $num, $o_d, $st);
        }        
        return $num;
    }
    
    public function delete_goods_by_user_id($user_id){
        $data = ['user_id'=>$user_id];
        $this->db->delete('orders', $data);
    }
}
  