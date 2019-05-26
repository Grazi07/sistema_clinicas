<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
        date_default_timezone_set('America/Bahia');
	}

    public function index()
    {
        
        $this->load->view('view_index.php');
        
    }

    /*function index(){
        $this->load->view('index.php');
    }*/

    function pdf_gen(){
        if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;

             if ($this->input->get()) {
                if ((!empty(trim($this->input->get('id'))))) {
                    $id = $this->input->get('id');
                    $this->load->model('model_equipamento');
                    $dados ['resultadoEquipamento'] = $this->model_equipamento->carregaequipamentoporid($id);
                    $this->load->model('model_manutencao');
                    $resultadomanutencao = $this->model_manutencao->carregamanutencaorelatorio($id);
                    if ($resultadomanutencao !== FALSE) {

                        $dados ['resultadomanutencao'] = $resultadomanutencao;
                        //echo "-------------------------";
                        //var_dump($dados['resultadomanutencao']);
                        $this->load->library('pdf');
                        $this->pdf->load_view('main_report', $dados);

                    }else{
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Não foi possível gerar relatório.';
                        $dados ['tela'] = 'manutencao/view_listamanutencao';
                        $this->load->view('view_index', $dados);
                    }
                }else{
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Não foi possível gerar relatório.';
                        $dados ['tela'] = 'manutencao/view_formconsultamanutencao';
                        $this->load->view('view_index', $dados); 
                    }
            }
        }
    } 
                
                

    function agenda()
    {
         $dados['titulo'] = 'Agenda';
         $dados ['tela'] = 'view_agenda';
         $this->load->view('view_index', $dados);
    }


        function logout() {
            date_default_timezone_set('America/Bahia');
            $session = $this->session->userdata('logged_in');
            $dados['nome'] = $session['nomeUsuario'];
            $dados['acesso'] = date('Y/m/d H:i:s');

            $this->load->model('model_usuario');
            $this->model_usuario->alteraacesso($dados);




        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('Principal', 'refresh');
    }
	


	public function dashboard()
	{

		//if((isset($meu_array)) && (!empty($meu_array))){
				//$dados['titulo'] = 'Admin Home Page';
		if ($this->session->userdata('logged_in')) {
             
              $this->load->model('model_manutencao');
              $this->load->model('model_usuario');
              $this->load->model('model_equipamento');

              $resultadosoma = $this->model_manutencao->somacusto();
              $resultadonumusuario = $this->model_usuario->contausuario();
              $resultadonumequip = $this->model_equipamento->contaequipamento();

              $dados['resultadonumusuario'] = $resultadonumusuario;
              $dados['resultadonumequip'] = $resultadonumequip;

              $dados ['resultadosoma'] = $resultadosoma;

              $this->load->view('view_index', $dados);
        } else {
            redirect('login', 'refresh');
        }
		
	}

	function requicaoajax() {
        
          if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;
            $dados ['tela'] = 'view_requisicaojquery';
            $this->load->view('view_index', $dados);
        } else {
            redirect('login', 'refresh');
        }
    }

    /*
        -----------------Médico---------------------
    */
    function cadastra_medico() {
      
            if ($this->input->post()) {
                if ((!empty(trim($this->input->post('nome')))) ||
                    (!empty(trim($this->input->post('crm')))) || 
                    (!empty(trim($this->input->post('email')))) || 
                    (!empty(trim($this->input->post('especialidade'))))) {

                    $dados_medico ['nome'] = $this->input->post('nome');
                    $dados_medico ['crm'] = $this->input->post('crm');
                    $dados_medico ['email'] = $this->input->post('email');
                    $dados_medico ['especialidade'] = $this->input->post('especialidade');
                   
                    $this->load->model('model_medico');
                    $resultado_cadastro_medico = $this->model_medico->cadastra_medico($dados_medico);
                    if ($resultado_cadastro_medico) {
                        $dados ['msg'] = 'Médico cadastrado com sucesso!';
                        $dados ['telaativa'] = 'medico';
                        $dados ['tela'] = 'medico/view_lista_medico';
                        redirect('lista_medico', 'refresh');
                    } else {
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Ocorreu um erro ao cadastrar o médico! Atualize a página e tente novamente';
                        $dados ['tela'] = 'medico/view_cadastro_medico';
                    }
                    $this->load->view('view_index', $dados);
                } else {
                    $dados ['telaativa'] = 'medico';
                    $dados ['msg'] = 'Dados Incompletos! Preencha os dados e tente novamente.';
                    $dados ['tela'] = 'medico/view_cadastro_medico';
                    $this->load->view('view_index', $dados);
                }
        }else{
                $dados ['telaativa'] = 'medico';
                $dados ['tela'] = 'medico/view_cadastro_medico';
                $this->load->view('view_index', $dados);
            }
    }
    

	

	function lista_medico() {
        
            $this->load->model('model_medico');
            $resultado_medico = $this->model_medico->busca_medicos();
            
            if($resultado_medico !== FALSE){
                $dados ['resultado_medico'] = $resultado_medico;
                $dados ['telaativa'] = 'medico';
                $dados ['tela'] = 'medico/view_lista_medico';
                $this->load->view('view_index', $dados);
            }
            else{
                $dados ['telaativa'] = 'medico';
                    $dados ['msg'] = 'Ainda não existem médicos cadastrados!';
                    $dados ['tela'] = 'medico/view_cadastro_medico';
                    $this->load->view('view_index', $dados); 
            }
        
    }

     function consulta_medico() {
        $this->load->model('model_medico');
            if ($this->input->post()) {

                if ((!empty(trim($this->input->post('nome')))) ||
                    (!empty(trim($this->input->post('crm'))))){

                    $dados_medico ['nome'] = $this->input->post('nome');
                    $dados_medico ['login'] = $this->input->post('crm');
                                       
                    $this->load->model('model_medico');
                    $resultado_medico = $this->model_medico->consulta_medico($dados_medico);

                    if ($resultado_medico) {
                        $dados ['telaativa'] = 'medico';
                        $dados ['resultado_medico'] = $resultado_medico;
                        $dados ['tela'] = 'medico/view_lista_medico';
                        $this->load->view('view_index', $dados);
                    } else {
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Nenhum médico localizado para os dados informados! Tente novamente';
                        $dados ['tela'] = 'médico/view_formconsulta_medico';
                        $this->load->view('view_index', $dados);
                    }
                } else {
                    $dados ['telaativa'] = 'medico';
                    $dados ['msg'] = 'Dados Incompletos! Preencha os dados e tente novamente';
                    $dados ['tela'] = 'medico/view_formconsulta_medico';
                    $this->load->view('view_index', $dados);
                }
            } 
            else if ($this->input->get()) {
                if ($this->input->get('id')) {
                    $id = (int) $this->input->get('id');
                    $this->load->model('model_medico');
                    $resultado_medico_especifico = $this->model_medico->consulta_medico_especifico($id);
                    if ($resultado_medico_especifico) {
                        $dados ['telaativa'] = 'médico';
                        $dados ['resultado_medico_especifico'] = $resultado_medico_especifico;
                        $dados ['tela'] = 'medico/view_lista_medico';
                        $this->load->view('view_index', $dados);
                    } else {
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Nenhum Médico localizado  para os dados informados! Tente novamente';
                        $dados ['tela'] = 'medico/view_lista_medico';
                        $this->load->view('view_index', $dados);
                    }
                }
            } else {
                $dados ['telaativa'] = 'medico';
                $dados ['tela'] = 'medico/view_formconsulta_medico';
                $this->load->view('view_index', $dados);
            }
        
    }


    function atualiza_medico() {
        /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;*/
            if ($this->input->post()) {
                if ((!empty(trim($this->input->post('id')))) || (!empty(trim($this->input->post('nome')))) || (!empty(trim($this->input->post('login')))) || (!empty(trim($this->input->post('email'))))) {
                    $dados_medico ['id'] = $this->input->post('id');
                    $dados_medico ['nome'] = $this->input->post('nome');
                    $dados_medico ['crm'] = $this->input->post('login');
                    $dados_medico ['email'] = $this->input->post('email');
                    $dados_medico ['especialidade'] = $this->input->post('especialidade');
                    $this->load->model('model_medico');
                    $resultado_atualiza_medico = $this->model_medico->atualiza_medico($dados_medico);
                    if ($resultado_atualiza_medico) {
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Médico alterado com sucesso!';
                        $dados ['tela'] = 'medico/view_lista_medico';
                        redirect('lista_medico','refresh');
                    } else {
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Ocorreu um erro ao alterar o médico! Atualize a página e tente novamente';
                        $dados ['tela'] = 'medico/view_formconsulta_medico';
                        $this->load->view('view_index', $dados);
                    }
                } else {
                    $dados ['telaativa'] = 'medico';
                    $dados ['msg'] = 'Dados Incompletos! Preencha os dados e tente novamente';
                    $dados ['tela'] = 'medico/view_formconsulta_medico';
                    $this->load->view('view_index', $dados);
                }
            } else if ($this->input->get('id')) {
                  $id = (int) $this->input->get('id');
                    $this->load->model('model_medico');
                    $resultado_medico_especifico = $this->model_medico->consulta_medico_especifico($id);
                
                        $dados ['telaativa'] = 'medico';
                        $dados ['resultado_medico_especifico'] = $resultado_medico_especifico;
                        $dados ['tela'] = 'medico/view_formaltera_medico';
                        $this->load->view('view_index', $dados);
               
            }else{
                $dados ['telaativa'] = 'medico';
                $dados ['tela'] = 'medico/view_formconsulta_medico';
                $this->load->view('view_index', $dados);
            }
        
    }

    function deleta_medico() {
        /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;*/
            if ($this->input->get()) {
                if ((!empty(trim($this->input->get('id'))))) {
                    $id = $this->input->get('id');
                    $this->load->model('model_medico');
                    $resultado_deleta_medico= $this->model_medico->deleta_medico($id);
                    if ($resultado_deleta_medico !== FALSE) {
                        
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Médico deletado com sucesso!';
                        $dados ['tela'] = 'medico/view_lista_medico';
                        redirect('lista_medico', 'refresh');
                    } else {
                        $dados ['telaativa'] = 'medico';
                        $dados ['msg'] = 'Ocorreu um erro ao deletar o médico! Atualize a página e tente novamente';
                        $dados ['tela'] = 'medico/view_lista_medico';
                        $this->load->view('view_index', $dados);
                    }
                } 
            } else {
                $dados ['msg'] = 'Ocorreu um erro ao deletar o médico! ';
                $dados ['telaativa'] = 'medico';
                $dados ['tela'] = 'medico/view_lista_medico';
                $this->load->view('view_index', $dados);
            }
        }
    

     public function retorna_medico(){

        $option = "<option value='Selecione o médico'></option>";
        if ($this->input->post()) {
            $this->load->model("model_medico");
         
            $resultado_medicos = $this->model_medico->retorna_medicos();
            if ($resultado_medicos) {
       
                foreach($medicos -> result() as $linha) {
                $option .= "<option value='$linha->cod_medico'>$linha->nome</option>"; 
                }

            }else {
                    $option .= 'Nenhum Valor Encontrado';
                }
            } else {
                $option .= 'Nenhum Valor Encontrado';
            }
            echo $option;

        
    }


    function retorna_medicos(){
         
        $this->load->model("model_medico");
         
        $medicos = $this->model_medico->retorna_medicos();
         
        $option = "<option value=''></option>";
        foreach($medicos as $linha) {
        $option .= "<option value='$linha->cod_medico'>$linha->nome</option>"; 
        }
         var_dump($option);
        return $option;
    }
