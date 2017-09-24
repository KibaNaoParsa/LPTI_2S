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

			$this->db->select('TURMA.idTURMA, TURMA.SERIE, CURSO.NOME');
			$this->db->from('TURMA');
			$this->db->join('CURSO', 'TURMA.idCURSO = CURSO.idCURSO', 'inner');
			$this->db->join('MUT', 'MUT.TURMA_idTURMA = TURMA.idTURMA', 'inner');
			$this->db->where('MUT.USUARIO_idUSUARIO', $id);
			$this->db->distinct();		
			$data['TURMA'] = $this->db->get()->result();

			$data['url'] = base_url();
			$data['idUSUARIO'] = $id;

			$this->parser->parse('Professor/listar', $data);
			
		}
		
		public function v_disciplina($idUSUARIO, $idTURMA) {

			$this->db->select('TURMA.SERIE, CURSO.NOME');
			$this->db->from('TURMA');
			$this->db->join('CURSO', 'CURSO.idCURSO = TURMA.idCURSO', 'inner');
			$this->db->where('TURMA.idTURMA', $idTURMA);
			$data['INN'] = $this->db->get()->result();



			$this->db->select('MUT.TURMA_idTURMA, MUT.MATERIA_idMATERIA, MATERIA.NOME');
			$this->db->from('MUT');
			$this->db->join('TURMA', 'TURMA.idTURMA = MUT.TURMA_idTURMA','inner');
			$this->db->join('MATERIA', 'MATERIA.idMATERIA = MUT.MATERIA_idMATERIA','inner');
			$this->db->where('MUT.USUARIO_idUSUARIO', $idUSUARIO);
			$this->db->where('MUT.TURMA_idTURMA', $idTURMA);
			
			$data['MATERIA'] = $this->db->get()->result();
			$data['idUSUARIO'] = $idUSUARIO;
			$data['idTURMA'] = $idTURMA;
				
			$data['url'] = base_url();
			$this->parser->parse('ajaxProf', $data);
			$this->parser->parse('Professor/disciplina', $data);			
		}


		public function v_questionario($idU, $idT, $idM) {
			
			$ano = date("Y");
			
			$this->db->select("QUESTIONARIO_has_TURMA.QUESTIONARIO_idQUESTIONARIO, QUESTIONARIO.NOME");
			$this->db->from("QUESTIONARIO_has_TURMA");
			$this->db->join("QUESTIONARIO", "QUESTIONARIO.idQUESTIONARIO = QUESTIONARIO_has_TURMA.QUESTIONARIO_idQUESTIONARIO", "inner");
			$this->db->where("QUESTIONARIO_has_TURMA.TURMA_idTURMA", $idM);
			$this->db->where("QUESTIONARIO_has_TURMA.ANO", $ano);
			$data['QUEST'] = $this->db->get()->result();		
				
			$data['idUSUARIO'] = $idU;
			$data['idTURMA'] = $idT;
			$data['idMATERIA'] = $idM;
			
			$data['url'] = base_url();

			$this->parser->parse('Professor/questionario', $data);			
										
		}


		public function v_telaprincipal($idU, $idT, $idM) {
		
			$ano = date("Y");
				
			$this->db->select("ALUNO.idALUNO, ALUNO.NOME");
			$this->db->from("ALUNO");
			$this->db->inner("TURMA_has_ALUNO", "TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO", "inner");
			$this->db->inner("TURMA_has_ALUNO", "TURMA_has_ALUNO.ANO = ".$ano, "inner");
			$this->db->where("TURMA_has_ALUNO.TURMA_idTURMA", $idT);
			$data['ALUNOS'] = $this->db->get()->result();					
					
				
		}


		// Fim de chamada de view


}
