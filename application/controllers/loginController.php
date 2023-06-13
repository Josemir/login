<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProdutosModel');
        $this->load->library('session');
        $this->load->helper(array('url', 'form')); // Carrega as bibliotecas URL e Form
    }

    public function autenticar() {
        $this->load->helper('form');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->load->model('Usuario_model');
        
        $usuario = $this->Usuario_model->autenticar($username, $password);
        
        if ($usuario) {
            $data['produtos'] = $this->ProdutosModel->getAllProdutos();
            $this->load->view('listaView', $data);
        } else {
            $data['error'] = 'Usuário ou senha inválidos';
            $this->load->view('loginView', $data);
        }
    }
    
    public function create() {
        // Exibe o formulário de criação de produto
        $this->load->view('createView');
    }
    
    // http://[::1]/login/index.php/loginController/create
    public function store() {
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'preco' => $this->input->post('preco'),
            'data' => $this->input->post('data')
        );
        
        $this->ProdutosModel->insertProduto($data);
        
        redirect('loginController/lista'); // Redireciona após a inserção
    }
    
    public function edit($id) {
        $data['produto'] = $this->ProdutosModel->getProduto($id);
        $this->load->view('editView', $data);
    }
    
    public function update($id) {
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'preco' => $this->input->post('preco'),
            'data' => $this->input->post('data')
        );
        
        $this->ProdutosModel->updateProduto($id, $data);
        
        
        redirect('loginController/lista'); // Redireciona para a página de autenticação após a atualização
    }
    
    public function delete($id) {
        $this->ProdutosModel->deleteProduto($id);
        
        redirect('loginController/lista'); // Redireciona para a página de autenticação após a exclusão
    }

    // função temporária
    // problema antes da função: repete autenticar;
    public function lista (){
     
    $data['produtos'] = $this->ProdutosModel->getAllProdutos();
            $this->load->view('listaView', $data);
    }
}
?>
