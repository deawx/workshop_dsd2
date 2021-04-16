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
		$this->form_validation->set_rules('category','หมวดหมู่ข่าวสาร','required',array('required'=>'โปรดเลือกหมวดหมู่ข่าวสาร'));
		$this->form_validation->set_rules('detail','เนื้อหาข่าวสาร','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			$data['id'] = ($this->input->post('id')) ? $this->input->post('id') : NULL;
			$data['author_id'] = $this->session->id;
			if ($this->input->post('id')) :
				$data['date_update'] = date('Y-m-d');
			else:
				$data['date_create'] = date('Y-m-d');
			endif;

			if (isset($_FILES['file_1']) && $_FILES['file_1']['error'] === UPLOAD_ERR_OK) :
				$data['file_1'] = $this->_upload('file_1', $_FILES['file_1']);
			endif;

			if (isset($_FILES['file_2']) && $_FILES['file_2']['error'] === UPLOAD_ERR_OK) :
				$data['file_2'] = $this->_upload('file_2', $_FILES['file_2']);
			endif;

			if (isset($_FILES['file_3']) && $_FILES['file_3']['error'] === UPLOAD_ERR_OK) :
				$data['file_3'] = $this->_upload('file_3', $_FILES['file_3']);
			endif;

			// print_data($data); die();

			if ($this->news->save($data)) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;

			if ($id)
			{
				redirect('admin/news/post/'.$id);
			}
			else
			{
				redirect('admin/news/post/'.$this->db->insert_id());
			}
		endif;

		$this->data['news'] = $this->news->get_id($id);
		$this->data['css'] = array(link_tag('assets/css/summernote.css'));
		$this->data['js'] = array(script_tag('assets/js/summernote.js'));
		$this->data['body'] = $this->load->view('news/post',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function _upload($input_name, $file)
	{
		if ($input_name && $file) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf',
				'upload_path'	=> FCPATH.'uploads',
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE
			);
			$this->upload->initialize($upload);
			if ( ! $this->upload->do_upload($input_name)) :
				$this->session->set_flashdata('danger',$this->upload->display_errors());
			endif;
		endif;

		return $this->upload->data('file_name');
	}

	function remove_upload($news_id, $input_name, $filename)
	{
		if ($news_id && $input_name && $filename)
		{
			$this->db
				->set($input_name, 'NULL', FALSE)
				->where($input_name, $filename)
				->where('id', $news_id)
				->update('news');
		}

		$this->session->set_flashdata('success','ลบข้อมูลรูปภาพสำเร็จ');

		redirect('admin/news/post/'.$news_id);
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
