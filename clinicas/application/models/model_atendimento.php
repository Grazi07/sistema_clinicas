<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Modelo model_usuario - Efetua a busca dos dados no banco
 *
 * @author Wagner
 */
class Model_atendimento extends CI_Model {

    function cadastra_atendimento($dados = NULL) {
        if ($dados !== NULL) {
            $this->db->insert('atendimento', $dados);
            return true;
        } else {
            return false;
        }
    }
    function carrega_atendimento() {
        $this->db->select('*');
        $this->db->from('atendimento');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    function somacusto() {
        $this->db->select_sum('custo'); 
        $this->db->from('manutencao');
        $query = $this->db->get(); 

           //var_dump($query->result());
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    
    
    function carrega_atendimento_especifico($id){
        $this->db->select('*');
        $this->db->from('atendimento');
        $this->db->where('cod_atendimento',$id);
        $query = $this->db->get();
        if ($query) {
          
            return $query->result();
            
        } else {
            return false;
        }
    }

    function carregamanutencaorelatorio($id){
        $this->db->select('*');
        $this->db->from('manutencao');
        $this->db->where('codEquipamento',$id);
        $query = $this->db->get();
        if ($query) {
           $v = $query->result();
           //var_dump($v);
            return $query->result();
            
        } else {
            return false;
        }
    }
    function carrega_atendimento_filtro($dados) {
        if ($dados !== NULL) {
            $this->db->select('*');
            $this->db->from('atendimento');
            if (!empty($dados['cod_atendimento'])) {
                $this->db->where('cod_atendimento', $dados['cod_atendimento']);
            }else {
                if (!empty($dados['cod_paciente'])) {
                    $this->db->where('cod_paciente', $dados['cod_paciente']);
                } else {
                    $this->db->where('cod_medico',  $dados['cod_medico']);
                }
            }
            $this->db->limit(5);
            $query = $this->db->get();
            if ($query) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function atualiza_atendimento($dados = NULL) {
        if ($dados !== NULL) {
            $this->db->where('cod_atendimento', $dados['cod_atendimento']);
            $this->db->update('atendimento', $dados);
            return true;
        } else {
            return false;
        }
    }

    function deleta_atendimento($id) {
            if ($id !== NULL) {
              $this->db->where('cod_atendimento', $id);
              return $this->db->delete('atendimento');
                  
            } else {
                  return false;
                  
            }
    }
}