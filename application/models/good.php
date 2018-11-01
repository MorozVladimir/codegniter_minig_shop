<?php

class Good extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_good($name, $category, $produser, $barcode, $vendorcode, $number_good, $price, $image_good) {
        $data = [
            'name' => $name,
            'category' => $category,
            'produser' => $produser,
            'barcode' => $barcode,
            'vendorcode' => $vendorcode,
            'number_good' => $number_good,
            'price' => $price,
            'image_good' => $image_good
        ];
        $this->db->insert('goods', $data);
    }
    
    public function get_goods() {
        $query = $this->db->get('goods');
        return $query->result_array();
    }
    
    public function get_price_by_good_id($good_id){
        $data = ['id'=>$good_id];
        $this->db->select_min('price');
        $res = $this->db->get_where('goods',$data);
        $price = $res->result_array();
        return $price;
    }
}
