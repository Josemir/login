<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Modelo de Produtos
 */

class ProdutosModel extends CI_Model {
    /**
     * Obtém todos os produtos.
     *
     * @return array - Retorna um array com todos os produtos encontrados
     */

    public function getAllProdutos() {
        return $this->db->get('produtos')->result();
    }

    /**
     * Obtém um produto específico com base no ID fornecido.
     *
     * @param int $id - ID do produto a ser obtido
     * @return object - Retorna o objeto do produto encontrado ou null se não for encontrado
     */

    public function getProduto($id) {
        return $this->db->get_where('produtos', array('id' => $id))->row();
    }

    /**
     * Insere um novo produto na tabela de produtos.
     *
     * @param array $data - Dados do produto a serem inseridos
     * @return void
     */

    public function insertProduto($data) {
        $this->db->insert('produtos', $data);
    }
    
    /**
     * Atualiza um produto existente com base no ID fornecido.
     *
     * @param int $id - ID do produto a ser atualizado
     * @param array $data - Dados do produto a serem atualizados
     * @return void
     */

    public function updateProduto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('produtos', $data);
    }
    
    /**
     * Exclui um produto com base no ID fornecido.
     *
     * @param int $id - ID do produto a ser excluído
     * @return void
     */

    public function deleteProduto($id) {
        $this->db->where('id', $id);
        $this->db->delete('produtos');
    }
}
?>
