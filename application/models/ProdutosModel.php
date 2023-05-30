<?php 
class ProdutosModel extends CI_Model {
    public function getAllProdutos() {
        $query = $this->db->get('produtos'); // Especificar o nome da tabela
        return $query->result();
    }
}

	
