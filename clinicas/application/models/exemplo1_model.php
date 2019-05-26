<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo1_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	
	public function salvar(){
		echo 'executando o método salvar do seu model';
		
	}
}
