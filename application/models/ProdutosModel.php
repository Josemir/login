<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// em curso, será adicionado o model de usuário e de produto com mais informações
class ProdutosModel extends CI_Model {

	public function listar_todos()
	{  
		$this->db->select("id, titulo, estoque");
		
        $resultado = $this->db->get("mangas")->result();
		
        return $resultado;
	}
}

