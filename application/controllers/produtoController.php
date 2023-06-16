<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdutosModel extends CI_Model {
 // Retorna todos os produtos da tabela 'produtos'
    public function getAllProdutos() {
        return $this->db->get('produtos')->result();
    }
     // Retorna um produto específico com base no ID fornecido
    public function getProduto($id) {
        return $this->db->get_where('produtos', array('id' => $id))->row();
    }
      // Insere um novo produto na tabela 'produtos' com os dados fornecidos
    public function insertProduto($data) {
        $this->db->insert('produtos', $data);
    }
    // Atualiza um produto na tabela 'produtos' com os dados fornecidos, usando o ID fornecido como filtro
    public function updateProduto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('produtos', $data);
    }
      // Exclui um produto da tabela 'produtos' com base no ID fornecido
    public function deleteProduto($id) {
        $this->db->where('id', $id);
        $this->db->delete('produtos');
    }
}
?>
