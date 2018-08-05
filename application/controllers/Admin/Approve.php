<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model','request');
		$this->load->model('Profile_model','profile');

		$this->data['parent'] = 'approve';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	function index()
	{
		$approve_status = $this->input->post('approve_status');
		if ($approve_status) :
			$approve_status['admin_id'] = $this->session->id;
			$approve_status['approve_date'] = time();

			if ($approve_status['approve_status'] === 'reject') :
				$approve_status['approve_schedule'] = NULL;
			endif;

			// print_data($data); die();

			if ($this->request->save($approve_status,$approve_status['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;

		$approve_schedule = $this->input->post('approve_schedule');
		if ($approve_schedule) :
			$approve_schedule['admin_id'] = $this->session->id;

			// print_data($data); die();

			if ($this->request->save($approve_schedule,$approve_schedule['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;

		$q = $this->input->get();
		$requests = $this->request->get_all();

		foreach ($requests as $key => $value) :
			if (time() > strtotime('+30 days',strtotime($value['date_create']))) :
				// unset($requests[$key]);
			endif;
			if ($q) :
				if (isset($q['id_card']) && $q['id_card']!='' && $q['id_card']!=$value['id_card']) :
					unset($requests[$key]);
				endif;
				if (isset($q['approve_status']) && $q['approve_status']!='' && $q['approve_status']!=$value['approve_status']) :
					unset($requests[$key]);
				endif;
				if (isset($q['date_create']) && $q['date_create']!='' && $q['date_create']!=date('d-m-Y',$value['date_create'])) :
					unset($requests[$key]);
				endif;
			endif;
		endforeach;

		// print_data($requests); die();

		$this->data['requests'] = $requests;
		if (isset($q['export']) && $q['export']=='1') :
			$this->data['navbar'] = '';
			$this->data['body'] = $this->load->view('_pdf/export',$this->data,TRUE);
		else:
			$this->data['css'] = array(link_tag('assets/css/datepicker.min.css'));
			$this->data['js'] = array(script_tag('assets/js/datepicker.min.js'),script_tag('assets/js/datepicker.th.min.js'));
			$this->data['body'] = $this->load->view('approve/index',$this->data,TRUE);
		endif;
		$this->load->view('_layouts/boxed',$this->data);
	}

	function export()
	{
		$q = $this->input->get();
		$requests = $this->request->get_all();
		foreach ($requests as $key => $value) :
			if ($q) :
				if (isset($q['email']) && $q['email']!='' && $q['email']!=$value['email']) :
					unset($requests[$key]);
				endif;
				if (isset($q['approve_status']) && $q['approve_status']!='' && $q['approve_status']!=$value['approve_status']) :
					unset($requests[$key]);
				endif;
				if (isset($q['date_create']) && $q['date_create']!='' && $q['date_create']!=date('d-m-Y',strtotime($value['date_create']))) :
					unset($requests[$key]);
				endif;
			endif;
		endforeach;

		$this->data['navbar'] = '';
		$this->data['requests'] = $requests;
		$this->data['body'] = $this->load->view('approve/export',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
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

	function schedule()
	{
		$data = $this->input->post();
		if ($data) :

			// print_data($data); die();

			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;
	}

	function status()
	{
		$data = $this->input->post();
		if ($data) :

			// print_data($data); die();

			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;
	}

	function calendar()
	{
		$this->data['body'] = $this->load->view('approve/calendar',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
