<?php
class Webdesign_model__designer extends CI_Model {

	public function __construct()
		{
		parent::__construct();
		$this->load->database();

		$this->load->library('accountmanager');
		
		$this->load->helper('url');
		}
	
	

	


	public function designer_login__session_check()
		{
		 if(! $this->session->userdata('designer_isloggedin'))
			{
         return 0;
			}
		else
			{
			return 1;
			}
		}






	public function designer_login__validate()
		{
			
		$designer = $this->input->post('des_username');
		$password = $this->input->post('des_password');

		$designer_accmgr = $this->accountmanager;
		
		$valid_post = $this->webdesign_model__designer->designer_login__validate__post();
		
		if ($valid_post == 1)
			{

			if(!$des_id = $designer_accmgr->validate_designer($designer,$password))
				{
				$error_msg = $this->authentication_failed($accmgr->get_error_message());
					$error_msg = $this->webdesign_model__main->form_validation__string_convert("in",$error_msg);
			
				return $error_msg;			
				}
			else
				{			
					$designer_accmgr->create_session($des_id);
					return 1;
				//redirect('designer');	
				}

			}
		else
			{
			return $valid_post;
			}

		

		}



	public function designer_login__validate__post()
		{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('des_username', 'username', 'required');
		$this->form_validation->set_rules('des_password', 'password', 'required');


		if( $this->form_validation->run() == 1 )
			{
			return 1;
			}
		else
			{
			$validation_errors = "";

			if (form_error('des_username') !== "")
				{
				$validation_errors .=  "-" . form_error('des_username') . "0";
				}
			if (form_error('des_password') !== "")
				{
				$validation_errors .=  "-" . form_error('des_password') . "0";
				}
			
			$validation_errors = $this->webdesign_model__main->form_validation__string_convert("in",$validation_errors);

			return $validation_errors;
			}
		}

	

}
