<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model','news');

		$this->data['parent'] = 'news';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	public function index()
	{
		$title = $this->input->get();
		$this->data['news'] = $this->news->get_all($title);

		$this->data['body'] = $this->load->view('news/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function post($id='')
	{
		$this->form_validation->set_rules('title','หัวข้อข่าวสาร','required|max_length[100]');
		$this->form_validation->set_rules('category','หมวดหมู่ข่าวสาร','required');
		$this->form_validation->set_rules('detail','เนื้อหาข่าวสาร','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			$data['id'] = ($this->input->post('id')) ? $this->input->post('id') : NULL;
			$data['author_id'] = $this->session->user_id;
			if ($this->input->post('id')) :
				$data['date_update'] = time();
			else:
				$data['date_create'] = time();
			endif;
			if ($this->input->post('assets_id')) :
				$data['assets_id'] = serialize($this->input->post('assets_id'));
			endif;

			// print_data($data); die();

			if ($this->news->save($data)) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;

			redirect('admin/news/index');
		endif;

		$this->data['news'] = $this->news->get_id($id);
		$this->data['assets'] = $this->assets->get_all();
		$this->data['css'] = array(link_tag('assets/css/summernote.css'));
		$this->data['js'] = array(script_tag('assets/js/summernote.js'));
		$this->data['body'] = $this->load->view('news/post',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function attachment()
	{
		$data = $this->input->post();
		$data['assets_id'] = $this->input->post('assets_id') ? serialize($this->input->post('assets_id')) : '';

		if ($this->news->save($data)) :
			$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
		else:
			$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
		endif;

		redirect('admin/news/post/'.$data['id']);
	}

	function pinned($id='')
	{
		if (intval($id) < 0 )
			show_404();

		if ($this->news->pinned($id)) :
			$this->session->set_flashdata('success','ปักหมุดสำเร็จ');
		else:
			$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
		endif;
		redirect('admin/news/index');
	}

	function delete($id='')
	{
		if (intval($id) < 0 )
			show_404();

		if ($this->news->remove($id)) :
			$this->session->set_flashdata('success','ลบข้อมูลสำเร็จ');
		else:
			$this->session->set_flashdata('danger','ลบข้อมูลล้มเหลว');
		endif;
		redirect('admin/news/index');
	}

}
