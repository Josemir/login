<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Função ativa já, sendo utilizada para autenticar usuário
class Usuario_model extends CI_Model {
    
    /**
     * Autentica um usuário com base no nome de usuário e senha fornecidos.
     *
     * @param string $username - Nome de usuário do usuário
     * @param string $password - Senha do usuário
     * @return mixed - Retorna o objeto do usuário autenticado se a autenticação for bem-sucedida, caso contrário retorna false
     */

    public function autenticar($username, $password) {

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('usuarios');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    /**
     * Cadastra um novo usuário na tabela de usuários.
     *
     * @param array $data - Dados do usuário a serem cadastrados
     * @return void
     */
    
    public function cadastrar($data) {
        $this->db->insert('usuarios', $data);
    }
}

?>

