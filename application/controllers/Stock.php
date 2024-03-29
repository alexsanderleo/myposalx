<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model(['item_m','supplier_m','unit_m', 'stock_m']);

        
    }

    public function stock_in_data(){
        $this->template->load('template', 'transaction/stock_in/stock_in_data');

    }

    public function stock_in_add(){
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        $data = ['item'=> $item, 'supplier' => $supplier];
  $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
      
    }

    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Stock-In berhasil disimpan');
            }
            redirect('stock/in');
        }
    }
}