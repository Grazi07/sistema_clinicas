<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Efetua a busca dos daados no banco
*/

class Model_medico extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	
	public function loga($usuario, $senha){
		$this->db->select('codUsuario');
    $this->db->select('nome');
		$this->db->select('email');
		$this->db->select('login');
		$this->db->select('dataCadastro');
		$this->db->where('login', $usuario);
		$this->db->where('senha', $senha);
		$this->db->limit(1);

		$query = $this->db->get("usuario");
            return $query->result();
       // $result = $this->db->get("usuario")->row_array();
		
	}

  function retorna_medicos(){
 
        $this->db->select('*');
        $this->db->from('medico');
        $query = $this->db->get(); 
     
      if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

  function conta_medico() {
        $this->db->select('*');
        $this->db->from('medico');
        $query = $this->db->get(); 
        $total = $query->num_rows();
        if ($query) {
            return  $total;
        } else {
            return false;
        }
    }

	function buscaUsuarioPerfil($perfil) {
            $this->db->select('nome');
            $this->db->from('usuario');
            $this->db->where('codPerfil', $perfil);
            $this->db->where('status', '1');
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                  return $query->result();
            } else {
                  return false;
            }
    }

    function alteraacesso($dados) { 

      if ($dados !== NULL) {
            $this->db->set('dataUltimoAcesso', $dados['acesso']);
            $this->db->where('nome', $dados['nome']);
            $this->db->update('usuario');
         
           
                  return true;
            } else {
                  return false;
            }
    }

     

    function cadastra_medico($dados = NULL) {
      if ($dados !== NULL) {
          extract($dados);
          $this->db->insert('medico', array(
                'nome' => $dados ['nome'],
                'crm' => $dados ['crm'],
                'email' => $dados ['email'],
                'especialidade' => $dados ['especialidade']
                ));


          return true;
      } 
      else{
          return false;
          }
    }


  function busca_medicos() {
      $this->db->select('*');
      $this->db->from('medico');
            
      $query = $this->db->get();
      if ($query->num_rows() >= 1) {
          return $query->result();
      }
      else{
          return false;
          }
    }


    function consulta_medico($dados = NULL) {
            if ($dados !== NULL) {
                  extract($dados);
                  $this->db->select('*');
                  $this->db->from('medico');
                  
                  if(!empty($dados ['nome'])) {
                        $this->db->where('nome', $dados ['nome']);
                  }else if(!empty($dados ['crm'])) {
                            $this->db->where('crm', $dados ['crm']);
                      
                  }

                  $query = $this->db->get();
                  if ($query->num_rows() >= 1) {
                        return $query->result();
                  } else {
                        return false;
                  }
            } else {
                  return false;
            }
    }
    
    function consulta_medico_especifico($id) {
            $this->db->select('*');
            $this->db->from('medico');
            $this->db->where('cod_medico', $id);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                  return $query->result();
            } else {
                  return false;
            }
    }
      
    function atualiza_medico($dados = NULL) {
            if ($dados !== NULL) {
                  extract($dados);
                  $this->db->where('cod_medico', $dados['id']);
                  $this->db->update('medico', array(
                      'nome' => $dados ['nome'],
                      'crm' => $dados ['crm'],
                      'email' => $dados ['email'],
                      'especialidade' => $dados ['especialidade']
                  ));
                  return true;
            } else {
                  return false;
            }
    }
      
     function deleta_medico($id) {
            if ($id !== NULL) {
              $this->db->where('cod_medico', $id);
              return $this->db->delete('medico');
                 
            } else {
                  return false;
                  
            }
    }

    function buscaPerfil($id) {
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('codUsuario', $id);
            $query = $this->db->get();
            if ($query->num_rows() === 1) {
                  return $query->result();
            } else {
                  return false;
            }
    }

}
