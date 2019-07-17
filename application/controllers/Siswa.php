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
    is_admin();
    $data['siswas'] = $this->db->get('siswa')->result();
    $this->template->load('template','siswa/index',$data);
  }
  public function create()
  {
    is_admin();
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
    is_admin();
    $data['siswa'] = $this->db->get_where('siswa',['id' => $id_siswa])->row();
    $this->template->set('modal_title','Detail siswa');
    $this->template->set('modal_s','modal-xl');
    $this->template->load('modal','siswa/view',$data);
  }
  public function self_update()
  {
    $update = [
      'no_peserta_ujian_nasional'       => $this->input->post('no_peserta_ujian_nasional',true),
      'no_nik_siswa'                    => $this->input->post('no_nik_siswa'),
      'no_akte_kelahiran'               => $this->input->post('no_akte_kelahiran'),
      'nisn'                            => $this->input->post('nisn'),
      'diterima_pada'                   => $this->input->post('diterima_pada'),
      'kelas_diterima'                  => $this->input->post('kelas_diterima'),
      'semester_diterima'               => $this->input->post('semester_diterima'),
      'jurusan_diterima'                => $this->input->post('jurusan_diterima'),
      'nama'                            => $this->input->post('nama'),
      'jk'                              => $this->input->post('jk'),
      'temp_lahir'                      => $this->input->post('temp_lahir'),
      'tgl_lahir'                       => $this->input->post('tgl_lahir'),
      'agama'                           => $this->input->post('agama'),
      'anak_ke'                         => $this->input->post('anak_ke'),
      'status_dlm_keluarga'             => $this->input->post('status_dlm_keluarga'),
      'jmlh_saudara_kandung'            => $this->input->post('jmlh_saudara_kandung'),
      'jmlh_saudara_tiri'               => $this->input->post('jmlh_saudara_tiri'),
      'status_diri'                     => $this->input->post('status_diri'),
      'bahasa_sehari'                   => $this->input->post('bahasa_sehari'),
      'alamat_rumah'                    => $this->input->post('alamat_rumah'),
      'kelurahan'                       => $this->input->post('kelurahan'),
      'kecamatan'                       => $this->input->post('kecamatan'),
      'telp_rumah'                      => $this->input->post('telp_rumah'),
      'telp_siswa'                      => $this->input->post('telp_siswa'),
      'email'                           => $this->input->post('email'),
      'tinggal_dengan'                  => $this->input->post('tinggal_dengan'),
      'hobi'                            => $this->input->post('hobi'),
      'cita_cita'                       => $this->input->post('cita_cita'),
      'keterampilan'                    => $this->input->post('keterampilan'),
      'prestasi'                        => $this->input->post('prestasi'),
      'bentuk_wajah'                    => $this->input->post('bentuk_wajah'),
      'warna_kulit'                     => $this->input->post('warna_kulit'),
      'gol_darah'                       => $this->input->post('gol_darah'),
      'penyakit'                        => $this->input->post('penyakit'),
      'tinggi_badan'                    => $this->input->post('tinggi_badan'),
      'berat_badan'                     => $this->input->post('berat_badan'),
      'jarak_ke_sekolah'                => $this->input->post('jarak_ke_sekolah'),
      'cara_ke_sekolah'                 => $this->input->post('cara_ke_sekolah'),
      'tingkat_ekonomi'                 => $this->input->post('tingkat_ekonomi'),
      'beasiswa'                        => $this->input->post('beasiswa'),
      'nama_bantuan_beasiswa'           => $this->input->post('nama_bantuan_beasiswa'),
      'sekolah_asal'                    => $this->input->post('sekolah_asal'),
      'alamt_sekolah_asal'              => $this->input->post('alamt_sekolah_asal'),
      'tanggal_lulus'                   => $this->input->post('tanggal_lulus'),
      'no_ijazah'                       => $this->input->post('no_ijazah'),
      'no_skhun'                        => $this->input->post('no_skhun'),
      'nik_ayah'                        => $this->input->post('nik_ayah'),
      'nama_ayah'                       => $this->input->post('nama_ayah'),
      'temp_lahir_ayah'                 => $this->input->post('temp_lahir_ayah'),
      'tgl_lahir_ayah'                  => $this->input->post('tgl_lahir_ayah'),
      'no_hp_ayah'                      => $this->input->post('no_hp_ayah'),
      'pekerjaan_ayah'                  => $this->input->post('pekerjaan_ayah'),
      'penghasilan_ayah'                => $this->input->post('penghasilan_ayah'),
      'pendidikan_ayah'                 => $this->input->post('pendidikan_ayah'),
      'status_ayah'                     => $this->input->post('status_ayah'),
      'nik_ibu'                         => $this->input->post('nik_ibu'),
      'nama_ibu'                        => $this->input->post('nama_ibu'),
      'temp_lahir_ibu'                  => $this->input->post('temp_lahir_ibu'),
      'tgl_lahir_ibu'                   => $this->input->post('tgl_lahir_ibu'),
      'no_hp_ibu'                       => $this->input->post('no_hp_ibu'),
      'pekerjaan_ibu'                   => $this->input->post('pekerjaan_ibu'),
      'penghasilan_ibu'                 => $this->input->post('penghasilan_ibu'),
      'pendidikan_ibu'                  => $this->input->post('pendidikan_ibu'),
      'status_ibu'                      => $this->input->post('status_ibu'),
      'nik_wali'                        => $this->input->post('nik_wali'),
      'nama_wali'                       => $this->input->post('nama_wali'),
      'temp_lahir_wali'                 => $this->input->post('temp_lahir_wali'),
      'tgl_lahir_wali'                  => $this->input->post('tgl_lahir_wali'),
      'no_hp_wali'                      => $this->input->post('no_hp_wali'),
      'pekerjaan_wali'                  => $this->input->post('pekerjaan_wali'),
      'penghasilan_wali'                => $this->input->post('penghasilan_wali'),
      'pendidikan_wali'                 => $this->input->post('pendidikan_wali'),
      'status_wali'                     => $this->input->post('status_wali')
    ];

    $this->db->update('siswa',$update,['nis' => $this->session->userdata('username')]);
    alertsuccess('message','Berhasil Memperbarui identitas');
    redirect('dashboard/identitas_saya');
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