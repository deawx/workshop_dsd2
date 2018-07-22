<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model','profile');
	}

	// redirect if needed, otherwise display the user list
	public function index()
	{

		if (!$this->session->has_userdata('is_login'))
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->data['body'] = $this->load->view('auth/index',$this->data,TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
			// $this->_render_page('auth/index', $this->data, TRUE);
		}
	}

	// log the user in
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		if ($this->input->post())
		{
			$_POST['identity'] = str_replace('_','',$_POST['identity']);
		}
		//validate form input
		$this->form_validation->set_rules('identity','หมายเลขบัตรประชาชน','required|integer|exact_length[13]');
		$this->form_validation->set_rules('password','รหัสผ่าน','required');

		if ($this->form_validation->run() == true)
		{
			$login = $this->profile->login($this->input->post('identity'),$this->input->post('password'));
			if ($login)
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_userdata($login);
				$this->session->set_userdata('identity',$login['username']);
				$this->session->set_userdata('is_login',TRUE);
				$this->session->set_flashdata('success','ท่านได้เข้าสู่ระบบเรียบร้อยแล้ว');
				redirect('account/profile', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message','ไม่พบข้อมูล');
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('auth/login',$this->data,TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
			// $this->_render_page('auth/login', $this->data);
		}
	}

	// log the user in
	public function login_admin()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		if ($this->input->post())
		{
			$_POST['identity'] = str_replace('_','',$_POST['identity']);
		}
		//validate form input
		$this->form_validation->set_rules('identity','หมายเลขบัตรประชาชน','required|integer|exact_length[13]');
		$this->form_validation->set_rules('password',str_replace(':','',$this->lang->line('login_password_label')),'required');

		if ($this->form_validation->run() == true)
		{
			$login = $this->db
				->where(array('username'=>$this->input->post('identity'),'password'=>$this->input->post('password')))
				->get('admin');
			if ($login->num_rows())
			{
				$login = $login->row_array();
				$this->session->set_userdata($login);
				$this->session->set_userdata('identity',$login['username']);
				$this->session->set_userdata('is_login',TRUE);
				$this->session->set_userdata('is_admin',TRUE);
				$this->session->set_flashdata('success','ท่านได้เข้าสู่ระบบเรียบร้อยแล้ว');
				redirect('admin/news', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				redirect('auth/login_admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('auth/login_admin',$this->data,TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
			// $this->_render_page('auth/login', $this->data);
		}
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$this->session->sess_destroy();

		redirect('auth/login', 'refresh');
	}

	// change password
	public function change_password()
	{
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->session->has_userdata('is_login'))
		{
			redirect('auth/login', 'refresh');
		}


		if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->session->id,
			);

			// render
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('auth/change_password', $this->data, TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
			// $this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->profile_model->change_password($this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->logout();
			}
			else
			{
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	// forgot password
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('auth/forgot_password', $this->data, TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
			// $this->_render_page('auth/forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

	            		if($this->config->item('identity', 'ion_auth') != 'email')
		            	{
		            		$this->ion_auth->set_error('forgot_password_identity_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_error('forgot_password_email_not_found');
		            	}

                		redirect("auth/forgot_password", 'refresh');
            		}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	// activate the user
	public function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	// deactivate the user
	public function deactivate($id = NULL)
	{
		if (!$this->session->has_userdata('is_login') || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('auth/deactivate_user', $this->data, TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
			// $this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->session->has_userdata('is_login') && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	// create a new user
	public function create_user()
    {
        $this->data['title'] = $this->lang->line('create_user_heading');

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        // $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        // $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->profile->register($identity,$password))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            redirect("auth", 'refresh');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            // $this->data['first_name'] = array(
            //     'name'  => 'first_name',
            //     'id'    => 'first_name',
            //     'type'  => 'text',
            //     'value' => $this->form_validation->set_value('first_name'),
            // );
            // $this->data['last_name'] = array(
            //     'name'  => 'last_name',
            //     'id'    => 'last_name',
            //     'type'  => 'text',
            //     'value' => $this->form_validation->set_value('last_name'),
            // );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

						$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
						$this->data['body'] = $this->load->view('auth/create_user', $this->data, TRUE);
						$this->load->view('_layouts/fullwidth', $this->data);
            // $this->_render_page('auth/create_user', $this->data);
        }
    }

	// edit a user
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		// $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		// $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					// 'first_name' => $this->input->post('first_name'),
					// 'last_name'  => $this->input->post('last_name'),
					// 'company'    => $this->input->post('company'),
					// 'phone'      => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}



				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

			// check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		// $this->data['first_name'] = array(
		// 	'name'  => 'first_name',
		// 	'id'    => 'first_name',
		// 	'type'  => 'text',
		// 	'value' => $this->form_validation->set_value('first_name', $user->first_name),
		// );
		// $this->data['last_name'] = array(
		// 	'name'  => 'last_name',
		// 	'id'    => 'last_name',
		// 	'type'  => 'text',
		// 	'value' => $this->form_validation->set_value('last_name', $user->last_name),
		// );
		// $this->data['company'] = array(
		// 	'name'  => 'company',
		// 	'id'    => 'company',
		// 	'type'  => 'text',
		// 	'value' => $this->form_validation->set_value('company', $user->company),
		// );
		// $this->data['phone'] = array(
		// 	'name'  => 'phone',
		// 	'id'    => 'phone',
		// 	'type'  => 'text',
		// 	'value' => $this->form_validation->set_value('phone', $user->phone),
		// );
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('auth/edit_user', $this->data, TRUE);
		$this->load->view('_layouts/fullwidth', $this->data);
		// $this->_render_page('auth/edit_user', $this->data);
	}

	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

	public function register()
	{
		if ($this->session->has_userdata('is_login'))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('create_user_heading');

		$this->data['identity_column'] = $this->config->item('identity','ion_auth');
		$this->form_validation->set_rules('identity','หมายเลขบัตรประชาชน','required|is_unique[users.username]|integer|exact_length[13]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$identity = $this->input->post('identity');
			$password = $this->input->post('password');
		}
		if ($this->form_validation->run() == true)
		{
			$this->profile->insert_user($identity,$password);
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('success','สร้างบัญชีเสร็จสิ้น กรุณาล็อกอินเข้าสู่ระบบ');
			redirect("auth/login", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array(
				'name'  => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			// $this->data['email'] = array(
			// 'name'  => 'email',
			// 'id'    => 'email',
			// 'type'  => 'text',
			// 'value' => $this->form_validation->set_value('email'),
			// );
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('auth/register', $this->data, TRUE);
			$this->load->view('_layouts/fullwidth', $this->data);
		}
	}

}
