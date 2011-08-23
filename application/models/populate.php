<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Populate extends CI_Model 
{
	function _construct()
    {
		parent::_construct();
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
?>