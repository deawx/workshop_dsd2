<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
    $this->data['parent'] = 'account';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->profile->get_user($this->session->username);

		$this->data['css'] = array(link_tag('assets/css/editable-select.min.css'));
		$this->data['js'] = array(script_tag('assets/js/editable-select.min.js'),script_tag('assets/js/jquery.inputmask.bundle.js'));
	}

  public function index()
  {
    //ตรวจสอบความถูกต้องจากฟอร์มที่ถูกส่งมา
		if ($this->input->post()) :
	    $this->form_validation->set_rules('title','คำนำหน้าชื่อ','required');
	    $this->form_validation->set_rules('firstname','ชื่อ','required|max_length[100]');
			$this->form_validation->set_rules('lastname','นามสกุล','required|max_length[100]');
	    $this->form_validation->set_rules('englishname','ชื่อ-นามสกุล(ภาษาอังกฤษ)','required|max_length[255]');
			$this->form_validation->set_rules('nationality','สัญชาติ','required|max_length[100]');
	    $this->form_validation->set_rules('religion','ศาสนา','required|max_length[100]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('warning',validation_errors());
			else:
				$data = array(
					'id' => $this->session->id,
					'title' => $this->input->post('title'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'englishname' => $this->input->post('englishname'),
					'nationality' => $this->input->post('nationality'),
					'religion' => $this->input->post('religion'),
					'birthdate' => $this->input->post('y').'-'.$this->input->post('m').'-'.$this->input->post('d')
				);
				if ($this->profile->save($data,'users')) :
					$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
				else:
					$this->session->set_flashdata('warning','บันทึกข้อมูลล้มเหลว');
				endif;
				redirect('account/profile');
			endif;
		endif;

    $this->data['menu'] = 'profile';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/profile',$this->data,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

  function address()
  {
		$this->form_validation->set_rules('address[address]','ที่อยู่','required');
		// $this->form_validation->set_rules('address[street]','ถนน','required');
		$this->form_validation->set_rules('address[tambon]','ตำบล','required');
		$this->form_validation->set_rules('address[amphur]','อำเภอ','required');
		$this->form_validation->set_rules('address[province]','จังหวัด','required');
		$this->form_validation->set_rules('address[zip]','รหัสไปรษณีย์','is_numeric|max_length[5]');

		if ($this->form_validation->run() === FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$address = $this->input->post('address');
			$address_current = $this->input->post('address_current');
			$data = array(
				'id' => $this->session->id,
				'address' => serialize($address),
				'address_current' => ($this->input->post('exist')) ? serialize($address) : serialize($address_current)
			);

			if ($this->profile->save($data,'users')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('warning','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/profile/address');
		endif;

    $this->data['menu'] = 'address';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/address',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function edit()
  {
		if ($this->input->post()) :
			if ($this->input->post('email') != $this->input->post('email_old')) :
				$this->form_validation->set_rules('email','อีเมล์','required|valid_email|max_length[100]|is_unique[users.email]');
			else:
				$this->form_validation->set_rules('email','อีเมล์','required|valid_email|max_length[100]');
			endif;
			$this->form_validation->set_rules('phone','เบอร์โทรศัพท์','is_numeric|max_length[10]');
			$this->form_validation->set_rules('fax','แฟกซ์','is_numeric|max_length[10]');

			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('warning',validation_errors());
			else:
				$data = array(
					'id' => $this->session->id,
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'fax' => $this->input->post('fax')
				);
				if ($this->profile->save($data,'users')) :
					$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
					redirect('account/profile/edit');
				else:
					$this->session->set_flashdata('warning','บันทึกข้อมูลล้มเหลว');
					redirect('account/profile/edit');
				endif;
			endif;
		endif;

    $this->data['menu'] = 'edit';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/edit',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function education()
  {
		$this->form_validation->set_rules('education[degree]','ระดับการศึกษา','required');
		$this->form_validation->set_rules('education[place]','สถานศึกษา','required');
		$this->form_validation->set_rules('education[department]','สาขาวิชา','required');
		$this->form_validation->set_rules('education[province]','จังหวัดที่ศึกษา','required');
		$this->form_validation->set_rules('education[year]','ปีที่จบการศึกษา','required');
		if ($this->form_validation->run() === FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = array(
				'id' => $this->session->id,
				'education' => $this->input->post('education') ? serialize($this->input->post('education')) : NULL
			);
			if ($this->profile->save($data,'users')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('warning','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/profile/education');
		endif;

    $this->data['menu'] = 'education';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/education',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function work()
  {
		$this->form_validation->set_rules('work_status','สถานภาพการทำงาน','required');
		if ($this->form_validation->run() === FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			if (isset($data['work_status']) && $data['work_status']=='ผู้มีงานทำ') :
				$data['work_no'] = '';
			else:
				$data['work_yes'] = '';
			endif;
			$data['work'] = serialize($data);

			// print_data($data); die();

			if ($this->profile->save($data,'users')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('warning','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/profile/work');
		endif;

    $this->data['menu'] = 'work';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/work',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

	function change_picture()
	{
		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png',
				'upload_path'	=> FCPATH.'uploads/profiles',
				'file_ext_tolower' => TRUE,
			);
			$exist = $this->input->post('asset_id');
			if ($exist) :
				$upload['file_name'] = $this->input->post('file_name');
				$upload['overwrite'] = TRUE;
			else:
				$upload['encrypt_name'] = TRUE;
			endif;
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$resize = array(
					'source_image' => $this->upload->data('full_path'),
					'width' => '600',
					'height' => '600'
				);
				$this->image_lib->initialize($resize);
				if ($this->image_lib->resize()) :
					$data = $this->upload->data();
					$data['id'] = ($this->input->post('asset_id')) ? $this->input->post('asset_id') : NULL;
					$data['file_name'] = ($this->input->post('file_name')) ? $this->input->post('file_name') : $this->upload->data('file_name');
					if ($this->assets->save($data)) :
						$id = ($this->input->post('asset_by_id')) ? $this->input->post('asset_by_id') : NULL;
						$asset_id = ($this->db->insert_id()) ? $this->db->insert_id() : $this->input->post('asset_id');
						if ($this->assets->save(array(
							'id' => $id,
							'asset_id' => $asset_id,
							'user_id' => $this->id,
							'upload_date' => time(),
							'is_avatar' => TRUE
						),'assets_by')) :
							$this->session->set_flashdata('message','อัพโหลดไฟล์เสร็จสิ้น');
						else:
							$this->session->set_flashdata('danger',$this->db->error());
						endif;
					else:
						$this->session->set_flashdata('danger',$this->db->error());
					endif;
				else:
					$this->session->set_flashdata('danger',$this->image_lib->display_errors());
				endif;
			else:
				$this->session->set_flashdata('danger',$this->upload->display_errors());
			endif;
			redirect('account/profile/change_picture');
		endif;

		$this->data['menu'] = 'change_picture';
		$this->data['picture'] = $this->assets->get_id();
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/change_picture',$this->data,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
	}

	function attachment()
	{
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		if ($type === 'delete' && intval($id) > 0) :
			$deleted = $this->assets->delete_attachment($id);
			if ($deleted === TRUE) :
				$this->session->set_flashdata('success','การลบไฟล์เสร็จสิ้น');
			else:
				$this->session->set_flashdata('danger','การลบไฟล์ขัดข้อง');
			endif;
			redirect('account/profile/attachment');
		endif;

		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf',
				'upload_path'	=> FCPATH.'uploads/attachments',
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE
			);
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$data = $this->upload->data();
				if ($this->assets->save($data)) :
					if ($this->assets->save(array(
							'asset_id' => $this->db->insert_id(),
							'user_id' => $this->id,
							'upload_date' => time()
						),'assets_by')) :
						$this->session->set_flashdata('success','อัพโหลดไฟล์เสร็จสิ้น');
					endif;
				endif;
			else:
				$this->session->set_flashdata('danger',$this->upload->display_errors());
			endif;
			redirect('account/profile/attachment');
		endif;

		$this->data['menu'] = 'attachment';
		$this->data['assets'] = $this->assets->get_all();
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/attachment',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

  function change_password()
  {
		$this->form_validation->set_rules('old_password','รหัสผ่านเดิม','required');
		$this->form_validation->set_rules('password','รหัสผ่านใหม่','required|min_length['.$this->config->item('min_password_length','ion_auth').']|max_length['.$this->config->item('max_password_length','ion_auth').']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','รหัสผ่านใหม่(ยืนยัน)','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$identity = $this->session->userdata('identity');
			$success = $this->ion_auth->change_password($identity,$this->input->post('old_password'),$this->input->post('password'));
			if ($success) :
				$this->session->set_flashdata('success',$this->ion_auth->messages());
				redirect('auth/logout');
			else:
				$this->session->set_flashdata('warning',$this->ion_auth->errors());
				redirect('account/profile/change_password','refresh');
			endif;
		endif;
		$this->data['menu'] = 'change_password';
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/change_password',NULL,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

	function get_address($address_type,$needed_id)
	{
		$result = array();
		if ($address_type == 'amphur')
		{
			$result = $this->db->where('province_id',$needed_id)->get('amphur')->result_array();
		}
		elseif ($address_type == 'district')
		{
			$result = $this->db->where('amphur_id',$needed_id)->get('district')->result_array();
		}
		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($result));
	}

	function get_work_type($category='')
	{
		$type = array();
		$category = urldecode($category);
		switch ($category) :
			case 'ทำงานภาครัฐ':
				$type = array(
					''=>'เลือกรายการ',
					'ข้าราชการพลเรือน'=>'ข้าราชการพลเรือน',
					'ข้าราชการตำรวจ'=>'ข้าราชการตำรวจ',
					'ข้าราชการทหาร'=>'ข้าราชการทหาร',
					'ข้าราชการครู'=>'ข้าราชการครู',
					'ข้าราชการอัยการ'=>'ข้าราชการอัยการ',
					'ลูกจ้างประจำ'=>'ลูกจ้างประจำ',
					'พนักงานราชการ'=>'พนักงานราชการ',
					'พนักงานจ้างเหมา'=>'พนักงานจ้างเหมา'
				);
			break;
			case 'ทำงานภาคเอกชน':
				$type = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างภาคเอกชน'=>'พนักงาน/ลูกจ้างภาคเอกชน'
				);
			break;
			case 'ทำงานรัฐวิสาหกิจ':
				$type = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'=>'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'
				);
			break;
			case 'ประกอบธุรกิจส่วนตัว':
				$type = array(
					''=>'เลือกรายการ',
					'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน'=>'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน',
					'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง'=>'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง',
					'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'=>'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'
				);
			break;
			case 'ช่วยธุรกิจครัวเรือน':
				$type = array(
					''=>'เลือกรายการ',
					'ลูกจ้างธุรกิจในครัวเรือน'=>'ลูกจ้างธุรกิจในครัวเรือน'
				);
			break;
		endswitch;

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($type));
	}

	function get_events($date)
	{
		$event = array();
		$events = $this->request->get_date($date);
		$standard = count(array_column($events,'category'));
		$skill = count($events)-$standard;
		$times = array_column($events,'approve_time');
		$morning = count(array_filter($times,function($v) { return strpos($v,'เช้า') == TRUE; }));
		$afternoon = count(array_filter($times,function($v) { return strpos($v,'บ่าย') == TRUE; }));
		foreach ($events as $key => $value) :
			$profile = unserialize($value['profile']);
			$event[$key]['name'] = $profile['title'].' '.$profile['firstname'].' '.$profile['lastname'];
			$event[$key]['job'] = isset($value['category'])
				? mb_substr($value['category'],0,25,'UTF-8').'..'
				: mb_substr('สอบรับรองความรู้ความสามารถ',0,25,'UTF-8').'..';
			$event[$key]['time'] = isset($value['approve_time']) ? $value['approve_time'] : '';
		endforeach;

		$request = $this->request->get_all_id($this->id,'accept');
		foreach ($request as $key => $value) :
			if ($value['approve_schedule']!=NULL) :
				unset($request[$key]);
			endif;
		endforeach;

		$this->data['standard'] = $standard;
		$this->data['skill'] = $skill;
		$this->data['morning'] = $morning;
		$this->data['afternoon'] = $afternoon;
		$this->data['approve_schedule'] = $date;
		$this->data['events'] = $event;
		$this->data['requests'] = $request;

		$content = $this->load->view('request/_events',$this->data,TRUE);

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($content));
	}

}
