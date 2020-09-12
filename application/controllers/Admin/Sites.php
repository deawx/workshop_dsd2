<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sites_model','sites');

		$this->data['parent'] = 'sites';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	public function index($site_name = 'home')
	{
		$sites = ['home', 'about', 'contact'];

		$site_name = in_array($site_name, $sites) ? $site_name : 'home';

		$this->data['sites'] = $this->sites->read();
		$this->data['body'] = $this->load->view('sites/index', $this->data, TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function edit($site_id = NULL)
	{
		$post = $this->input->post();
		if ($post)
		{
			if ($this->sites->save($post))
			{
				$this->session->set_flashdata('success','บันทึกข้อมูลเสร็จสิ้น');
			}
		}

		$this->data['css'] = array(link_tag('assets/css/summernote.css'));
		$this->data['js'] = array(script_tag('assets/js/summernote.js'));
		$this->data['site'] = $this->sites->read_by_id($site_id);
		$this->data['body'] = $this->load->view('sites/form', $this->data, TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
