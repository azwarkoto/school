<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4 ">
      <div class="card-header">
        Identitas Saya
      </div>
      <div class="card-body maxeder">
        <form action="<?= base_url('siswa/create') ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>No. Peserta Ujian Nasional SMP</label>
              <input type="text" name="no_peserta_ujian_nasional" class="form-control" placeholder="Nomor Ujian Nasional SMP" value="<?= set_value('no_peserta_ujian_nasional') ?>">
              <?= form_error('no_peserta_ujian_nasional','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>No. Nik Siswa</label>
              <input type="text" name="no_nik_siswa" class="form-control" placeholder="No Nik Siswa" value="<?= set_value('no_nik_siswa') ?>">
              <?= form_error('no_nik_siswa','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>No. Akte Kelahiran</label>
              <input type="text" name="no_akte_kelahiran" class="form-control" placeholder="No Akte Kelahiran" value="<?= set_value('no_akte_kelahiran') ?>">
              <?= form_error('no_akte_kelahiran','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>No. Induk Siswa Nasional (NISN)</label>
              <input type="text" name="nisn" class="form-control" placeholder="No Induk Siswa Nasional" value="<?= set_value('nisn') ?>">
              <?= form_error('nisn','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Diterima Pada</label>
              <input type="text" name="diterima_pada" class="form-control" placeholder="No Induk SMK Negeri" value="<?= set_value('diterima_pada') ?>">
              <?= form_error('diterima_pada','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Kelas</label>
              <select name="kelas_diterima" class="select2 form-control">
                <option value="X" <?= (set_value('kelas_diterima') == 'X' ? 'selected' : '') ?>>X</option>
                <option value="XI" <?= (set_value('kelas_diterima') == 'XI' ? 'selected' : '') ?>>XI</option>
                <option value="XII" <?= (set_value('kelas_diterima') == 'XII' ? 'selected' : '') ?>>XII</option>
              </select>
              <?= form_error('kelas_diterima','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Semester</label>
              <select name="semester_diterima" class="select2 form-control">
                <option value="GANJIL" <?= (set_value('semester_diterima') == 'GANJIL' ? 'selected' : '') ?>>Ganjil</option>
                <option value="GENAP" <?= (set_value('semester_diterima') == 'GENAP' ? 'selected' : '') ?>>Genap</option>
              </select>
              <?= form_error('semester_diterima','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Jurusan</label>
              <select name="jurusan_diterima" class="select2 form-control">
                <option value="TKJ" <?= (set_value('jurusan_diterima') == 'TKJ' ? 'selected' : '') ?>>TKJ</option>
                <option value="AKL" <?= (set_value('jurusan_diterima') == 'AKL' ? 'selected' : '') ?>>AKL</option>
                <option value="OTKP" <?= (set_value('jurusan_diterima') == 'OTKP' ? 'selected' : '') ?>>OTKP</option>
                <option value="BDP" <?= (set_value('jurusan_diterima') == 'BDP' ? 'selected' : '') ?>>BDP</option>
              </select>
              <?= form_error('jurusan_diterima','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Nama Lengkap Siswa</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Siswa" value="<?= set_value('nama') ?>">
              <?= form_error('nama','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jk" class="select2 form-control">
                <option value="L" <?= (set_value('jk') == 'L' ? 'selected' : '') ?>>Laki-laki</option>
                <option value="P" <?= (set_value('jk') == 'P' ? 'selected' : '') ?>>Perempuan</option>
              </select>
              <?= form_error('jk','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="temp_lahir" class="form-control" placeholder="Tempat Lahir (Kota)" value="<?= set_value('temp_lahir') ?>">
              <?= form_error('temp_lahir','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="text" name="tgl_lahir" class="form-control" placeholder="Tgl Bln (Ex: 1 JANUARI)" value="<?= set_value('tgl_lahir') ?>">
              <?= form_error('tgl_lahir','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Agama</label>
              <select name="agama" class="select2 form-control">
                <option value="ISLAM" <?= (set_value('agama') == 'ISLAM' ? 'selected' : '') ?>>Islam</option>
                <option value="KATOLIK" <?= (set_value('agama') == 'KATOLIK' ? 'selected' : '') ?>>Katolik</option>
                <option value="BUDHA" <?= (set_value('agama') == 'BUDHA' ? 'selected' : '') ?>>Budha</option>
                <option value="HINDU" <?= (set_value('agama') == 'HINDU' ? 'selected' : '') ?>>Hindu</option>
                <option value="KONGHUCU" <?= (set_value('agama') == 'KONGHUCU' ? 'selected' : '') ?>>Konghucu</option>
              </select>
              <?= form_error('agama','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Anak Ke Berapa</label>
              <input type="number" name="anak_ke" class="form-control" placeholder="Urutan Berdasarkan KK" value="<?= set_value('anak_ke') ?>">
              <?= form_error('anak_ke','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Status Dalam Keluarga</label>
              <select name="status_dlm_keluarga" class="select2 form-control">
                <option value="ANAK KANDUNG" <?= (set_value('status_dlm_keluarga') == 'ANAK KANDUNG' ? 'selected' : '') ?>>Anak Kandung</option>
                <option value="ANAK TIRI" <?= (set_value('status_dlm_keluarga') == 'ANAK TIRI' ? 'selected' : '') ?>>Anak Tiri</option>
                <option value="ANAK ANGKAT" <?= (set_value('status_dlm_keluarga') == 'ANAK ANGKAT' ? 'selected' : '') ?>>Anak Angkat</option>
              </select>
              <?= form_error('status_dlm_keluarga','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Jumlah Saudara Kandung</label>
              <input type="number" name="anak_ke" class="form-control" placeholder="Jumlah Saudara Kandung" value="<?= set_value('jmlh_saudara_kandung') ?>">
              <?= form_error('jmlh_saudara_kandung','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Jumlah Saudara Tiri</label>
              <input type="number" name="anak_ke" class="form-control" placeholder="Jumlah Saudara Kandung" value="<?= set_value('jmlh_saudara_kandung') ?>">
              <?= form_error('jmlh_saudara_kandung','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <!-- <label></label> -->
              <select name="status_diri" class="select2 form-control">
                <option value="YATIM" <?= (set_value('status_diri') == 'YATIM' ? 'selected' : '') ?>>Yatim</option>
                <option value="PIATU" <?= (set_value('status_diri') == 'PIATU' ? 'selected' : '') ?>>Piatu</option>
                <option value="YATIM PIATU" <?= (set_value('status_diri') == 'YATIM PIATU' ? 'selected' : '') ?>>Yatim Piatu</option>
              </select>
              <?= form_error('status_diri','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Bahasa Sehari-hari</label>
              <input type="text" name="bahasa_sehari" class="form-control" placeholder="Bahasa yang digunakan sehari hari" value="<?= set_value('bahasa_sehari') ?>">
              <?= form_error('bahasa_sehari','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Alamat Rumah</label>
              <textarea name="alamat_rumah" class="form-control" placeholder="Alamat Rumah Lengkap"><?= set_value('alamat_rumah') ?></textarea>
              <?= form_error('alamat_rumah','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Kelurahan</label>
              <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" value="<?= set_value('kelurahan') ?>">
              <?= form_error('kelurahan','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= set_value('kecamatan') ?>">
              <?= form_error('kecamatan','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>No Telp Rumah</label>
              <input type="text" name="telp_rumah" class="form-control" placeholder="No Telp Rumah" value="<?= set_value('telp_rumah') ?>">
              <?= form_error('telp_rumah','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>No HP Aktif</label>
              <input type="text" name="telp_siswa" class="form-control" placeholder="No HP Aktif" value="<?= set_value('telp_siswa') ?>">
              <?= form_error('telp_siswa','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Email Siswa</label>
              <input type="text" name="email" class="form-control" placeholder="Email Siswa" value="<?= set_value('email') ?>">
              <?= form_error('email','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Saat Ini Tinggal Dengan</label>
              <input type="text" name="tinggal_dengan" class="form-control" placeholder="Tinggal Dengan" value="<?= set_value('tinggal_dengan') ?>">
              <?= form_error('tinggal_dengan','<small class="form-text text-danger">','</small>') ?>
            </div>

            
            <div class="form-group">
              <label>Hobi</label>
              <input type="text" name="hobi" class="form-control" placeholder="Hobi" value="<?= set_value('hobi') ?>">
              <?= form_error('hobi','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Cita-cita</label>
              <input type="text" name="cita_cita" class="form-control" placeholder="Cita cita" value="<?= set_value('cita_cita') ?>">
              <?= form_error('cita_cita','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Keterampilan</label>
              <input type="text" name="keterampilan" class="form-control" placeholder="Keterampilan" value="<?= set_value('keterampilan') ?>">
              <?= form_error('keterampilan','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Prestasi yang pernah diraih (SLTP)</label>
              <input type="text" name="prestasi" class="form-control" placeholder="Prestasi" value="<?= set_value('prestasi') ?>">
              <?= form_error('prestasi','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Bentuk Wajah</label>
              <select name="bentuk_wajah" class="select2 form-control">
                <option value="PERSEGI PANJANG" <?= (set_value('bentuk_wajah') == 'PERSEGI PANJANG' ? 'selected' : '') ?>>Persegi Panjang</option>
                <option value="BUNDAR" <?= (set_value('bentuk_wajah') == 'BUNDAR' ? 'selected' : '') ?>>Bundar</option>
                <option value="BERLIAN" <?= (set_value('bentuk_wajah') == 'BERLIAN' ? 'selected' : '') ?>>Berlian</option>
                <option value="OVAL" <?= (set_value('bentuk_wajah') == 'OVAL' ? 'selected' : '') ?>>Oval</option>
                <option value="PERSEGI" <?= (set_value('bentuk_wajah') == 'PERSEGI' ? 'selected' : '') ?>>Persegi</option>
                <option value="SEGI TIGA" <?= (set_value('bentuk_wajah') == 'SEGI TIGA' ? 'selected' : '') ?>>Segi Tiga</option>
              </select>
              <?= form_error('bentuk_wajah','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Warna Kulit</label>
              <select name="warna_kulit" class="select2 form-control">
                <option value="PUTIH" <?= (set_value('warna_kulit') == 'PUTIH' ? 'selected' : '') ?>>Putih</option>
                <option value="KUNING LANGSAT" <?= (set_value('warna_kulit') == 'KUNING LANGSAT' ? 'selected' : '') ?>>Kuning Langsat</option>
                <option value="SAWO MATANG" <?= (set_value('warna_kulit') == 'SAWO MATANG' ? 'selected' : '') ?>>Sawo Matang</option>
                <option value="HITAM" <?= (set_value('warna_kulit') == 'HITAM' ? 'selected' : '') ?>>Hitam</option>
              </select>
              <?= form_error('warna_kulit','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Golongan Darah</label>
              <select name="gol_darah" class="select2 form-control">
                <option value="A" <?= (set_value('gol_darah') == 'A' ? 'selected' : '') ?>>A</option>
                <option value="B" <?= (set_value('gol_darah') == 'B' ? 'selected' : '') ?>>B</option>
                <option value="AB" <?= (set_value('gol_darah') == 'AB' ? 'selected' : '') ?>>AB</option>
                <option value="O" <?= (set_value('gol_darah') == 'O' ? 'selected' : '') ?>>O</option>
                <option value="B+" <?= (set_value('gol_darah') == 'B+' ? 'selected' : '') ?>>B+</option>
                <option value="B-" <?= (set_value('gol_darah') == 'B-' ? 'selected' : '') ?>>AB-</option>
              </select>
              <?= form_error('gol_darah','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Penyakit yang diderita</label>
              <input type="text" name="penyakit" class="form-control" placeholder="Penyakit" value="<?= set_value('penyakit') ?>">
              <?= form_error('penyakit','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Tinggi Badan</label>
              <input type="text" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan" value="<?= set_value('tinggi_badan') ?>">
              <?= form_error('tinggi_badan','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Berat Badan</label>
              <input type="text" name="berat_badan" class="form-control" placeholder="Berat Badan" value="<?= set_value('berat_badan') ?>">
              <?= form_error('berat_badan','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Jarak Ke Sekolah/waktu</label>
              <input type="text" name="jarak_ke_sekolah" class="form-control" placeholder="Jarak Ke Sekolah" value="<?= set_value('jarak_ke_sekolah') ?>">
              <?= form_error('jarak_ke_sekolah','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Cara Mencapai Sekolah</label>
              <select name="cara_ke_sekolah" class="select2 form-control">
                <option value="KENDARAAN UMUM" <?= (set_value('cara_ke_sekolah') == 'KENDARAAN UMUM' ? 'selected' : '') ?>>Kendaraan Umum</option>
                <option value="KENDARAAN PRIBADI" <?= (set_value('cara_ke_sekolah') == 'KENDARAAN PRIBADI' ? 'selected' : '') ?>>Kendaraan Pribadi</option>
                <option value="MOTOR" <?= (set_value('cara_ke_sekolah') == 'MOTOR' ? 'selected' : '') ?>>Motor</option>
                <option value="KERETA" <?= (set_value('cara_ke_sekolah') == 'KERETA' ? 'selected' : '') ?>>Kereta</option>
                <option value="SEPEDA" <?= (set_value('cara_ke_sekolah') == 'SEPEDA' ? 'selected' : '') ?>>Sepeda</option>
                <option value="JLN KAKI" <?= (set_value('cara_ke_sekolah') == 'JLN KAKI' ? 'selected' : '') ?>>Jalan Kaki</option>
              </select>
              <?= form_error('cara_ke_sekolah','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Tingkat Ekonomi</label>
              <select name="tingkat_ekonomi" class="select2 form-control">
                <option value="MAMPU" <?= (set_value('cara_ke_sekolah') == 'MAMPU' ? 'selected' : '') ?>>Mampu</option>
                <option value="TIDAK MAMPU" <?= (set_value('cara_ke_sekolah') == 'TIDAK MAMPU' ? 'selected' : '') ?>>Tidak Mampu</option>
              </select>
              <?= form_error('tingkat_ekonomi','<small class="form-text text-danger">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label>Beasiswa/ Bantuan Biaya Pendidikan</label>
              <select name="beasiswa" class="select2 form-control">
                <option value="PENERIMA" <?= (set_value('beasiswa') == 'PENERIMA' ? 'selected' : '') ?>>Penerima</option>
                <option value="BUKAN PENERIMA" <?= (set_value('beasiswa') == 'BUKAN PENERIMA' ? 'selected' : '') ?>>Bukan Penerima</option>
              </select>
              <?= form_error('beasiswa','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Nama Bantuan Biaya Pendidikan (Jika Menerima)</label>
              <input type="text" name="nama_bantuan_beasiswa" class="form-control" placeholder="Nama Bantuan Pendidikan (Jika Menerima)" value="<?= set_value('nama_bantuan_beasiswa') ?>">
              <?= form_error('nama_bantuan_beasiswa','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Sekolah Asal</label>
              <input type="text" name="sekolah_asal" class="form-control" placeholder="Sekolah Asal" value="<?= set_value('sekolah_asal') ?>">
              <?= form_error('sekolah_asal','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Alamat Lengkap Sekolah Asal</label>
              <textarea name="alamt_sekolah_asal" class="form-control" placeholder="Alamat Lengkap Sekolah Asal"><?= set_value('alamt_sekolah_asal') ?></textarea>
              <?= form_error('alamt_sekolah_asal','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Tanggal Lulus</label>
              <input type="text" name="tanggal_lulus" class="form-control" placeholder="Tamggal Lulus" value="<?= set_value('tanggal_lulus') ?>">
              <?= form_error('tanggal_lulus','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>No. IJAZAH SLTP </label>
              <input type="text" name="no_ijazah" class="form-control" placeholder="No IJAZAH SLTP" value="<?= set_value('no_ijazah') ?>">
              <?= form_error('no_ijazah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>No. SKHUN SLTP </label>
              <input type="text" name="no_skhun" class="form-control" placeholder="No SKHUN SLTP" value="<?= set_value('no_skhun') ?>">
              <?= form_error('no_skhun','<small class="form-text text-danger">','</small>') ?>
            </div>
            <br>
            <p><b>Data Orang Tua Siswa (Ayah)</b></p> <br>
            <div class="form-group">
              <label>NIK Ayah </label>
              <input type="text" name="nik_ayah" class="form-control" placeholder="Nik Ayah" value="<?= set_value('nik_ayah') ?>">
              <?= form_error('nik_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Nama Ayah </label>
              <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="<?= set_value('nama_ayah') ?>">
              <?= form_error('nama_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Tempat Lahir </label>
              <input type="text" name="temp_lahir_ayah" class="form-control" placeholder="Tempat Lahir Ayah" value="<?= set_value('temp_lahir_ayah') ?>">
              <?= form_error('temp_lahir_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir </label>
              <input type="text" name="tgl_lahir_ayah" class="form-control" placeholder="Tanggal Lahir Ayah" value="<?= set_value('tgl_lahir_ayah') ?>">
              <?= form_error('tgl_lahir_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>No HP/ Telp</label>
              <input type="text" name="no_hp_ayah" class="form-control" placeholder="No Hp Ayah" value="<?= set_value('no_hp_ayah') ?>">
              <?= form_error('no_hp_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah" value="<?= set_value('pekerjaan_ayah') ?>">
              <?= form_error('pekerjaan_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Penghasilan</label>
              <input type="text" name="penghasilan_ayah" class="form-control" placeholder="Penghasilan Ayah" value="<?= set_value('penghasilan_ayah') ?>">
              <?= form_error('penghasilan_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Pendidikan</label>
              <select name="pendidikan_ayah" class="select2 form-control">
                <option value="SD" <?= (set_value('pendidikan_ayah') == 'SD' ? 'selected' : '') ?>>SD</option>
                <option value="SMP" <?= (set_value('pendidikan_ayah') == 'SMP' ? 'selected' : '') ?>>SMP</option>
                <option value="SMA" <?= (set_value('pendidikan_ayah') == 'SMA' ? 'selected' : '') ?>>SMA</option>
                <option value="SMK" <?= (set_value('pendidikan_ayah') == 'SMK' ? 'selected' : '') ?>>SMK</option>
                <option value="D1" <?= (set_value('pendidikan_ayah') == 'D1' ? 'selected' : '') ?>>D1</option>
                <option value="D2" <?= (set_value('pendidikan_ayah') == 'D2' ? 'selected' : '') ?>>D2</option>
                <option value="D3" <?= (set_value('pendidikan_ayah') == 'D3' ? 'selected' : '') ?>>D3</option>
                <option value="S1" <?= (set_value('pendidikan_ayah') == 'S1' ? 'selected' : '') ?>>S1</option>
                <option value="S2" <?= (set_value('pendidikan_ayah') == 'S2' ? 'selected' : '') ?>>S2</option>
              </select>
              <?= form_error('pendidikan_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status_ayah" class="select2 form-control">
                <option value="KANDUNG" <?= (set_value('status_ayah') == 'KANDUNG' ? 'selected' : '') ?>>Kandung</option>
                <option value="TIRI" <?= (set_value('status_ayah') == 'KANDUNG' ? 'selected' : '') ?>>Tiri</option>
                <option value="ANGKAT" <?= (set_value('status_ayah') == 'ANGKAT' ? 'selected' : '') ?>>Angkat</option>
              </select>
              <?= form_error('status_ayah','<small class="form-text text-danger">','</small>') ?>
            </div>
            <br>
            <p><b>Data Orang Tua Siswa (Ibu)</b></p> <br>
            <div class="form-group">
              <label>NIK Ibu </label>
              <input type="text" name="nik_ibu" class="form-control" placeholder="Nik Ibu" value="<?= set_value('nik_ibu') ?>">
              <?= form_error('nik_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Nama Ibu </label>
              <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="<?= set_value('nama_ibu') ?>">
              <?= form_error('nama_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Tempat Lahir </label>
              <input type="text" name="temp_lahir_ibu" class="form-control" placeholder="Tempat Lahir Ibu" value="<?= set_value('temp_lahir_ibu') ?>">
              <?= form_error('temp_lahir_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir </label>
              <input type="text" name="tgl_lahir_ibu" class="form-control" placeholder="Tanggal Lahir Ibu" value="<?= set_value('tgl_lahir_ibu') ?>">
              <?= form_error('tgl_lahir_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>No HP/ Telp</label>
              <input type="text" name="no_hp_ibu" class="form-control" placeholder="No Hp Ibu" value="<?= set_value('no_hp_ibu') ?>">
              <?= form_error('no_hp_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu" value="<?= set_value('pekerjaan_ibu') ?>">
              <?= form_error('pekerjaan_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Penghasilan</label>
              <input type="text" name="penghasilan_ibu" class="form-control" placeholder="Penghasilan Ibu" value="<?= set_value('penghasilan_ibu') ?>">
              <?= form_error('penghasilan_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Pendidikan</label>
              <select name="pendidikan_ibu" class="select2 form-control">
                <option value="SD" <?= (set_value('pendidikan_ibu') == 'SD' ? 'selected' : '') ?>>SD</option>
                <option value="SMP" <?= (set_value('pendidikan_ibu') == 'SMP' ? 'selected' : '') ?>>SMP</option>
                <option value="SMA" <?= (set_value('pendidikan_ibu') == 'SMA' ? 'selected' : '') ?>>SMA</option>
                <option value="SMK" <?= (set_value('pendidikan_ibu') == 'SMK' ? 'selected' : '') ?>>SMK</option>
                <option value="D1" <?= (set_value('pendidikan_ibu') == 'D1' ? 'selected' : '') ?>>D1</option>
                <option value="D2" <?= (set_value('pendidikan_ibu') == 'D2' ? 'selected' : '') ?>>D2</option>
                <option value="D3" <?= (set_value('pendidikan_ibu') == 'D3' ? 'selected' : '') ?>>D3</option>
                <option value="S1" <?= (set_value('pendidikan_ibu') == 'S1' ? 'selected' : '') ?>>S1</option>
                <option value="S2" <?= (set_value('pendidikan_ibu') == 'S2' ? 'selected' : '') ?>>S2</option>
              </select>
              <?= form_error('pendidikan_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status_ibu" class="select2 form-control">
                <option value="KANDUNG" <?= (set_value('status_ibu') == 'KANDUNG' ? 'selected' : '') ?>>Kandung</option>
                <option value="TIRI" <?= (set_value('status_ibu') == 'KANDUNG' ? 'selected' : '') ?>>Tiri</option>
                <option value="ANGKAT" <?= (set_value('status_ibu') == 'ANGKAT' ? 'selected' : '') ?>>Angkat</option>
              </select>
              <?= form_error('status_ibu','<small class="form-text text-danger">','</small>') ?>
            </div>
            <br>
            <p><b>Data Wali Murid</b></p> <br>
            <div class="form-group">
              <label>NIK Wali </label>
              <input type="text" name="nik_wali" class="form-control" placeholder="Nik Wali" value="<?= set_value('nik_wali') ?>">
              <?= form_error('nik_wali','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Nama Wali </label>
              <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali" value="<?= set_value('nama_wali') ?>">
              <?= form_error('nama_wali','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Tempat Lahir </label>
              <input type="text" name="temp_lahir_wali" class="form-control" placeholder="Tempat Lahir Wali" value="<?= set_value('temp_lahir_wali') ?>">
              <?= form_error('temp_lahir_wali','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir </label>
              <input type="text" name="tgl_lahir_wali" class="form-control" placeholder="Tanggal Lahir Wali" value="<?= set_value('tgl_lahir_wali') ?>">
              <?= form_error('tgl_lahir_wali','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>No HP/ Telp</label>
              <input type="text" name="no_hp_wali" class="form-control" placeholder="No Hp Wali" value="<?= set_value('no_hp_wali') ?>">
              <?= form_error('no_hp_wali','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali" value="<?= set_value('pekerjaan_wali') ?>">
              <?= form_error('pekerjaan_wali','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Penghasilan</label>
              <input type="text" name="penghasilan_wali" class="form-control" placeholder="Penghasilan Wali" value="<?= set_value('penghasilan_wali') ?>">
              <?= form_error('penghasilan_wali','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Pendidikan</label>
              <select name="pendidikan_wali" class="select2 form-control">
                <option value="SD" <?= (set_value('pendidikan_wali') == 'SD' ? 'selected' : '') ?>>SD</option>
                <option value="SMP" <?= (set_value('pendidikan_wali') == 'SMP' ? 'selected' : '') ?>>SMP</option>
                <option value="SMA" <?= (set_value('pendidikan_wali') == 'SMA' ? 'selected' : '') ?>>SMA</option>
                <option value="SMK" <?= (set_value('pendidikan_wali') == 'SMK' ? 'selected' : '') ?>>SMK</option>
                <option value="D1" <?= (set_value('pendidikan_wali') == 'D1' ? 'selected' : '') ?>>D1</option>
                <option value="D2" <?= (set_value('pendidikan_wali') == 'D2' ? 'selected' : '') ?>>D2</option>
                <option value="D3" <?= (set_value('pendidikan_wali') == 'D3' ? 'selected' : '') ?>>D3</option>
                <option value="S1" <?= (set_value('pendidikan_wali') == 'S1' ? 'selected' : '') ?>>S1</option>
                <option value="S2" <?= (set_value('pendidikan_wali') == 'S2' ? 'selected' : '') ?>>S2</option>
              </select>
              <?= form_error('pendidikan_wali','<small class="form-text text-danger">','</small>') ?>
            </div>

            <div class="form-group">
              <label>Hubungan Dengan Keluarga </label>
              <input type="text" name="status_wali" class="form-control" placeholder="Hubungan Dengan Keluarga" value="<?= set_value('status_wali') ?>">
              <?= form_error('status_wali','<small class="form-text text-danger">','</small>') ?>
            </div>



          </div>
        </div>
      </div>
          <div class="card-footer">
            <div class="form-group">
              <button class="btn btn-sm btn-success btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-save"></i>
                </span>
                <span class="text">Update</span>
              </button>
            </div>
          </div>
          </form>

    </div>
</div> 