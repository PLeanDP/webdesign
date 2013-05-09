<?php
class Webdesign_model__admin extends CI_Model {

	public function __construct()
		{
		parent::__construct();
		$this->load->database();
		}



	public function get_designer_list($what_list = "approved")
		{
		if ($what_list == "approved")
			{
			$status = 1;
			$order = "alias";
			}
		else
			{
			$status = 0;
			$order = "the_id";
			}

		$the_query = "select des_id as the_id,des_location as location,(select des_username from DESIGNER_ACCOUNT where des_id = the_id limit 1) as alias, (select file_name from DESIGNER_GALLERY where des_id = the_id limit 1) as thumbnail from DESIGNER WHERE des_status = " . $status . " order by " . $order;
			// produces the_id, des_location, alias, thumbnail		

		$query = $this->db->query($the_query);
		return $query->result_array();
		}


	public function convert_designer_alias_to_id($designer_alias)
		{
		$this -> db -> select('des_id');
		$this -> db -> from('DESIGNER_ACCOUNT');
		$this -> db -> where('des_username', $designer_alias);
		$this -> db -> limit(1);

		$query = $this->db->get();
		
		$res = $query->result_array();

			foreach ($res as $res):
				$id =  $res['des_id'];
			endforeach;

		return $id;
		}



	public function get_specific_designer__details($designer_id)
		{
		$this -> db -> select('des_id,des_fname,des_mname,des_lname,des_contact_no,des_email_add,des_status,des_location');	
		$this -> db -> from('DESIGNER');
		$this -> db -> where('des_id', $designer_id);
		$this -> db -> limit(1);	

		$query = $this->db->get();
		
		return $query->result_array();
		}

	public function get_specific_designer__sites($designer_id)
		{
		$this -> db -> select('file_name,image_name,image_desc');
		$this -> db -> from('DESIGNER_GALLERY');
		$this -> db -> where('des_id', $designer_id);

		$query = $this->db->get();
		
		return $query->result_array();
		}



	public function designer__change_status__broadcast($designer_id)
		{
		$data = array(
               'des_status' => '1',
            );

		$this->db->where('des_id', $designer_id);
		$this->db->update('DESIGNER', $data); 
		return;
		}

	public function designer__change_status__to_pending($designer_id)
		{
		$data = array(
               'des_status' => '0',
            );

		$this->db->where('des_id', $designer_id);
		$this->db->update('DESIGNER', $data);
		return;
		}

	public function designer__change_status__delete($designer_id)
		{

		// unplug files
		$this->webdesign_model__admin->designer__change_status__delete_files($designer_id);
		
		// delete designer sites
		$this->db->where('des_id', $designer_id);
		$this->db->delete('DESIGNER_GALLERY'); 
		
		// delete designer account
		$this->db->where('des_id', $designer_id);
		$this->db->delete('DESIGNER_ACCOUNT'); 

		// delete designer details
		$this->db->where('des_id', $designer_id);
		$this->db->delete('DESIGNER'); 
		
		return;
		}	

	public function designer__change_status__delete_files($designer_id)
		{
		$this -> db -> select('file_name');
		$this -> db -> from('DESIGNER_GALLERY');
		$this -> db -> where('des_id', $designer_id);
	
		$query = $this->db->get();
		
		$res = $query->result_array();

			foreach ($res as $res):
				$file =  $res['file_name'];
				$file_path = BASEPATH  . '../designers_sites/'  . $file;
				unlink($file_path);
			endforeach;
		}

	
	public function designer__change_status__redirect($designer_alias,$delete = 0)
		{
		$designer_alias = $this->webdesign_model__main->form_validation__string_convert("in",$designer_alias);

		if ($delete = 0)
			{
			$add = "webdesign_admin/designer_profile/$designer_alias";
			}		
		else
			{
			$add = "webdesign_admin";
			}

		redirect($add, 'refresh');
		}













	public function admin_login()
		{
		$valid = $this->webdesign_model__admin->admin_login__validate();
				
		if ( $valid == 1 )
			{
			$this->webdesign_model__admin->admin_login__create_session();
			return 1;
			}
		else
			{
			return $valid;
			}

		}





	public function admin_login__validate()
		{
		$admin = $this->input->post('adm_admin');
		$pass = $this->input->post('adm_pass');
		
		$valid_post = $this->webdesign_model__admin->admin_login__validate__post();
		$valid_admin = $this->webdesign_model__admin->admin_login__validate__admin();
		
		if ( $valid_post == 1 )
			{
			if ($valid_admin == 1)
				{
				return 1;
				}
			else
				{
				return $valid_admin;
				}			
			}
		else
			{
			return $valid_post;
			}
		}


	public function admin_login__validate__post()
		{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('adm_admin', 'admin', 'required');
		$this->form_validation->set_rules('adm_pass', 'password', 'required');


		if( $this->form_validation->run() == 1 )
			{
			return 1;
			} 
		else
			{
			$validation_errors = "";

			if (form_error('adm_admin') !== "")
				{
				$validation_errors .=  "-" . form_error('adm_admin') . "0";
				}
			if (form_error('adm_pass') !== "")
				{
				$validation_errors .=  "-" . form_error('adm_pass') . "0";
				}
			
			$validation_errors = $this->webdesign_model__main->form_validation__string_convert("in",$validation_errors);

			return $validation_errors;
			}
		
		}


	public function admin_login__validate__admin()
		{
		$admin = $this->input->post('adm_admin');
		$pass = $this->input->post('adm_pass');	

		$this -> db -> select('adm_username,adm_password');
		$this -> db -> from('ADMIN_ACCOUNT');
		$this -> db -> where('adm_username', $admin);
		$this -> db -> where('adm_password', $pass);
		$this -> db -> limit(2);

		$query = $this -> db -> get();

		if($query -> num_rows() >= 1)
			{
			return 1;
			}
		else
			{
			$error_note = "invalid admin/password combination";
				$error_note = $this->webdesign_model__main->form_validation__string_convert("in",$error_note);

			return $error_note;
			}
		}


	public function admin_login__create_session()
		{
		$admin = $this->input->post('adm_admin');
		$pass = $this->input->post('adm_pass');	

		$data = array(
                    'admin' => $admin,
                    'password' => $pass,
                    'admin_isloggedin' => true
                    );
	
      $this->session->set_userdata($data);

		return 1;
		}


	public function admin_login__session_check()
		{
		 if(! $this->session->userdata('admin_isloggedin'))
			{
         return 0;
			}
		else
			{
			return 1;
			}
		}

	

	public function admin_logout()
		{
		$this->session->sess_destroy();
		redirect('webdesign_admin/login', 'refresh');
		}

}
