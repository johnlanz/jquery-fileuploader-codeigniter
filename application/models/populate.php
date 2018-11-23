<?php
class Populate extends CI_Model {

	public function __construct()
   	{
		$this->load->database();
   	}

    public function get_last_ten_entries()
    {
        $query = $this->db->get('autopopulate', 10);
        return $query->result();
    }

	public function get($id = null, $parent = null)
	{
		if ($id) {
			if (is_array($id)) {
				$this->db->where_in('id', $id);
				$query = $this->db->get('autopopulate');
			} else {
				$this->db->where('id', $id);
			}
		}

		if ($parent) {
			//get data if parent is null
			if ($parent == 'blank') {
				$condition = null;
			} else {
				$condition = $parent;
			}

			if (is_array($condition)) {
				$this->db->where_in('parent_id', $condition);
			} else {
				$this->db->where('parent_id', $condition);
			}
		}

        return $this->db->get('autopopulate');
	}

}
/*class Populate_model extends CI_Model
{
	function _construct()
    {
		parent::_construct();
		$this->load->database();
    }

	public function get_autopopulate($id = null, $parent = null)
	{
	        if (empty($id) && empty($parent))
	        {
                $query = $this->db->get('autopopulate');
                return $query->result_array();
	        }

			if ($id) {
				if (is_array($id)) {
					$this->db->where_in('id', $id);
					$query = $this->db->get_where('autopopulate', array('slug' => $slug));
				} else {
					$this->db->where('id', $id);
				}
				$query = $this->db->get_where('autopopulate', array('slug' => $slug));
			   	return $query->row_array();
			}

	        $query = $this->db->get_where('autopopulate', array('slug' => $slug));
	        return $query->row_array();
	}

	function get($id = null, $parent = null)
	{

		if ($id) {
			if (is_array($id)) {
				$this->db->where_in('id', $id);
			} else {
				$this->db->where('id', $id);
			}
		}

		if ($parent) {
			//get data if parent is null
			if ($parent == 'blank') {
				$condition = null;
			} else {
				$condition = $parent;
			}

			if (is_array($condition)) {
				$this->db->where_in('parent_id', $condition);
			} else {
				$this->db->where('parent_id', $condition);
			}
		}

		return $this->db->get('autopopulate');
	}

}
?> */
