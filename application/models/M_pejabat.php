<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pejabat extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('d_pejabat');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM d_pejabat WHERE d_kdpejabat = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
     
    /*
	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, pejabat.nama AS pejabat, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, pejabat, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_pejabat = pejabat.id AND pegawai.id_pejabat={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}*/

	public function insert($data,$id_session) {
		$sql = "INSERT INTO d_pejabat VALUES('','" .$data['nama'] ."','" .$data['instansi'] ."','".$id_session."',NOW())";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('d_pejabat', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data,$id_session) {
		$sql = "UPDATE d_pejabat SET 
		d_nama='" .$data['nama'] ."', 
		d_instansi='" .$data['instansi'] ."',
		d_loguser='".$id_session."',
		d_logtime=NOW() 
		WHERE d_kdpejabat='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM d_pejabat WHERE d_kdpejabat='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('d_nama', $nama);
		$data = $this->db->get('d_pejabat');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('d_pejabat');

		return $data->num_rows();
	}
}

/* End of file M_pejabat.php */
/* Location: ./application/models/M_pejabat.php */