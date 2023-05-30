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
        
        if ($usuario) {
            // adicionei aqui
            $data['produtos'] = $this->ProdutosModel->getAllProdutos();
            $this->load->view('listaView', $data);
            // será adicionado depois a confirmação de login e em caso de erro 
        
        }  else {
            
            $data['error'] = 'Usuário ou senha inválidos';
            $this->load->view('loginView', $data);
        }
    }

   

    // função para cadastrar
    public function registration(){ 
        $data = $userData = array(); 
        
        // código inserido apenas para testar o encaminhar das páginas
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
 
            $userData = array( 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->user->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('users/login'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        $this->load->view('cadastrarView', $data); 
      
    } 

            }

?>

