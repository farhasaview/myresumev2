<?php
class ModelAdmin extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function check($username, $pass) {
    $sql = "SELECT * FROM tbl_admin WHERE username=? AND password=?";
    $query = $this->db->query($sql, array($username, $pass));
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function all() {
    $sql = "SELECT * FROM tbl_admin";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
    $query->free_result();
  }

  public function find($id) {
    $sql = "SELECT * FROM tbl_admin WHERE id_admin=?";
    $query = $this->db->query($sql, array($id));
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function add($param) {
    $sql = "INSERT INTO tbl_admin (username, password) VALUES (?, ?)";
    $this->db->query($sql, array($param['username'], md5($param['password'])));
    return true;
  }

  public function edit($param) {
    if(trim($param['password']) == ""){
      $sql = "UPDATE tbl_admin SET username=? WHERE id_admin=?";
      $this->db->query($sql, array($param['username'], $param['id_admin']));
    }else{
      $sql = "UPDATE tbl_admin SET username=?, password=? WHERE id_admin=?";
      $this->db->query($sql, array($param['username'], md5($param['password']), $param['id_admin']));
    }
    return true;
  }

  public function delete($id) {
    $sql = "DELETE FROM tbl_admin WHERE id_admin = ?";
    $this->db->query($sql, array($id));
    return true;
  }

  public function findData($tbl, $namaKolom, $id) {
    $sql = "SELECT * FROM $tbl WHERE $namaKolom = $id";
    //agar hasil result menjadi object di dalam array querynya
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function deleteData($tbl, $namaKolom, $id) {
    $sql = "DELETE FROM $tbl WHERE $namaKolom = ?";
    $this->db->query($sql, array($id));
    return true;
  }

  public function insertData($tbl, $data)
    {
        $this->db->insert($tbl, $data);
    }

    public function updateData($tbl, $data, $namaKolom, $id)
    {
      $this->db->where($namaKolom, $id);
      $this->db->update($tbl, $data);
    }

    public function findIsi($tbl,$keyword,$valueKeyword) {
    $sql = "SELECT * FROM $tbl WHERE $keyword = $valueKeyword";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
  }

  public function allPortfolio() {
		$sql = "SELECT * FROM tbl_portfolio ORDER BY id_portfolio DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

    public function maintenanceMode() {
		$sql = "SELECT * FROM maintenance_mode";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

}