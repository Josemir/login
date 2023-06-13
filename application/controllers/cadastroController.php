<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cadastroController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Usuario_model');
    }

    public function index() {
        $this->load->view('cadastroView');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('cadastroView');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $data = array(
                'username' => $username,
                'password' => $password
            );
    
            $usuario_id = $this->Usuario_model->cadastrar($data);
    
            if ($usuario_id) {
                // Redirecionar para a página de sucesso com o id do usuário
                redirect('cadastroController/sucesso/' . $usuario_id);
            } else {
                // Tratar o erro de inserção
                $data['error'] = 'Erro ao cadastrar usuário';
                $this->load->view('cadastroView', $data);
            }
        }
    }
    
    public function sucesso() {
        $this->load->view('sucessoView');
    }
}
