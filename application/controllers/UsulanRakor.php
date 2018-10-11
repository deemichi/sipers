<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsulanRakor extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_usulanrakor');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataUsulanRakor'] 	= $this->M_usulanrakor->select_all();

		$data['page'] 		= "Usulan Rakor";
		$data['judul'] 		= "Data Usulan Rakor";
		$data['deskripsi'] 	= "Manage Data UsulanRakor";

		$data['modal_tambah_usulanrakor'] = show_my_modal('modals/modal_tambah_usulanrakor', 'tambah-usulanrakor', $data);

		$this->template->views('usulanrakor/home', $data);
	}

	public function tampil() {
		$data['dataUsulanRakor'] = $this->M_usulanrakor->select_all();
		$this->load->view('usulanrakor/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('tglusulan', 'Tanggal Usulan Rakor', 'trim|required');
		$this->form_validation->set_rules('uraianusulan', 'Uraian Rakor', 'trim|required');
		
		$id_session = $this->userdata->id;
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_usulanrakor->insert($data,$id_session);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Usulan Rakor Berhasil Ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Usulan Rakor Gagal Ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataUsulanRakor'] 	= $this->M_usulanrakor->select_by_id($id);

		echo show_my_modal('modals/modal_update_usulanrakor', 'update-usulanrakor', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('tglusulan', 'Tanggal Usulan Rakor', 'trim|required');
		$this->form_validation->set_rules('uraianusulan', 'Uraian Rakor', 'trim|required');

		$id_session = $this->userdata->id;
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_usulanrakor->update($data,$id_session);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Usulan Rakor Berhasil Diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Usulan Rakor Gagal Diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_usulanrakor->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Usulan Rakor Berhasil Dihapus', '20px');
		} else {
			echo show_err_msg('Data Usulan Rakor Gagal Dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['usulanrakor'] = $this->M_usulanrakor->select_by_id($id);
		$data['jumlahUsulanRakor'] = $this->M_usulanrakor->total_rows();
		$data['dataUsulanRakor'] = $this->M_usulanrakor->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_usulanrakor', 'detail-usulanrakor', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_usulanrakor->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Nama UsulanRakor"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Instansi");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->d_nama); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->d_instansi); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data UsulanRakor.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data UsulanRakor.xlsx', NULL);
	}

	/*public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_usulanrakor->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_usulanrakor->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data UsulanRakor Berhasil diimport ke database'));
						redirect('UsulanRakor');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data UsulanRakor Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('UsulanRakor');
				}

			}
		}
	}*/
}

/* End of file UsulanRakor.php */
/* Location: ./application/controllers/UsulanRakor.php */