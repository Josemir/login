<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdutosModel extends CI_Model {

    public function getAllProdutos() {
        return $this->db->get('produtos')->result();
    }
    
    public function getProduto($id) {
        return $this->db->get_where('produtos', array('id' => $id))->row();
    }
    
    public function insertProduto($data) {
        $this->db->insert('produtos', $data);
    }
    
    public function updateProduto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('produtos', $data);
    }
    
    public function deleteProduto($id) {
        $this->db->where('id', $id);
        $this->db->delete('produtos');
    }
}
?>
