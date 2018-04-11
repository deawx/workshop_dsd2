<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model','profile');

		$this->data['parent'] = 'user';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
		$this->data['user'] = $this->ion_auth->user($this->session->user_id)->row_array();

		$this->data['js'] = array(script_tag('assets/js/jquery.inputmask.bundle.js'));
	}

	function index()
	{
		$q = $this->input->get('q');
		$p = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';

		$pagin = array(
			'base_url' => site_url('admin/user'),
			'total_rows' => count($this->profile->get_users($q)),
			'per_page' => '15'
		);
		$this->pagination->initialize($pagin);

		$this->data['users'] = $this->profile->get_users($q,$pagin['per_page'],$p);
    $this->data['body'] = $this->load->view('user/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function edit($id='')
	{
		if ( ! intval($id) > 0)
			return FALSE;

		if ($this->input->post('email') != $this->input->post('email_old')) :
			$this->form_validation->set_rules('email','อีเมล์','valid_email|max_length[100]|is_unique[users.email]');
		else:
			$this->form_validation->set_rules('email','อีเมล์','valid_email|max_length[100]');
		endif;
		if ($this->input->post('password')) :
			$this->form_validation->set_rules('password','รหัสผ่าน','exact_length[8]');
			$this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','matches[password]');
		endif;
		$this->form_validation->set_rules('phone','เบอร์โทรศัพท์','is_numeric|max_length[10]');
		$this->form_validation->set_rules('fax','แฟกซ์','is_numeric|max_length[10]');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			$groupData = $this->input->post('groups');
			if (isset($groupData) && ! empty($groupData)) :
				$this->ion_auth->remove_from_group('', $id);
				foreach ($groupData as $grp) :
					$this->ion_auth->add_to_group($grp, $id);
				endforeach;
			endif;
			if($this->ion_auth->update($data['id'],$data)) :
				$this->session->set_flashdata('success','บันทึกข้อมูลเสร็จสิ้น');
			else:
				$this->session->set_flashdata('warning','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/user','refresh');
		endif;

		$this->data['user'] = $this->ion_auth->user($id)->row_array();
		$this->data['currentGroups'] = array_column($this->ion_auth->get_users_groups($id)->result_array(),'id');
		$groups = $this->ion_auth->groups()->result_array();
		foreach ($groups as $value)
			$this->data['groups'][$value['id']] = $value['name'];

		$this->data['body'] = $this->load->view('user/edit',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth', $this->data);
	}

	function delete($user_id = NULL)
	{
		if ( ! intval($user_id) > 0 OR $user_id == '4')
			show_404();

		$this->auth->delete_user($user_id);

		redirect('admin/user');
	}

	public function activate($user_id = NULL)
	{
		if ( ! intval($user_id) > 0)
			show_404();

		$this->auth->activate($user_id);
		redirect('admin/user');
	}

	public function deactivate($user_id = NULL)
	{
		if ( ! intval($user_id) > 0 OR $user_id == '4')
			show_404();

		$this->auth->deactivate($user_id);
		redirect('admin/user');
	}

}
