<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model {


public function get($id = null)
	{
		$this->db->select('tabel_produkitem.*, tabel_produkcategory.name as kategori_name, tabel_produkunit.name as unite_name ');
		$this->db->from('tabel_produkitem');
		$this->db->join('tabel_produkcategory', 'tabel_produkcategory.category_id = tabel_produkitem.category_id');
		$this->db->join('tabel_produkunit', 'tabel_produkunit.unit_id = tabel_produkitem.unit_id');
		if($id != null) {
			$this->db->where('item_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('item_id', $id);
        $this->db->delete('tabel_produkitem'); //ini tabel

    }

public function tambah($post){
	$params['barcode'] = $post['barcodete'];
$params['name'] = $post['jenenge'];
$params['category_id'] = $post['category'];
$params['unit_id'] = $post['unit'];
$params['price'] = $post['rego'];
$params['created'] = date('Y-m-d H:i:s');
		
		$this->db->insert('tabel_produkitem', $params);
}

public function edit($post){
	$params['barcode'] = $post['barcodete'];
	$params['name'] = $post['jenenge'];
	$params['category_id'] = $post['category'];
	$params['unit_id'] = $post['unit'];
	$params['price'] = $post['rego'];

			
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('item_id', $post['id']);
		$this->db->update('tabel_produkitem', $params);
	
	}

	function check_barcode($code, $id= null) {
		$this->db->from('tabel_produkitem');
		$this->db->where('barcode', $code);
		if ($id != null) {
			$this->db->where('item_id !=', $code);
		}

		$query = $this->db->get();
		return $query;
	}



	
}