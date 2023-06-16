<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProdutosModel');
        // duvida aqui
        $this->load->library('session');
        $this->load->helper('url'); 
    }

    
   // Função para autenticar o usuário
    public function autenticar() {

        $this->load->helper('form');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        
        $this->load->model('Usuario_model');
        
        $usuario = $this->Usuario_model->autenticar($username, $password);
        
        if ($usuario) {
                  // Carrega a lista de produtos após o login bem-sucedido
            $data['produtos'] = $this->ProdutosModel->getAllProdutos();
            $this->load->view('listaView', $data);
            // será adicionado depois a confirmação de login e em caso de erro 
        
        }  else {
            
            $data['error'] = 'Usuário ou senha inválidos';
            $this->load->view('loginView', $data);
        }
    }

        // Função para exibir a página de cadastro de usuário
    public function index() {
        $this->load->view('cadastroView');
    }

   
    // função criar usuário equivalente ao create
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
            var_dump($data); // Exibir informações do usuário
    
            if ($usuario_id) {
                // Redirecionar para a página de sucesso com o id do usuário
                $this->load->view('sucessoView' . $usuario_id);
                
            } else {
                // Tratar o erro de inserção
                $data['error'] = 'Erro ao cadastrar usuário';
                $this->load->view('cadastroView', $data);
            }
        }
    }
    
      // Função para exibir a página de sucesso
    public function sucesso() {
        $this->load->view('sucessoView');
    }
}

    
    public function edit()
	{
		    // Função para editar um usuário - a ser implementada
	}

    public function update()
	{
		 // Função para atualizar um usuário - a ser implementada
	}

    public function delete()
	{
		  // Função para excluir um usuário - a ser implementada
	}


            

?>

