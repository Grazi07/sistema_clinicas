<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentica extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url','security'));
		$this->load->model('model_usuario', '', TRUE);

	}


	function index(){
		

        $this->load->library('form_validation');
		

		$this->form_validation->set_message('required', 'Campo %s obrigatório!');
		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required');
		

		if($this->form_validation->run() == FALSE):
			$dados['formerror'] = validation_errors();
			$dados['titulo'] = 'Login';
			//$this->load->view('login', $dados);
			$this->load->view('view_login', $dados);
			
		else:
			
			$usuario = $this->input->post('usuario');
			$senha = $this->input->post('senha');

			$this->load->model('model_usuario');

			$result = $this->model_usuario->loga($usuario, $senha);

			
			if((isset($result)) && (!empty($result))){
				
				foreach ($result as $usuario) {
					$meu_array =array(
						'codUsuario'=>$usuario->codUsuario,
						'nomeUsuario'=>$usuario->nome,
						'emailUsuario'=>$usuario->email,
						'loginUsuario'=>$usuario->login,
						'dataCadastro'=>$usuario->dataCadastro
					);
				}

				
				$this->session->set_userdata('logged_in', $meu_array);
				redirect('Principal/dashboard', 'refresh');

			}else{
				$this->session->set_flashdata("danger", "Usuário ou senha inválidos.");
				
				
				redirect('Principal/index', 'refresh');
				

			}

			
		endif;

	}

}