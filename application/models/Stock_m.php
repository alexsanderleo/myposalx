<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {


public function add_stock_in($post) //get relasi 2 tabel
	{
		$params = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['tanggale'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_stock', $params);
    }
}