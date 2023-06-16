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
                // Carregar a view 'cadastroView' que contém o formulário de cadastro
        $this->load->view('cadastroView');
    }

    public function cadastrar() {
         // Definir as regras de validação para os campos 'username' e 'password'
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
           // Verifica se as regras de validação foram atendidas
        if ($this->form_validation->run() == FALSE) {
            // Se as regras não foram atendidas, recarregar a página de cadastro
            $this->load->view('cadastroView');
        } else {
             // Obter os valores de entrada do formulário
            $username = $this->input->post('username');
            $password = $this->input->post('password');
             // Criar um array com os dados do usuário
            $data = array(
                'username' => $username,
                'password' => $password
            );
               // Chamar o método cadastrar do modelo Usuario_model e obter o ID do usuário inserido
            $usuario_id = $this->Usuario_model->cadastrar($data);
                // Se o ID do usuário for obtido com sucesso, redirecionar para a página de sucesso com o ID do usuário
            if ($usuario_id) {
                // Redirecionar para a página de sucesso com o id do usuário
                redirect('cadastroController/sucesso/' . $usuario_id);
            } else {
                   // Se ocorrer um erro durante a inserção do usuário, exibir uma mensagem de erro na página de cadastro
                $data['error'] = 'Erro ao cadastrar usuário';
                $this->load->view('cadastroView', $data);
            }
        }
    }
           // Exibir a página de sucesso após o cadastro do usuário
           public function sucesso($usuario_id) {
        $this->load->view('sucessoView');
    }
}
