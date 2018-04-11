<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model','news');
	}

	public function index()
	{
		$this->data['page_header'] = 'หน้าหลัก';
		$this->data['page_header_small'] = 'อธิบายขั้นตอนและวิธีการใช้งานเว็บไซต์';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'home';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/index',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function about()
	{
		$this->data['page_header'] = 'เกี่ยวกับเรา';
		$this->data['page_header_small'] = 'ประกาศข้อกำหนด';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'about';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/about',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function contact()
	{
		$this->data['page_header'] = 'ติดต่อเรา';
		$this->data['page_header_small'] = 'ข้อมูลที่อยู่สถานที่ตั้งและช่องทางการติดต่อเรา';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'contact';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/contact',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function news($id='')
	{
		$category = $this->input->get();
		$config	= array(
			'base_url' => site_url('welcome/news'),
			'total_rows' => count($this->news->get_all($category)),
			'per_page' => 10
		);
		$offset = ($this->input->get('p')) ? $this->input->get('p') : '0';
		$this->pagination->initialize($config);
		$this->data['news'] = $this->news->get_all($category,$config['per_page'],$offset);

		$this->data['page_header'] = 'ข่าวสาร';
		$this->data['page_header_small'] = 'ประชาสัมพันธ์ข้อมูลข่าวสารและประกาศต่างๆ';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'news';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/news',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function read($id)
	{
		if (intval($id) > 0) :
			$this->news->views($id);
		endif;

		$this->data['news'] = $this->news->get_id($id);
		$this->data['parent'] = 'news';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/read',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
