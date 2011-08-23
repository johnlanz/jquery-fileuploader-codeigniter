<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|zip|avi';
		/*$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';*/

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo '<div id="status">error</div>';
			echo '<div id="message">'. $this->upload->display_errors() .'</div>';
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			echo '<div id="status">success</div>';
			//then output your message (optional)
			echo '<div id="message">'. $data['upload_data']['file_name'] .' Successfully uploaded.</div>';
			//pass the data to js
			echo '<div id="upload_data">'. json_encode($data) . '</div>';
			
		}
	}
}
?>