//-------------------------fim médico-----------------------------------------------

    function buscausuarioperfil() {
        if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $option = "";
            if ($this->input->post()) {
                $perfil = $this->input->post('perfil');
                $this->load->model('model_usuario');
                $resultadoUsuarioPerfil = $this->model_usuario->buscaUsuarioPerfil($perfil);
                if ($resultadoUsuarioPerfil) {
                    foreach ($resultadoUsuarioPerfil as $Usuario) {
                        $option .= $Usuario->nome;
                    }
                } else {
                    $option .= 'Nenhum Valor Encontrado';
                }
            } else {
                $option .= 'Nenhum Valor Encontrado';
            }
            echo $option;
        }
    }


    /*
     -------------Paciente--------------------------------------------------------------------
     */
    function cadastra_paciente() {
        /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_usuario');
            $resultadoUsuario = $this->model_usuario->buscaUsuarios();
            $dados ['resultadoUsuario'] = $resultadoUsuario;
            */
            if ($this->input->post()) {

                if (    
                        (!empty(trim($this->input->post('nome')))) &&
                        (!empty(trim($this->input->post('sexo')))) &&
                        (!empty(trim($this->input->post('idade')))) &&
                        (!empty(trim($this->input->post('email')))) 
                    ){

                    $dados_paciente ['nome'] = $this->input->post('nome');
                    $dados_paciente ['sexo'] = $this->input->post('sexo');
                                        
                    if($this->input->post('sexo') == '1'){
                        $dados_paciente ['sexo'] = "F";
                    } elseif ($this->input->post('sexo') == '2') {
                        $dados_paciente ['sexo'] = "M";
                    }else{
                        $dados_paciente ['sexo'] = "N";
                    }

                    $dados_paciente ['idade'] = $this->input->post('idade');
                    $dados_paciente['email'] = $this->input->post('email');
                    
                    $this->load->model('model_paciente');
                    $resultado_cadastro_paciente = $this->model_paciente->cadastra_paciente($dados_paciente);
                    if ($resultado_cadastro_paciente) {
                        redirect('lista_paciente','refresh');
                    } else {
                        $dados ['telaativa'] = 'paciente';
                        $dados ['msg'] = 'Ocorreu um erro ao cadastrar o Paciente! Atualize a página e tente novamente';
                        $dados ['tela'] = 'paciente/view_cadastro_paciente';
                    }
                    $this->load->view('view_index', $dados);
                } else {
                    $dados ['telaativa'] = 'paciente';
                    $dados ['msg'] = 'Dados Incompletos! Preencha os dados e tente novamente';
                    $dados ['tela'] = 'paciente/view_cadastro_paciente';
                    $this->load->view('view_index', $dados);
                }
            } else {
                $dados ['telaativa'] = 'paciente';
                $dados ['tela'] = 'paciente/view_cadastro_paciente';
                $this->load->view('view_index', $dados);
            }
        
    }
    function consulta_paciente() {
        /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;
        */
            if ($this->input->post()) {

                $dados['nome'] = $this->input->post('nome');
                $dados['cod_paciente'] = $this->input->post('cod_paciente');
               
                if ((!empty($dados['nome'])) || (!empty($dados['cod_paciente'])) ) {

                    $this->load->model('model_paciente');
                    $resultadoequipamento = $this->model_paciente->carrega_paciente_filtro($dados);


                    if($resultado_paciente == FALSE){
                          $dados ['telaativa'] = 'paciente';
                            $dados ['msg'] = 'Nenhum Paciente localizado para os dados informados! Tente novamente';
                            $dados ['tela'] = 'paciente/view_formconsulta_paciente';
                            $this->load->view('view_index', $dados);
                    }else{
                        $dados ['resultado_paciente'] = $resultado_paciente;
                        $dados ['telaativa'] = 'paciente';
                        $dados ['tela'] = 'paciente/view_lista_paciente';
                        $this->load->view('view_index', $dados);
                    }
                }else{
                    $dados ['telaativa'] = 'paciente';
                    $dados ['msg'] = 'Dados Incompletos! Preencha ao menos um campo e tente novamente.';
                    $dados ['tela'] = 'paciente/view_formconsulta_paciente';
                    $this->load->view('view_index', $dados);
                }
            }
            else{
                $dados ['telaativa'] = 'paciente';
                $dados ['tela'] = 'paciente/view_formconsulta_paciente';
                $this->load->view('view_index', $dados);
            }
        
    }
    function lista_paciente() {
        /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil; */
            $this->load->model('model_paciente');
            if ($this->input->post()) {
                
            } else {
                $resultado_paciente = $this->model_paciente->carrega_paciente();
                $dados ['resultado_paciente'] = $resultado_paciente;
                $dados ['telaativa'] = 'paciente';
                $dados ['tela'] = 'paciente/view_lista_paciente';
                $this->load->view('view_index', $dados);
            }
        
    }

    function altera_paciente() {
       /* if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;*/

           
            if ($this->input->post()) {
                
                $result = $this->input->post();
                //var_dump($result);
                if (
                        (!empty(trim($this->input->post('nome')))) &&
                        (!empty(trim($this->input->post('sexo')))) &&
                        (!empty(trim($this->input->post('idade')))) &&
                        (!empty(trim($this->input->post('email')))) 
                    ){

                    $dados_paciente ['nome'] = $this->input->post('nome');
                      if($this->input->post('sexo') == '1'){
                        $dados_paciente ['sexo'] = "F";
                    } elseif ($this->input->post('sexo') == '2') {
                        $dados_paciente ['sexo'] = "M";
                    }else{
                        $dados_paciente ['sexo'] = "N";
                    }

                    $dados_paciente ['email'] = $this->input->post('idade');
                    $dados_paciente ['email'] = $this->input->post('email');
                   
                    $this->load->model('model_paciente');
                    $resultado_cadastro_paciente = $this->model_paciente->atualiza_paciente($dados_paciente);
                    
                    if ($resultado_cadastro_paciente) {
                        redirect('lista_paciente', 'refresh');
                    } else {
                        $dados ['telaativa'] = 'paciente';
                        $dados ['msg'] = 'Ocorreu um erro ao cadastrar o Paciente! Atualize a página e tente novamente';
                        $dados ['tela'] = 'paciente/view_formalterar_paciente';
                    }
                    $this->load->view('view_index', $dados);
                } else {
                    $dados ['telaativa'] = 'paciente';
                    $dados ['msg'] = 'Dados Incompletos! Preencha os dados e tente novamente';
                    $dados ['tela'] = 'paciente/view_formalterar_paciente';
                    $this->load->view('view_index', $dados);
                }
            } else if ($this->input->get('id')) {
                $id = $this->input->get('id');
                $this->load->model('model_paciente');
                $dados ['resultado_paciente'] = $this->model_paciente->carrega_paciente_por_id($id);
                $dados ['telaativa'] = 'paciente';
                $dados ['tela'] = 'paciente/view_formalterar_paciente';
                $this->load->view('view_index', $dados);
            } else {
                $dados ['telaativa'] = 'paciente';
                $dados ['tela'] = 'paciente/view_formalterar_paciente';
                $this->load->view('view_index', $dados);
            }
        
    }

    function deleta_paciente() {
            /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
                $this->load->model('model_perfil');
                $resultadoPerfil = $this->model_perfil->buscaPerfil();
                $dados ['resultadoPerfil'] = $resultadoPerfil;*/
                if ($this->input->get()) {
                    if ((!empty(trim($this->input->get('id'))))) {
                        $id = $this->input->get('id');
                        $this->load->model('model_paciente');
                        $resultado_deleta_paciente = $this->model_paciente->deleta_paciente($id);
                        if ($resultado_deleta_paciente !== FALSE) {

                            if($resultado_deleta_paciente == 0){
                               $dados ['telaativa'] = 'paciente';
                                $dados ['alerta'] = 'Não foi possível deletar o paciente.';
                                $dados ['tela'] = 'paciente/view_lista_paciente';
                                $this->load->view('view_index', $dados);
                            }
                            else{
                                $dados ['telaativa'] = 'paciente';
                                $dados ['msg'] = 'Paciente deletado com sucesso!';
                                $dados ['tela'] = 'paciente/view_lista_paciente';
                                redirect('lista_paciente', 'refresh');
                            }
                        }
                        else{
                            $dados ['telaativa'] = 'paciente';
                            $dados ['msg'] = 'Ocorreu um erro ao deletar o paciente! Atualize a página e tente novamente.';
                            $dados ['tela'] = 'paciente/view_lista_paciente';
                            $this->load->view('view_index', $dados);
                        }

                      
                    } 
                } else {
                    $dados ['msg'] = 'Ocorreu um erro ao deletar o paciente.';
                    $dados ['telaativa'] = 'paciente';
                    $dados ['tela'] = 'paciente/view_lista_paciente';
                    $this->load->view('view_index', $dados);
                }
            
        }



    public function retorna_pacientes()
    {
        echo "string";
        $campo = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);
        $this->load->model('model_paciente');
         
        $resultado_paciente = $this->model_paciente->retorna_pacientes($campo);
        if ($resultado_paciente !== FALSE) {
            foreach ($resultado_paciente as $paciente) {
                        echo json_encode($paciente->nome);
                    }
        }
        else{
            echo "Nenhum valor encontrado!";
        }
    }
