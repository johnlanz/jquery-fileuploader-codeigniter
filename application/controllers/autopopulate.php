<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autopopulate extends CI_Controller {

	function index()
	{
		$this->load->model('populate');

		$query = $this->populate->get(null, 'blank');
		$data['tests'] = $this->formatArrayToIdName($query->result_array());

		$this->load->view('autopopulate', $data);
	}

	function json() {
		$this->load->model('populate');

		$id = $this->uri->segment(4);
		$id = explode('-', $id);

		$query = $this->populate->get(null, $id);
		$data['content'] = $this->formatArrayToIdName($query->result_array());
		$this->load->view('json', $data);
	}

	private function formatArrayToIdName($data) {
		$result = array();
		foreach ($data as $row) {
			$result[$row['id']] = $row['name'];
		}
		return $result;
	}

	function page_not_found()
	{
		show_404('page');
	}

}
?>
