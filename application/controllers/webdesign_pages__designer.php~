<?php
class Webdesign_pages__designer extends CI_Controller {

	public function __construct()
		{
		parent::__construct();
		//$this->load->model('webdesign_model__admin');
		$this->load->model('webdesign_model__main');
		$this->load->model('webdesign_model__designer');
		$this->load->database();

		$this->load->helper('form');
		$this->load->library('form_validation');
		}




	public function designer()
		{
		$logged = $this->webdesign_model__designer->designer_login__session_check();
		
		if ($logged == 0)
			{
			$add = "webdesign_designer/login";
				redirect($add, 'refresh');
			}
		else
			{
			$data['page_title'] = 'admin';
			$data['big_banner'] = 0;
		
			$this->load->view('template/header', $data);
			$this->load->view('webdesign__main/main_header', $data);
			
			//$this->load->view('webdesign__admin/forms/login', $data);

			$this->load->view('template/footer', $data);
			}

		}







	public function login()
		{
		$logged = $this->webdesign_model__designer->designer_login__session_check();
		
		if ($logged == 1)
			{
			$add = "webdesign_designer";
				redirect($add, 'refresh');
			}
		else
			{
			$data['page_title'] = 'admin';
			$data['big_banner'] = 0;
		
			$this->load->view('template/header', $data);
			$this->load->view('webdesign__main/main_header', $data);
			
			$this->load->view('webdesign__designer/forms/login', $data);

			$this->load->view('template/footer', $data);
			}
		}



	public function submit_form__designer_login()
		{
		$valid = $this->webdesign_model__designer->designer_login__validate();

		if($valid == 1)
			{
			sessing create
				redirect
			}
		else
			{

			}
		}



}
