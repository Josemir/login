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
             // Obter o nome de usuário e senha do formulário de login
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->load->model('Usuario_model');
        // Chamar o método 'autenticar' do modelo 'Usuario_model' para verificar as credenciais do usuário
        $usuario = $this->Usuario_model->autenticar($username, $password);
        // Se as credenciais forem válidas, carregar a página 'listaView' com os produtos
        if ($usuario) {
            $data['produtos'] = $this->ProdutosModel->getAllProdutos();
            $this->load->view('listaView', $data);
        } else {
            // Se as credenciais forem inválidas, exibir uma mensagem de erro na página 'loginView'
            $data['error'] = 'Usuário ou senha inválidos';
            $this->load->view('loginView', $data);
        }
    }
    
    public function create() {
        // Exibe o formulário de criação de produto
        $this->load->view('createView');
    }
    
    // http://[::1]/login/index.php/loginController/create
        // Obter os dados do produto do formulário
    public function store() {
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'preco' => $this->input->post('preco'),
            'data' => $this->input->post('data')
        );
           // Chamar o método 'insertProduto' do modelo 'ProdutosModel' para inserir o produto
        $this->ProdutosModel->insertProduto($data);
        
        redirect('loginController/lista'); // Redireciona após a inserção
    }
      // Obter os dados do produto com base no ID fornecido e carregar a página 'editView' com esses dados
    public function edit($id) {
        $data['produto'] = $this->ProdutosModel->getProduto($id);
        $this->load->view('editView', $data);
    }
        // Obter os dados atualizados do produto do formulário
    public function update($id) {
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'preco' => $this->input->post('preco'),
            'data' => $this->input->post('data')
        );
               // Chamar o método 'updateProduto' do modelo 'ProdutosModel' para atualizar o produto com o ID fornecido
        $this->ProdutosModel->updateProduto($id, $data);
        
        
        redirect('loginController/lista'); // Redireciona para a página de autenticação após a atualização
    }
      // Chamar o método 'deleteProduto' do modelo
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
