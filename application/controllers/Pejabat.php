<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pejabat');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPejabat'] 	= $this->M_pejabat->select_all();

		$data['page'] 		= "Pejabat";
		$data['judul'] 		= "Data Pejabat";
		$data['deskripsi'] 	= "Manage Data Pejabat";

		$data['modal_tambah_pejabat'] = show_my_modal('modals/modal_tambah_pejabat', 'tambah-pejabat', $data);

		$this->template->views('pejabat/home', $data);
	}

	public function tampil() {
		$data['dataPejabat'] = $this->M_pejabat->select_all();
		$this->load->view('pejabat/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'Nama Pejabat', 'trim|required');
		$this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
		
		$id_session = $this->userdata->id;
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pejabat->insert($data,$id_session);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pejabat Berhasil Ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pejabat Gagal Ditambahkan', '20px');
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
		$data['dataPejabat'] 	= $this->M_pejabat->select_by_id($id);

		echo show_my_modal('modals/modal_update_pejabat', 'update-pejabat', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama Pejabat', 'trim|required');
		$this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');

		$id_session = $this->userdata->id;
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pejabat->update($data,$id_session);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pejabat Berhasil Diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pejabat Gagal Diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pejabat->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pejabat Berhasil Dihapus', '20px');
		} else {
			echo show_err_msg('Data Pejabat Gagal Dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['pejabat'] = $this->M_pejabat->select_by_id($id);
		$data['jumlahPejabat'] = $this->M_pejabat->total_rows();
		$data['dataPejabat'] = $this->M_pejabat->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_pejabat', 'detail-pejabat', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pejabat->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Nama Pejabat"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Instansi");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->d_nama); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->d_instansi); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pejabat.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pejabat.xlsx', NULL);
	}

	public function import() {
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
						$check = $this->M_pejabat->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_pejabat->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Pejabat Berhasil diimport ke database'));
						redirect('Pejabat');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pejabat Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Pejabat');
				}

			}
		}
	}
}

/* End of file Pejabat.php */
/* Location: ./application/controllers/Pejabat.php */