<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$data['msg'] = '';
		$data['url'] = base_url();
		$data['modal'] = '';
		$this->parser->parse('login', $data);
	}

	public function efetuar_login(){
		$this->load->library('session');
		$login['LOGIN'] = $this->input->post('txt_nome');
		$login['SENHA'] = sha1($this->input->post('txt_senha'));
		$data = $this->db->get_where('USUARIO', $login)->result_array();
		if(count($data) > 0){
			$array=array("login"=>true);
			$this->session->set_userdata($array);
			if($data[0]['TIPO'] == 1)
          $this->loginAsAdm();
			else if($data[0]['TIPO'] == 2)
				$this->loginAsEst();
			else{
				$this->loginAsCoord();
			}
		}
		else{
			$this->session->sess_destroy();
			$data['msg'] = 'Login ou Senha Inválidos';
			$data['url'] = base_url();
			$data['modal'] = "$(window).on('load',function(){
						  $('#login-modal').modal('show');
						  });";
			$this->parser->parse('login', $data);
		}
	}

	public function efetuar_logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('/');
	}

	public function loginAsAdm(){
		$this->load->library('session');
		$data['url'] = base_url();
		$this->parser->parse('telaAdm', $data);
	}

	public function loginAsCoord(){
		$this->load->library('session');
		$data['url'] = base_url();
		$this->parser->parse('telaCoord', $data);
	}

	public function loginAsEst(){
		$this->load->library('session');
		$data['url'] = base_url();
		$this->parser->parse('telaEst', $data);
	}
}