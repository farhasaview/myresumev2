<?php

/**
 * Model untuk mengambil data dari tabel-tabel di database
 * 
 * @package Model
 * @author Febi Aris Rinaldi
 *   
 */
class ModelPublik extends CI_Model {

	public function content() {
		$sql = "SELECT * FROM tbl_content";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	public function allFollowMe() {
		$sql = "SELECT * FROM tbl_follow_me";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function allSkill() {
		$sql = "SELECT * FROM tbl_skill";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function allPortfolio() {
		$sql = "SELECT * FROM tbl_portfolio WHERE status=1 ORDER BY id_portfolio DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function allWorkExperience() {
		$sql = "SELECT * FROM tbl_work_experience ORDER BY id_work_experience DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function allEducation() {
		$sql = "SELECT * FROM tbl_education ORDER BY id_education DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

    public function maintenanceModePublic() {
		$sql = "SELECT * FROM maintenance_mode";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

}
