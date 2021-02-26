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
		$this->session->set_flashdata('warning','');
		$date_reject = $this->input->post('date_reject');
		if ($date_reject) :
			$this->form_validation->set_rules('date_reject','วันที่ปิดรับคำร้อง','required|callback_date_check',array('date_check'=>'%s ซ้ำกับข้อมูลในระบบ'));
			if ($this->form_validation->run() == FALSE) :
				$this->session->set_flashdata('warning',validation_errors());
			else:
				// print_data($date_reject); die();
				$this->request->save(array(
					'date' => date('Y-m-d',strtotime($date_reject))
				),'date_reject');
			endif;
		endif;
		$approve_status = $this->input->post('approve_status');
		if ($approve_status) :
			$approve_status['admin_id'] = $this->session->id;
			$approve_status['approve_date'] = time();

			if ($approve_status['approve_status'] === 'reject') :
				$approve_status['approve_schedule'] = NULL;
			endif;

			// print_data($approve_status); die();

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

			// print_data($approve_schedule); die();

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

		// echo '<pre>'; print_data($requests); echo '</pre>'; die();

		$this->data['requests'] = $requests;
		if (isset($q['export']) && $q['export']=='1') :
			$this->data['navbar'] = '';
			$this->data['body'] = $this->load->view('_pdf/export',$this->data,TRUE);
		else:
			$this->data['css'] = array(link_tag('assets/css/datepicker.min.css'));
			$this->data['js'] = array(script_tag('assets/js/datepicker.min.js'),script_tag('assets/js/datepicker.th.min.js'));
			$this->data['date_reject'] = $this->request->search(array('date >'=>date('Y-m-d')),'date_reject');
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

	function view($user_id,$type)
	{
		error_reporting(0);
		
		if ( ! intval($user_id) OR ! $type)
			show_404();

		if ( ! in_array($type, ['standards', 'skills']))
			show_404();

		$record = $this->request->get_code($user_id,$type);

		if (is_null($record))
			show_404();

		$this->data['record'] = $record;
		$this->load->view('_pdf/'.rtrim($type,'s'),$this->data);
	}

	function view_file($filename=FALSE)
	{
		$this->load->helper('download');
		force_download('uploads/'.$filename, NULL);
	}

	function schedule()
	{
		$data = $this->input->post();
		if ($data) :

			$date_reject = $this->request->search(NULL,'date_reject');
			$date_reject = array_column($date_reject,'date');

			$data['admin_id'] = $this->session->user_id;
			$data['approve_schedule'] = date('Y-m-d',strtotime($data['approve_schedule']));
			$data['approve_date'] = date('Y-m-d');
			$data['approve_status'] = 'accept';

			// print_data($data); exit();

			if (in_array($data['approve_schedule'],$date_reject)) :
				$this->session->set_flashdata('info','วันที่ไม่เปิดรับการสอบ');
			else:
				switch ($data['type']):
					case 'standards':
						$standard_full = $this->request->search(array('date_schedule'=>$data['approve_schedule']),'standards');
						if (count($standard_full) >= '26')
						{
							$this->session->set_flashdata('info','จำนวนรายการในวันนี้เต็มแล้ว');
							redirect('admin/approve');
						}
						break;
					case 'skills':
						$skill_full = $this->request->search(array('date_schedule'=>$data['approve_schedule']),'skills');
						if (count($skill_full) >= '15')
						{
							$this->session->set_flashdata('info','จำนวนรายการในวันนี้เต็มแล้ว');
							redirect('admin/approve');
						}
						break;
				endswitch;
				if ($this->request->save($data,$data['type'])) :
					$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
				else:
					$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
				endif;
			endif;
			redirect('admin/approve');

		endif;
	}

	function status()
	{
		$data = $this->input->post();
		if ($data) :

			// print_data($data); exit();

			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;
	}

	function date_check($date)
	{
		$date = date('Y-m-d',strtotime($date));
		$exist = $this->db
			->where(array('date'=>$date))
			->get('date_reject');
		return ($exist->num_rows() > 0) ? FALSE : TRUE;
	}

	function date_cancel($date_id)
	{
		$return = $this->request->remove($date_id,'date_reject');
		if ($return === FALSE) :
			$this->session->set_flashdata('info','ลบข้อมูลเสร็จสิ้น');
		endif;
		redirect('admin/approve');
	}

}
