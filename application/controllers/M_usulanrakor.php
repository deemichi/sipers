<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usulanrakor extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('f_usulan');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM f_usulan WHERE f_kdusulan = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
     
    /*
	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, pejabat.nama AS pejabat, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, pejabat, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.if_usulan = pejabat.id AND pegawai.if_usulan={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}*/

	public function insert($data,$id_session) {
		$sql = "INSERT INTO f_usulan VALUES('','".$id_session."','','',NOW()," .$data['uraianusulan'] ."',
			'" .$data['tglusulan'] ."','1','','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('f_usulan', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data,$id_session) {
		$sql = "UPDATE f_usulan SET 
		f_uraianusulan='" .$data['uraianusulan'] ."', 
		f_tglusulan='" .$data['tglusulan'] ."'
		WHERE f_kdusulan='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM f_usulan WHERE f_kdusulan='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	/*public function check_nama($nama) {
		$this->db->where('d_nama', $nama);
		$data = $this->db->get('f_usulan');

		return $data->num_rows();
	}*/

	public function total_rows() {
		$data = $this->db->get('f_usulan');

		return $data->num_rows();
	}
}

/* End of file M_usulanrakor.php */
/* Location: ./application/models/M_usulanrakor.php */