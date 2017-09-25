<?php defined('BASEPATH') or exit('No direct script access allowed.');

class Professor extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
//				$this->load->view('login');
			}
        }

		public function index() {
			$data['url'] = base_url();
			$this->parser->parse('telaProf', $data);
		}
		
		// Início de chamada de view

		public function v_listar($id) {

			$ano = date("Y");
			
			$this->db->select("MUT_has_QUESTIONARIO.USUARIO_idUSUARIO, MUT_has_QUESTIONARIO.QUESTIONARIO_idQUESTIONARIO, QUESTIONARIO.NOME as 'NOMEQUESTIONARIO', MUT_has_QUESTIONARIO.MATERIA_idMATERIA, MATERIA.NOME as 'NOMEMATERIA', MUT_has_QUESTIONARIO.TURMA_idTURMA,
		TURMA.SERIE, CURSO.NOME as 'NOMECURSO', MODALIDADE.MODALIDADE, QUESTIONARIO.ANO");
			$this->db->from("MUT_has_QUESTIONARIO");
			$this->db->join('QUESTIONARIO', 'QUESTIONARIO.idQUESTIONARIO = MUT_has_QUESTIONARIO.QUESTIONARIO_idQUESTIONARIO', 'inner');
			$this->db->join("MATERIA", "MATERIA.idMATERIA = MUT_has_QUESTIONARIO.MATERIA_idMATERIA", "inner");
			$this->db->join("TURMA", "TURMA.idTURMA = MUT_has_QUESTIONARIO.TURMA_idTURMA", "inner");
			$this->db->join("CURSO", "CURSO.idCURSO = TURMA.idCURSO", "inner");
			$this->db->join("MODALIDADE", "MODALIDADE.idMODALIDADE = CURSO.MODALIDADE", "inner");
			$this->db->where('MUT_has_QUESTIONARIO.USUARIO_idUSUARIO', $id);
			$this->db->where('QUESTIONARIO.ANO', $ano);
			$data['QUESTIONARIO'] = $this->db->get()->result();
			
			$data['url'] = base_url();
			$this->parser->parse('Professor/listar', $data);
			
		}


		public function v_questionario($idU, $idT, $idM, $idQ) {
    
			$this->db->select("ALUNO.idALUNO, ALUNO.NOME");
			$this->db->from("ALUNO");
			$this->db->join("TURMA_has_ALUNO", "TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO", "inner");
			$this->db->where("TURMA_has_ALUNO.TURMA_idTURMA", $idT);
			$data['ALUNOS'] = $this->db->get()->result();
			
			$this->db->select("DIMENSAO.DESCRICAO as 'DIMENSAO', DIMENSAO.idDIMENSAO, PERGUNTA.idPERGUNTA, PERGUNTA.PERGUNTA");
			$this->db->from("DIMENSAO");
			$this->db->join("PERGUNTA", "PERGUNTA.idDIMENSAO = DIMENSAO.idDIMENSAO", "inner");
			$this->db->where("DIMENSAO.idQUESTIONARIO", $idQ);
			$this->db->where("PERGUNTA.TIPO", 0);
			$data['PERGUNTA_FECHADA'] = $this->db->get()->result();
			
			$this->db->select("DIMENSAO.DESCRICAO as 'DIMENSAO', DIMENSAO.idDIMENSAO, PERGUNTA.idPERGUNTA, PERGUNTA.PERGUNTA");
			$this->db->from("DIMENSAO");
			$this->db->join("PERGUNTA", "PERGUNTA.idDIMENSAO = DIMENSAO.idDIMENSAO", "inner");
			$this->db->where("DIMENSAO.idQUESTIONARIO", $idQ);
			$this->db->where("PERGUNTA.TIPO", 1);
			$data['PERGUNTA_ABERTA'] = $this->db->get()->result();
			
			$data['idUSUARIO'] = $idU;
			$data['idTURMA'] = $idT;
			$data['idMATERIA'] = $idM;
			$data['idQUESTIONARIO'] = $idQ;			
			
			$data['url'] = base_url();

			$this->parser->parse('Professor/questionario', $data);			
										
		}

		// Fim de chamada de view
}
