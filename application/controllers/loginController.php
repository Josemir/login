<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProdutosModel');
        // duvida aqui
        $this->load->library('session');
        $this->load->helper('url'); 
    }

    
    
    // função para logar
    public function autenticar() {
        $this->load->helper('form');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->load->model('Usuario_model');
        
        $usuario = $this->Usuario_model->autenticar($username, $password);
    
        var_dump($usuario); // Exibir informações do usuário
        
        if ($usuario) {
            // adicionei aqui
            $data['produtos'] = $this->ProdutosModel->getAllProdutos();
            $this->load->view('listaView', $data);
            // será adicionado depois a confirmação de login e em caso de erro 
            var_dump($data['produtos']); // Exibir informações do usuário
        } else {
            $data['error'] = 'Usuário ou senha inválidos';
            $this->load->view('loginView', $data);
        }
    }
    
    

    // irá adicionar as funções de crud
    public function create()
	{
		
	}
    
    public function edit()
	{
		
	}

    public function update()
	{
		
	}

    public function delete()
	{
		
	}


            }

?>

