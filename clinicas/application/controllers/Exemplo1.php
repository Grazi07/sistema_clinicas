<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo1 extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Exemplo1_model');
	}

	public function index(){
		$dados['titulo'] = 'Welcome to Exemplol 1!';
		$dados['conteudo']= 'Essa é a primeira view a partir do controlador ';
		$this->load->view('exemplo1', $dados);
	}
	public function login(){
		$this->Exemplo1_model->salvar();
	}
}