//------------------------------------Fim paciente-----------------------------------------------------------------------
/*

--------------Atendimento----------------
*/
function cadastra_atendimento() {
        /*if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;

            $this->load->model('model_equipamento');
            $resultadoEquipamento = $this->model_equipamento->carregaequipamento();
            $dados ['resultadoEquipamento'] = $resultadoEquipamento; */

            if ($this->input->post()) {
                if ((!empty(trim($this->input->post('paciente')))) || 
                    (!empty(trim($this->input->post('data_atendimento')))) ||
                    (!empty(trim($this->input->post('medico')))) || 
                    (!empty(trim($this->input->post('status'))))) {

                    $dados_atendimento ['paciente'] = $this->input->post('paciente');
                    $dados_atendimento ['data_atendimento'] = $this->input->post('data_atendimento');
                    $dados_atendimento['medico'] = $this->input->post('medico');
                    $dados_atendimento['status'] = $this->input->post('status');
                    //$dadosmanutencao['datainicio'] = date('Y-m-d');
                    
                    $this->load->model('model_atendimento');
                    $resultado_cadastro_atendimento = $this->model_atendimento->cadastra_atendimento($dados_atendimento);
                    if ($resultado_cadastro_atendimento) {
                        $dados ['msg'] = 'Atendimento cadastrado com sucesso!';
                        $dados ['telaativa'] = 'atendimento';
                        $dados ['tela'] = 'atendimento/view_lista_atendimento';
                        redirect('view_lista_atendimento', 'refresh');
                    } else {
                        $dados ['telaativa'] = 'atendimento';
                        $dados ['msg'] = 'Ocorreu um erro ao cadastrar o atendimento! Atualize a página e tente novamente';
                        $dados ['tela'] = 'atendimento/view_cadastro_atendimento';
                    }
                    $this->load->view('view_index', $dados);
                } else {
                    $dados ['telaativa'] = 'atendimento';
                    $dados ['msg'] = 'Dados Incompletos! Preencha os dados e tente novamente.';
                    $dados ['tela'] = 'atendimento/view_cadastro_atendimento';
                    $this->load->view('view_index', $dados);
                }
            } else {
                $dados ['telaativa'] = 'atendimento';
                $dados ['tela'] = 'atendimento/view_cadastro_atendimento';
                $this->load->view('view_index', $dados);
            }
        
    }


    function listamanutencao() {
        if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;
            $this->load->model('model_manutencao');
            if ($this->input->post()) {
                
            } else {
                $resultadomanutencao = $this->model_manutencao->carregamanutencao();
                $dados ['resultadomanutencao'] = $resultadomanutencao;
                $dados ['telaativa'] = 'manutencao';
                $dados ['tela'] = 'manutencao/view_listamanutencao';
                $this->load->view('view_index', $dados);
            }
        }
    }

    function consultamanutencao() {
        if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_manutencao');
            if ($this->input->post()) {
                if ((!empty(trim($this->input->post('codManutencao')))) || (!empty(trim($this->input->post('codEquipamento'))))) {
                    $dados ['codManutencao'] = $this->input->post('codManutencao');
                    $dados ['codEquipamento'] = $this->input->post('codEquipamento');
                    
                    $this->load->model('model_manutencao');
                    $resultadomanutencao = $this->model_manutencao->carregamanutencaofiltro($dados);
                    if ($resultadomanutencao) {
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['resultadomanutencao'] = $resultadomanutencao;
                        $dados ['tela'] = 'manutencao/view_listamanutencao';
                        $this->load->view('view_index', $dados);
                    } else {
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Nenhum Manutenção localizado para os dados informados! Tente novamente';
                        $dados ['tela'] = 'manutencao/view_listamanutencao';
                        $this->load->view('view_index', $dados);
                    }
                }
            } else {
                $dados ['telaativa'] = 'manutencao';
                $dados ['tela'] = 'manutencao/view_formconsultamanutencao';
                $this->load->view('view_index', $dados);
            }
        }
    }

        function deletamanutencao() {
        if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;
            if ($this->input->get()) {
                if ((!empty(trim($this->input->get('id'))))) {
                    $id = $this->input->get('id');
                    $this->load->model('model_manutencao');
                    $resultadodeletamanutencao = $this->model_manutencao->deletamanutencao($id);
                    if ($resultadodeletamanutencao !== FALSE) {
                        
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Manutenção deletada com sucesso!';
                        $dados ['tela'] = 'manutencao/view_listamanutencao';
                        redirect('listamanutencao', 'refresh');
                    } else {
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Ocorreu um erro ao deletar o Manutenção! Atualize a página e tente novamente';
                        $dados ['tela'] = 'manutencao/view_listamanutencao';
                        $this->load->view('view_index', $dados);
                    }
                } 
            } else {
                $dados ['msg'] = 'Ocorreu um erro ao deletar o Manutenção! ';
                $dados ['telaativa'] = 'manutencao';
                $dados ['tela'] = 'manutencao/view_listamanutencao';
                $this->load->view('view_index', $dados);
            }
        }
    }

    function atualizamanutencao() {
        if ($this->session->userdata('logged_in')) { // VALIDA USU�RIO LOGADO
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscaPerfil();
            $dados ['resultadoPerfil'] = $resultadoPerfil;
            if ($this->input->post()) {
                if ((!empty(trim($this->input->post('codManutencao')))) || (!empty(trim($this->input->post('nome')))) || (!empty(trim($this->input->post('login')))) || (!empty(trim($this->input->post('email')))) || (!empty(trim($this->input->post('datainicio')))) || (!empty(trim($this->input->post('datafinal'))))) {
                    $dadosmanutencao ['codManutencao'] = $this->input->post('codManutencao');
                    $dadosmanutencao ['fornecedor'] = $this->input->post('fornecedor');
                    $dadosmanutencao ['custo'] = $this->input->post('custo');
                    $dadosmanutencao ['descricao'] = $this->input->post('descricao');
                    if($this->input->post('garantia') == 'on'){
                        $dadosmanutencao ['garantiaFornecedor'] = $this->input->post('garantia');
                    }
                    $dadosmanutencao ['codEquipamento'] = $this->input->post('codEquipamento');
                    $dadosmanutencao ['dataInicio'] = $this->input->post('datainicio');
                    $dadosmanutencao ['dataFinal'] = $this->input->post('dataFinal');
                    $this->load->model('model_manutencao');
                    $resultadoatualizamanutencao = $this->model_manutencao->atualizamanutencao($dadosmanutencao);
                    if ($resultadoatualizamanutencao) {
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Manutenção alterado com sucesso!';
                        $dados ['tela'] = 'manutencao/view_formconsultamanutencao';
                        $this->load->view('view_index', $dados);
                    } else {
                        $dados ['telaativa'] = 'manutencao';
                        $dados ['msg'] = 'Ocorreu um erro ao alterar o usuario! Atualize a página e tente novamente';
                        $dados ['tela'] = 'manutencao/view_formalteramanutencao';
                        $this->load->view('view_index', $dados);
                    }
                } else {
                    $dados ['telaativa'] = 'usuarios';
                    $dados ['msg'] = 'Dados Imcompletos! Preencha os dados e tente novamente';
                    $dados ['tela'] = 'usuarios/view_formconsultausuario';
                    $this->load->view('view_index', $dados);
                }
            }else if ($this->input->get('id')) {
                $manutencaoid = $this->input->get('id');
                $id = $this->input->get('cod');

                $this->load->model('model_equipamento');
                $dados ['resultadoEquipamento'] = $this->model_equipamento->carregaequipamentoporid($id);

                $this->load->model('model_manutencao');
                $dados ['resultadomanutencao'] = $this->model_manutencao->carregamanutencaoespecifica($manutencaoid);
                $dados ['telaativa'] = 'manutencao';
                $dados ['tela'] = 'manutencao/view_formalteramanutencao';
                $this->load->view('view_index', $dados);
            } else {
                $dados ['telaativa'] = 'manutencao';
                $dados ['tela'] = 'manutencao/view_formalteramanutencao';
                $this->load->view('view_index', $dados);
            }
        }
    }



}