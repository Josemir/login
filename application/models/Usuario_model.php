<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Função ativa já, sendo utilizada para autenticar usuário
class Usuario_model extends CI_Model {
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
    public function cadastrar($data) {
        $this->db->insert('usuarios', $data);
    }
}

?>

