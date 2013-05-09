<?php
class Webdesign_pages__admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('webdesign_model__admin');
		$this->load->model('webdesign_model__main');
		$this->load->database();

		$this->load->helper('form');
		$this->load->library('form_validation');
	}


	
	public function login()
		{
		$logged = $this->webdesign_model__admin->admin_login__session_check();
		
		if ($logged == 1)
			{
			$add = "webdesign_admin";
				redirect($add, 'refresh');
			}
		else
			{
			$data['page_title'] = 'admin';
			$data['big_banner'] = 0;
		
			$this->load->view('template/header', $data);
			$this->load->view('webdesign__main/main_header', $data);
			
			$this->load->view('webdesign__admin/forms/login', $data);

			$this->load->view('template/footer', $data);
			}

		
		}


	public function submit_form__admin_login()
		{
		$logged = $this->webdesign_model__admin->admin_login();

			if ($logged == 1)
				{
				redirect('webdesign_admin', 'refresh');
				}
			else
				{
				$add = "webdesign_admin/login/" . $logged;
				redirect($add, 'refresh');
				}
		}	



	public function logout()
		{
		$logged = $this->webdesign_model__admin->admin_logout();
		}


	public function admin()
		{
		$logged = $this->webdesign_model__admin->admin_login__session_check();
		
		if ($logged == 0)
			{
			$add = "webdesign_admin/login/" . $logged;
				redirect($add, 'refresh');
			}
		else
			{
			$data['page_title'] = 'admin';
			$data['big_banner'] = 0;
			$data['designers'] = $this->webdesign_model__main->get_designers_for_main_listing();

			$data['pending_designers'] = $this->webdesign_model__admin->get_designer_list("pending");
			$data['approved_designers'] = $this->webdesign_model__admin->get_designer_list("approved");

			$this->load->view('template/header', $data);
			$this->load->view('webdesign__main/main_header', $data);
			
			$this->load->view('webdesign__admin/designers_body__bridge', $data);
			$this->load->view('webdesign__admin/designers_body__pending', $data);
			$this->load->view('webdesign__admin/designers_body__approved', $data);		

			$this->load->view('template/footer', $data);
			}

		
		}


	
	

	public function designer_profile($designer_alias)
		{
		$logged = $this->webdesign_model__admin->admin_login__session_check();
		
		if ($logged == 0)
			{
			$add = "webdesign_admin/login/" . $logged;
				redirect($add, 'refresh');
			}
		else
			{
			$designer_alias = $this->webdesign_model__main->form_validation__string_convert("out",$designer_alias);

			$data['page_title'] = 'designer\'s profile';
			$data['big_banner'] = 0;
			
			$designer_id = $this->webdesign_model__admin->convert_designer_alias_to_id($designer_alias);

			$data['designer_details'] = $this->webdesign_model__admin->get_specific_designer__details($designer_id);
			$data['designer_sites'] = $this->webdesign_model__admin->get_specific_designer__sites($designer_id);
			$data['alias'] = $designer_alias;

			$this->load->view('template/header', $data);
			$this->load->view('webdesign__main/main_header', $data);
		
			$this->load->view('webdesign__admin/designer_body__bridge', $data);
			$this->load->view('webdesign__admin/designer_body__details', $data);
			$this->load->view('webdesign__admin/designer_body__sites', $data);
		
			$this->load->view('template/footer', $data);
			}

		
		}




	public function designer__change_status($designer_alias, $status_phrase)
		{
		$designer_alias = $this->webdesign_model__main->form_validation__string_convert("out",$designer_alias);
		$designer_id = $this->webdesign_model__admin->convert_designer_alias_to_id($designer_alias);

		if($status_phrase == "broadcast")
			{
			$this->webdesign_model__admin->designer__change_status__broadcast($designer_id);
			$this->webdesign_model__admin->designer__change_status__redirect($designer_alias,0);	
			}
		else if($status_phrase == "to_pending")
			{
			$this->webdesign_model__admin->designer__change_status__to_pending($designer_id);
			$this->webdesign_model__admin->designer__change_status__redirect($designer_alias,0);
			}
		else if($status_phrase == "delete")
			{
			$this->webdesign_model__admin->designer__change_status__delete($designer_id);
			$this->webdesign_model__admin->designer__change_status__redirect($designer_alias,1);
			}
	
		}


	


}
