<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model','request');

		$this->data['parent'] = 'approve';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	function index()
	{
		$data = $this->input->post();
		if ($data) :
			$data['admin_id'] = $this->session->user_id;
			$data['approve_date'] = time();

			if ($data['approve_status'] === 'reject') :
				$data['approve_schedule'] = NULL;
			endif;

			// print_data($data); die();

			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;

		$q = $this->input->get();
		$requests = $this->request->get_all();
		foreach ($requests as $key => $value) :
			if (time() > strtotime('+30 days',$value['date_create'])) :
				unset($requests[$key]);
			endif;
			if ($q) :
				if (isset($q['email']) && $q['email']!='' && $q['email']!=$value['email']) :
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

		$this->data['requests'] = array_values($requests);
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
				if (isset($q['date_create']) && $q['date_create']!='' && $q['date_create']!=date('d-m-Y',$value['date_create'])) :
					unset($requests[$key]);
				endif;
			endif;
		endforeach;

		$this->data['navbar'] = '';
		$this->data['requests'] = $requests;
		$this->data['body'] = $this->load->view('approve/export',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function view($code='')
	{
		if ( ! intval($code) && ! strlen($code) === '11')
			show_404();

		$record = $this->request->get_code($code);
		$type = isset($record['department']) ? 'standard' : 'skill';

		$this->data['record'] = $record;
		$this->load->view('_pdf/'.$type,$this->data);
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

}
