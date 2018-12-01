<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
    $this->load->model('Request_model','request');
		$this->id = $this->session->id;
    $this->data['parent'] = 'request';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->profile->get_id($this->id);
		$this->data['address'] = unserialize($this->data['user']['address']);
		$this->data['address_current'] = unserialize($this->data['user']['address_current']);
		$this->data['education'] = unserialize($this->data['user']['education']);
		$this->data['work'] = unserialize($this->data['user']['work']);
		$this->data['standard'] = $this->request->get_standard_id($this->id);
		$this->data['skill'] = $this->request->get_skill_id($this->id);
	}

	public function index()
	{
		$this->session->set_flashdata('warning','');

		$data = $this->input->post();
		if ($data) :
			// print_data($data); die();
			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/index');
		endif;

		$this->data['standard'] = $this->request->get_userid($this->id,'standards');
		$this->data['skill'] = $this->request->get_userid($this->id,'skills');

		$this->data['menu'] = 'index';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/index',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function view($user_id,$types)
	{
		if ( ! intval($user_id) OR ! $types)
			show_404();

		$record = $this->request->get_code($user_id,$types);
		$type = isset($record['department']) ? 'standard' : 'skill';

		$this->data['record'] = $record;
		$this->load->view('_pdf/'.$type,$this->data);
	}

	function standard($id='')
	{
		$this->session->set_flashdata('warning','');

		$this->form_validation->set_rules('department','หน่วยงาน','required');
		// $this->form_validation->set_rules('branch','สาขาอาชีพ','required');
		// $this->form_validation->set_rules('level','ระดับ','required');
		// $this->form_validation->set_rules('category','ประเภทการสอบ','required');
		// $this->form_validation->set_rules('type','ประเภทผู้สมัคร','required');
		// $this->form_validation->set_rules('health','สภาพร่างกาย','required');
		// $this->form_validation->set_rules('used','ประวัติการเข้าทดสอบ','required');
		// $this->form_validation->set_rules('used_place','สถานที่เข้ารับการทดสอบ','');
		// $this->form_validation->set_rules('reason','เหตุผลที่สมัครสอบ','');
		// $this->form_validation->set_rules('source','แหล่งที่ทราบข่าว','');
		// $this->form_validation->set_rules('profile[title]','คำนำหน้าชื่อ','required');
		// $this->form_validation->set_rules('profile[firstname]','ชื่อ','required');
		// $this->form_validation->set_rules('profile[lastname]','นามสกุล','required');
		// $this->form_validation->set_rules('profile[englishname]','ชื่อเต็ม(ภาษาอังกฤษ)','required|alpha_numeric_spaces',array('alpha_numeric_spaces'=>'ข้อมูล %s. จะต้องประกอบด้วยตัวอักษรภาษาอังกฤษเท่านั้น'));
		// $this->form_validation->set_rules('profile[religion]','ศาสนา','required');
		// $this->form_validation->set_rules('profile[nationality]','สัญชาติ','required');
		// $this->form_validation->set_rules('profile[id_card]','หมายเลขบัตรประาชาชน','required|is_numeric|exact_length[13]');
		// $this->form_validation->set_rules('profile[birthdate]','วัน/เดือน/ปีเกิด','required');
		// $this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
		// $this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
		// $this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		// $this->form_validation->set_rules('address_current[address]','ที่อยู่เลขที่','required');
		// $this->form_validation->set_rules('address_current[street]','ถนน','required');
		// $this->form_validation->set_rules('address_current[tambon]','ตำบล','required');
		// $this->form_validation->set_rules('address_current[amphur]','อำเภอ','required');
		// $this->form_validation->set_rules('address_current[province]','จังหวัด','required');
		// $this->form_validation->set_rules('address_current[email]','อีเมล์','required|valid_email');
		// $this->form_validation->set_rules('address_current[phone]','โทรศัพท์','required|is_numeric|exact_length[10]');
		// $this->form_validation->set_rules('address_current[fax]','โทรสาร','required|is_numeric|exact_length[10]');
		// $this->form_validation->set_rules('education[degree]','ระดับการศึกษา','required');
		// $this->form_validation->set_rules('education[department]','สาขาวิชา','required');
		// $this->form_validation->set_rules('education[place]','สถานศึกษา','required');
		// $this->form_validation->set_rules('education[province]','จังหวัดที่ศึกษา','required');
		// $this->form_validation->set_rules('education[year]','ปีที่จบการศึกษา','required');
		// $this->form_validation->set_rules('work_status','การทำงานในปัจจุบัน','required');
		// $this->form_validation->set_rules('need_work_status','ความต้องการหางาน','required');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			if ($data['approve_status'] === 'accept') :
				$this->session->set_flashdata('info','คำร้องผ่านการอนุมัติแล้ว ไม่สามารถแก้ไขข้อมูลย้อนหลัง');
				redirect('account/request/index');
			endif;
			if ($id) :
				$data['date_update'] = date('Y-m-d');
			else:
				$data['date_create'] = date('Y-m-d');
				$data['date_update'] = date('Y-m-d');
			endif;
			// $d = $this->input->post('d');
			// $m = $this->input->post('m');
			// $y = $this->input->post('y');
			// $birthdate = $y.'-'.$m.'-'.$d;
			// $data['profile'] = $this->input->post('profile');
			// $data['profile']['birthdate'] = $birthdate;
			// $data['profile'] = serialize($data['profile']);
			// $data['address'] = $this->input->post('address') ? serialize($this->input->post('address')) : NULL;
			// $data['address_current'] = $this->input->post('address_current') ? serialize($this->input->post('address_current')) : NULL;
			// $data['education'] = $this->input->post('education') ? serialize($this->input->post('education')) : NULL;
			// if ($this->input->post('work_status') === 'ผู้มีงานทำ') :
			// 	$work_yes = $this->input->post('work_yes');
			// 	$work_yes['group'] = isset($work_yes['group']) ? $work_yes['group'] : NULL;
			// 	$data['work_yes'] = serialize($work_yes);
			// 	$data['work_no'] = NULL;
			// elseif ($this->input->post('work_status') === 'ผู้ไม่มีงานทำ'):
			// 	$data['work_no'] = $this->input->post('work_no');
			// 	$data['work_yes'] = NULL;
			// else:
			// 	$data['work_yes'] = NULL;
			// 	$data['work_no'] = NULL;
			// endif;
			$need_work_status = $this->input->post('need_work_status');
			if ($need_work_status == 'ต้องการจัดหางานในต่างประเทศ') :
				$data['need_work_position'] = NULL;
				$data['need_work_group'] = NULL;
			elseif ($need_work_status == 'ต้องการจัดหางานในประเทศ') :
				$data['need_work_country'] = NULL;
			elseif ($need_work_status == 'ไม่ต้องการ') :
				$data['need_work_position'] = NULL;
				$data['need_work_group'] = NULL;
				$data['need_work_country'] = NULL;
			endif;
			$data['work_abroad'] = $this->input->post('work_abroad') ? serialize($this->input->post('work_abroad')) : NULL;
			$data['reference'] = $this->input->post('reference') ? serialize($this->input->post('reference')) : NULL;

			$data['profile'] = serialize(array(
				'user_id' => $this->data['user']['user_id'],
				'title' => $this->data['user']['title'],
				'firstname' => $this->data['user']['firstname'],
				'lastname' => $this->data['user']['lastname'],
				'englishname' => $this->data['user']['englishname'],
				'religion' => $this->data['user']['religion'],
				'nationality' => $this->data['user']['nationality'],
				'id_card' => $this->data['user']['id_card'],
				'birthdate' => $this->data['user']['birthdate'],
				'age' => $this->data['user']['age'],
				'sex' => $this->data['user']['sex'],
				'phone' => $this->data['user']['phone'],
				'fax' => $this->data['user']['fax'],
				'email' => $this->data['user']['email']
			));
			$data['address_current'] = serialize($this->data['address_current']);
			$data['education'] = serialize($this->data['education']);
			$data['work'] = serialize($this->data['work']);

			if ($_FILES['file_1'] && $_FILES['file_1']['error'] === UPLOAD_ERR_OK)
				$data['file_1'] = $this->_upload('file_1');

			if ($_FILES['file_2'] && $_FILES['file_2']['error'] === UPLOAD_ERR_OK)
				$data['file_2'] = $this->_upload('file_2');

			if ($_FILES['file_3'] && $_FILES['file_3']['error'] === UPLOAD_ERR_OK)
				$data['file_3'] = $this->_upload('file_3');

			if ($_FILES['file_4'] && $_FILES['file_4']['error'] === UPLOAD_ERR_OK)
				$data['file_4'] = $this->_upload('file_4');

			// print_data($data); die();

			if ($this->request->save($data,'standards')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/index');
		endif;

		if (intval($id) > 0) :
			$this->data['navbar'] = NULL;
			$this->data['standard'] = $this->request->search_id($id,'standards');
			$this->data['profile'] = unserialize($this->data['standard']['profile']);
			$this->data['address'] = unserialize($this->data['standard']['address']);
			$this->data['education'] = unserialize($this->data['standard']['education']);
			$this->data['work_yes'] = unserialize($this->data['standard']['work_yes']);
			$this->data['work_abroad'] = unserialize($this->data['standard']['work_abroad']);
			$this->data['reference'] = unserialize($this->data['standard']['reference']);
			$this->data['body'] = $this->load->view('request/standards_edit',$this->data,TRUE);
			$this->load->view('_layouts/boxed',$this->data);
		else:
			$this->data['menu'] = 'standard';
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
			if (($this->data['user']['title'] === '') OR
				($this->data['user']['firstname'] == '') OR
				($this->data['user']['lastname'] == '') OR
				($this->data['user']['englishname'] == '') OR
				($this->data['user']['religion'] == '') OR
				($this->data['user']['nationality'] == '') OR
				($this->data['user']['id_card'] == '') OR
				($this->data['user']['birthdate'] == '') OR
				($this->data['user']['phone'] == '') OR
				($this->data['user']['fax'] == '') OR
				($this->data['user']['email'] == '')) :
				$this->data['body'] = 'กรุณากรอกข้อมูลส่วนตัวให้ครบถ้วน';
			elseif (($this->data['address_current']['address'] === '') OR
				($this->data['address_current']['street'] == '') OR
				($this->data['address_current']['tambon'] == '') OR
				($this->data['address_current']['amphur'] == '') OR
				($this->data['address_current']['province'] == '') OR
				($this->data['address_current']['zip'] == '')) :
				$this->data['body'] = 'กรุณากรอกข้อมูลที่อยู่ให้ครบถ้วน';
			elseif (($this->data['education']['degree'] === '') OR
				($this->data['education']['department'] == '') OR
				($this->data['education']['place'] == '') OR
				($this->data['education']['province'] == '') OR
				($this->data['education']['year'] == '')) :
				$this->data['body'] = 'กรุณากรอกข้อมูลการศึกษาให้ครบถ้วน';
			elseif ($this->data['work']['work_status'] === '') :
				$this->data['body'] = 'กรุณากรอกข้อมูลการทำงานให้ครบถ้วน';
			elseif ($this->data['standard']) :
				$this->data['body'] = 'ท่านได้ยื่นคำร้องขอสอบมาตรฐานฝีมือแรงงานไปเรียบร้อยแล้ว';
			else:
				$this->data['body'] = $this->load->view('request/standards',$this->data,TRUE);
			endif;
			$this->load->view('_layouts/rightside',$this->data);
		endif;
	}

	function skill($id='')
	{
		$this->session->set_flashdata('warning','');

		// $this->form_validation->set_rules('profile[title]','คำนำหน้าชื่อ','required');
		// $this->form_validation->set_rules('profile[firstname]','ชื่อ','required');
		// $this->form_validation->set_rules('profile[lastname]','นามสกุล','required');
		// $this->form_validation->set_rules('profile[blood]','หมู่โลหิต','required');
		// $this->form_validation->set_rules('profile[nationality]','สัญชาติ','required');
		// $this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
		// $this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
		// $this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		// $this->form_validation->set_rules('address[address]','ที่อยู่เลขที่','required');
		// $this->form_validation->set_rules('address[street]','ถนน','required');
		// $this->form_validation->set_rules('address[tambon]','ตำบล','required');
		// $this->form_validation->set_rules('address[moo]','หมู่','required');
		// $this->form_validation->set_rules('address[soi]','ซอย','required');
		// $this->form_validation->set_rules('address[amphur]','อำเภอ','required');
		// $this->form_validation->set_rules('address[province]','จังหวัด','required');
		// $this->form_validation->set_rules('address[email]','อีเมล์','required|valid_email');
		// $this->form_validation->set_rules('address[phone]','โทรศัพท์','required|is_numeric|exact_length[10]');
		// $this->form_validation->set_rules('address[fax]','โทรสาร','required|is_numeric|exact_length[10]');
		$this->form_validation->set_rules('career[1]','สาขาอาชีพที่ 1','max_length[150]|differs[career[2]]|differs[career[3]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[2]','สาขาอาชีพที่ 2','max_length[150]|differs[career[1]]|differs[career[3]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[3]','สาขาอาชีพที่ 3','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[4]','สาขาอาชีพที่ 4','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[3]]|differs[career[5]]');
		$this->form_validation->set_rules('career[5]','สาขาอาชีพที่ 5','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[3]]|differs[career[4]]');
		if ( ! intval($id) > 0)
			$this->form_validation->set_rules('needed','เอกสารสำคัญ','required|is_numeric');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			if ($data['approve_status'] === 'accept') :
				$this->session->set_flashdata('info','คำร้องผ่านการอนุมัติแล้ว ไม่สามารถแก้ไขข้อมูลย้อนหลัง');
				redirect('account/request/index');
			endif;
			if ($id) :
				$data['date_update'] = date('Y-m-d');
			else:
				$data['date_create'] = date('Y-m-d');
				$data['date_update'] = date('Y-m-d');
			endif;
			// $d = $this->input->post('d');
			// $m = $this->input->post('m');
			// $y = $this->input->post('y')-543;
			// $data['profile'] = $this->input->post('profile');
			// $birthdate = strtotime($y.'-'.$m.'-'.$d);
			// $data['profile']['birthdate'] = $birthdate;
			// $data['profile'] = serialize($data['profile']);
			// $data['address'] = $this->input->post('address') ? serialize($this->input->post('address')) : NULL;
			// $data['address_current'] = $this->input->post('address_current') ? serialize($this->input->post('address_current')) : serialize($this->input->post('address'));
			// $data['education'] = $this->input->post('education') ? serialize($this->input->post('education')) : NULL;
			// $data['work'] = $this->input->post('work') ? serialize($this->input->post('work')) : NULL;
			$careers = $this->input->post('career') ? clear_null_array($this->input->post('career'),TRUE) : array();
			if (empty($careers)) :
				$this->session->set_flashdata('danger','กรุณากรอกข้อมูลสาอาชีพอย่างน้อย 1 รายการ');
				redirect('account/request/skill');
			endif;
			foreach ($careers as $key => $value) :
				$data['career'.++$key] = $value;
			endforeach;
			$data['reference'] = $this->input->post('reference') ? serialize($this->input->post('reference')) : NULL;

			$data['profile'] = serialize(array(
				'title' => $this->data['user']['title'],
				'firstname' => $this->data['user']['firstname'],
				'lastname' => $this->data['user']['lastname'],
				'englishname' => $this->data['user']['englishname'],
				'religion' => $this->data['user']['religion'],
				'nationality' => $this->data['user']['nationality'],
				'id_card' => $this->data['user']['id_card'],
				'birthdate' => $this->data['user']['birthdate'],
				'blood' => $this->data['user']['blood'],
				'age' => $this->data['user']['age'],
				'sex' => $this->data['user']['sex'],
				'phone' => $this->data['user']['phone'],
				'fax' => $this->data['user']['fax'],
				'email' => $this->data['user']['email']
			));
			$data['address'] = serialize($this->data['address']);
			$data['address_current'] = serialize($this->data['address_current']);
			$data['education'] = serialize($this->data['education']);
			$data['work'] = serialize($this->data['work']);

			if ($_FILES['file_1'] && $_FILES['file_1']['error'] === UPLOAD_ERR_OK)
				$data['file_1'] = $this->_upload('file_1');

			if ($_FILES['file_2'] && $_FILES['file_2']['error'] === UPLOAD_ERR_OK)
				$data['file_2'] = $this->_upload('file_2');

			if ($_FILES['file_3'] && $_FILES['file_3']['error'] === UPLOAD_ERR_OK)
				$data['file_3'] = $this->_upload('file_3');

			if ($_FILES['file_4'] && $_FILES['file_4']['error'] === UPLOAD_ERR_OK)
				$data['file_4'] = $this->_upload('file_4');

			// print_data($data); die();

			if ($this->request->save($data,'skills')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/index');
		endif;

		$this->data['js'] = array(script_tag('assets/js/jquery.inputmask.bundle.js'));

		if (intval($id) > 0) :
			$this->data['navbar'] = NULL;
			$this->data['skill'] = $this->request->search_id($id,'skills');
			$this->data['profile'] = unserialize($this->data['skill']['profile']);
			$this->data['address'] = unserialize($this->data['skill']['address']);
			$this->data['address_current'] = unserialize($this->data['skill']['address_current']);
			$this->data['education'] = unserialize($this->data['skill']['education']);
			$this->data['work'] = unserialize($this->data['skill']['work']);
			$this->data['reference'] = unserialize($this->data['skill']['reference']);
			$this->data['body'] = $this->load->view('request/skills_edit',$this->data,TRUE);
			$this->load->view('_layouts/boxed',$this->data);
		else:
			$this->data['menu'] = 'skill';
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);

			if (($this->data['user']['title'] == '') OR
				($this->data['user']['firstname'] == '') OR
				($this->data['user']['lastname'] == '') OR
				($this->data['user']['nationality'] == '') OR
				($this->data['user']['id_card'] == '') OR
				($this->data['user']['birthdate'] == '') OR
				($this->data['user']['blood'] == '')) :
				$this->data['body'] = 'กรุณากรอกข้อมูลส่วนตัวให้ครบถ้วน';
			elseif (($this->data['address_current']['address'] == '') OR
				($this->data['address_current']['street'] == '') OR
				($this->data['address_current']['tambon'] == '') OR
				($this->data['address_current']['amphur'] == '') OR
				($this->data['address_current']['province'] == '') OR
				($this->data['address_current']['zip'] == '')) :
				$this->data['body'] = 'กรุณากรอกข้อมูลที่อยู่ให้ครบถ้วน';
			elseif (($this->data['education']['degree'] == '') OR
				($this->data['education']['department'] == '') OR
				($this->data['education']['place'] == '') OR
				($this->data['education']['province'] == '') OR
				($this->data['education']['year'] == '')) :
				$this->data['body'] = 'กรุณากรอกข้อมูลการศึกษาให้ครบถ้วน';
			elseif ($this->data['work']['work_status'] == '') :
				$this->data['body'] = 'กรุณากรอกข้อมูลการทำงานให้ครบถ้วน';
			elseif ($this->data['skill']) :
				$this->data['body'] = 'ท่านได้ยื่นคำร้องขอสอบรับรองความรู้ความสามารถไปเรียบร้อยแล้ว';
			else:
				$this->data['body'] = $this->load->view('request/skills',$this->data,TRUE);
			endif;
			$this->load->view('_layouts/rightside',$this->data);
		endif;
	}

	function result()
	{
		$this->session->set_flashdata('warning','');

		$this->data['requests'] = $this->request->get_all_id($this->id);

		$this->data['menu'] = 'result';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/result',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function calendars()
	{
		$this->session->set_flashdata('warning','');

		$this->form_validation->set_rules('type','รายการคำร้อง','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();

			// print_data($data);

			$record = $this->request->get_code($this->id,$data['type']);
			$type = (isset($record['category'])) ? 'standards' : 'skills';

			$records = $this->request->get_date($data['approve_schedule']);
			$exist_id = array_column($records,'user_id');
			if (in_array($record['user_id'],$exist_id)) :
				$this->session->set_flashdata('info','ขออภัย ท่านมีรายการสอบในวันนี้อยู่แล้ว');
				// redirect('account/request/calendars');
			endif;

			$data['approve_schedule'] = date('Y-m-d',strtotime($data['approve_schedule']));
			if ($this->request->save($data,$type)) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/result');

		endif;

		$this->data['menu'] = 'calendar';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);

		$schedule = array();
		$schedules = $this->request->get_future();
		foreach ($schedules as $key => $value) :
			// print_data($value);
			$profile = $this->profile->get_id($value['user_id']);
			$schedule[$key]['title'] = $profile['title'].' '.$profile['firstname'].' '.$profile['lastname'];
			$schedule[$key]['start'] = date('Y-m-d',strtotime($value['approve_schedule']));
		endforeach;
		// die();

		$request = $this->request->get_all_id($this->id);
		// foreach ($request as $key => $value) :
		// 	if ($value['approve_schedule'] !== '0000-00-00') :
		// 		unset($request[$key]);
		// 	endif;
		// endforeach;

		$this->data['schedule'] = $schedule;
		$this->data['request'] = $request;

		$this->data['css'] = array(link_tag('assets/css/fullcalendar.css'),link_tag('assets/css/fullcalendar.print.css','stylesheet','text/css','fullcalendar','print'));
		$this->data['js'] = array(script_tag('assets/js/moment.min.js'),script_tag('assets/js/moment.th.js'),script_tag('assets/js/fullcalendar.js'));
		$this->data['body'] = $this->load->view('request/calendars',$this->data,TRUE);
		?>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/th.js"></script> -->
		<?php
		$this->load->view('_layouts/rightside',$this->data);
	}

	function queue($user_id,$type)
	{
		$this->session->set_flashdata('warning','');
		$record = $this->request->get_code($user_id,$type);

		$this->data['record'] = $record;
		$this->load->view('_pdf/queue',$this->data);
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

		foreach ($events as $key => $value) :
			$profile = unserialize($value['profile']);
			$event[$key]['name'] = $profile['title'].' '.$profile['firstname'].' '.$profile['lastname'];
			$event[$key]['englishname'] = $profile['englishname'];
			$event[$key]['job'] = isset($value['category']) ? $value['category'] : 'สอบรับรองความรู้ความสามารถ';
		endforeach;

		$request = $this->request->get_all_id($this->id);
		foreach ($request as $key => $value) :
			if ($value['approve_schedule'] !== '0000-00-00') :
				unset($request[$key]);
			endif;
		endforeach;

		$this->data['standard'] = $standard;
		$this->data['skill'] = $skill;
		$this->data['approve_schedule'] = $date;
		$this->data['events'] = $event;
		$this->data['requests'] = $request;

		$content = $this->load->view('request/_events',$this->data,TRUE);

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($content));
	}

	function _upload($input_name)
	{
		$upload = array(
			'allowed_types'	=> 'jpg|jpeg|png',
			'upload_path'	=> FCPATH.'uploads',
			'file_ext_tolower' => TRUE,
			'encrypt_name' => TRUE
		);
		$this->upload->initialize($upload);

		if ($this->upload->do_upload($input_name))
			return $this->upload->data('file_name');

	}

}
