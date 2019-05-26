<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Modelo model_usuario - Efetua a busca dos dados no banco
 *
 * @author Wagner
 */
class Model_paciente extends CI_Model {

    function cadastra_paciente($dados = NULL) {
        if ($dados !== NULL) {
            $this->db->insert('paciente', $dados);
            return true;
        } else {
            return false;
        }
    }
    function carrega_paciente() {
        $this->db->select('*');
        $this->db->from('paciente');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    
   function retorna_pacientes($campo){
 
        $this->db->select('*');
        $this->db->from('paciente');
        $this->db->like('nome',$campo);
        $this->db->limit(5);

        $query = $this->db->get();
        var_dump($query);
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
     
       
    }


    function conta_paciente() {
        $this->db->select('*');
        $this->db->from('paciente');
        $query = $this->db->get(); 
        $total = $query->num_rows();
        if ($query) {
            return  $total;
        } else {
            return false;
        }
    }

    function carrega_paciente_por_id($id){
        $this->db->select('*');
        $this->db->from('paciente');
        $this->db->where('cod_paciente',$id);
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    function carrega_paciente_filtro($dados){
        $this->db->select('*');
        $this->db->from('paciente');
        
        if(!empty($dados ['nome'])) {
            $this->db->where('nome', $dados ['nome']);
        }else if(!empty($dados ['cod_paciente'])) {
            $this->db->where('cod_paciente', $dados ['cod_paciente']);
                      
        }
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function atualiza_paciente($dados = NULL) {
        if ($dados !== NULL) {
            $this->db->where('cod_paciente', $dados['cod_paciente']);
            $this->db->update('paciente', $dados);
            return true;
        } else {
            return false;
        }
    }

    function deleta_paciente($id) {
        $this->db->select('cod_paciente');
        $this->db->from('paciente');
        $this->db->where('cod_paciente', $id);
        $query = $this->db->get();

            if ($id !== NULL) {

              if($query->num_rows() >= 1){
                
                return 0;

              }
              else{
                $this->db->where('cod_paciente', $id);
                 return $this->db->delete('paciente');
              }
                  
            } else {
                  return false;
                  
            }
    }
}