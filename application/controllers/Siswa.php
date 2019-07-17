<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    is_login();
    $this->load->model('M_siswa');
    $this->load->library('form_validation');
    $this->load->library('excel');
  }
  /**
   * Show all database siswa and create datatable
   * 
   * @return view
   */ 
  public function index() 
  {
    $data['siswas'] = $this->db->get('siswa')->result();
    $this->template->load('template','siswa/index',$data);
  }
  public function create()
  {
    $this->form_validation->set_rules('nis','NIS','required|is_unique[siswa.nis]');
    $this->form_validation->set_rules('nama','Nama Lengkap','required');
    if($this->form_validation->run() == false){
      $this->template->load('template','siswa/create');
    }
    else {
      $data = [
        'nis'               => $this->input->post('nis',true),
        'nama'              => $this->input->post('nama',true),

      ];
      $this->db->insert('siswa',$data);
      helper_log(uniqid().time(), "Menambah data siswa");
      alertsuccess('message','Data berhasil ditambah');
      redirect('siswa/index');
    }
  }

  /**
   * Handle a request from user upload
   * 
   * @return view
   */
  public function upload()
  {
    is_admin();
    $this->template->load('template','siswa/upload');
  }

  public function import2()
  {
    $jumlah_guru = $this->db->get_where('siswa')->num_rows();
    
    $status=array(); 
    
		$importdata = $_REQUEST['data'];
		$date   = new DateTime;
    
    $fileName = $_FILES['import']['name'];
		$config['upload_path'] = './uploads/files/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx';
		$config['overwrite'] = TRUE; 
    $this->load->library('upload');
    
    $this->upload->initialize($config);
		if(!$this->upload->do_upload('import')){
			$status['type'] = 'error';
			$status['text'] = $this->upload->display_errors();
			$status['title'] = 'Upload file error!';
			echo json_encode($status);
			exit();
    }
    
		$inputFileName = './uploads/files/'.$fileName;
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			$worksheetTitle = $worksheet->getTitle();
			$highestRow = $worksheet->getHighestRow(); // e.g. 10
			$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    }
    
		$nrColumns = ord($highestColumn) - 64;
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		$status['highestColumn'] = $highestColumn;
		$status['highestRow'] = $highestRow;
		$status['sheet'] = $sheet;
    $status['nrColumns'] = $nrColumns;
    
		if($highestColumn == 'B') { // Import data guru
			$row = $objPHPExcel->getActiveSheet()->getRowIterator(1)->current();
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);
			foreach ($cellIterator as $k=>$cell) {
				$key[] = $cell->getValue();
			}
			for ($row = 2; $row <= $highestRow; ++ $row) {
				$val = array();
				for ($col = 0; $col < $highestColumnIndex; ++ $col) {
					$cell = $worksheet->getCellByColumnAndRow($col, $row);
					$val[] = $cell->getValue();
				}
				$i=0;
				foreach($val as $k=>$v){
					$InsertData[] = array(
						"$key[$i]"=> $v
						);
					$i++;
				}
				$flat = call_user_func_array('array_merge', $InsertData);
				$password	= array("password"=>12345678);
				$masukkan[] = array_merge($flat,$password);
			}
			$jumlah_data_import = count($masukkan);
			$sum=0;
			$data_sudah_ada = array();
      $gagal_insert_user = array();
      
		foreach($masukkan as $k=>$v){
      $a = $this->db->get_where('siswa',['nis' => $v['nis']])->result();
      $sum+=count($a);
      
			if(!$a){
				$nis 	= $v['nis'];
        $password 	= $v['nis'];
        $nama =   $v['nama'];
        $this->db->insert('siswa',[
          'nis'  => $nis,
          'nama'      => $nama,
          'password'   => password_hash($password,PASSWORD_DEFAULT),
        ]);
			} else {
				$data_sudah_ada[] .= 'Data sudah ada';
			}
		}
		$jml_data_sudah_ada = count($data_sudah_ada);
		$kolom = ($highestRow - 1);
		$disimpan = ($kolom - $sum);
		$ditolak = ($kolom - $jml_data_sudah_ada);
		$status['text']	= '<table width="100%" class="table table-bordered">
				<tr>
					<td class="text-center">Jumlah data</td>
					<td class="text-center">Status</td>
				</tr>
				<tr>
					<td>'.$disimpan.'</td>
					<td><span class="badge badge-success">sukses disimpan</span></td>
				<tr>
					<td>'.$jml_data_sudah_ada.'</td>
					<td><span class="badge badge-danger">data sudah ada</span></td>
				</tr>
				</table>';
      $status['type'] = 'success';
      $status['title'] = 'Import data sukses!';
    } else {
      $status['type'] = 'error';
      $status['text'] = 'Format Import tidak sesuai. Silahkan download template yang telah disediakan.';
      $status['title'] = 'Import Data Gagal!';
    }
    unlink($inputFileName);
	echo json_encode($status);
  }
  public function detail($id_siswa)
  {
    $data['siswa'] = $this->db->get_where('siswa',['id' => $id_siswa])->row();
    $this->template->set('modal_title','Detail siswa');
    $this->template->set('modal_s','modal-xl');
    $this->template->load('modal','siswa/view',$data);
  }
  /**
   * Hapus siswa
   * 
   */
  public function delete($id_siswa)
  {
    $this->db->delete('siswa',['id' => $id_siswa]);
    helper_log("delete", "Menghapus data siswa");

    $data['title'] = 'Sukses';
    $data['text'] = 'Data berhasil dihapus';
    $data['type'] = 'success';
    
    echo json_encode($data);
    
  }

}