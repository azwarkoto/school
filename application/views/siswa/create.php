<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4 ">
      <div class="card-header">
        <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-warning btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-backward"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
      </div>
      <div class="card-body maxeder">
        <form action="<?= base_url('siswa/create') ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>NIS</label>
              <input type="text" name="nis" class="form-control" placeholder="Nomor induk siswa" value="<?= set_value('nis') ?>">
              <?= form_error('nis','<small class="form-text text-danger">','</small>') ?>
            </div>
            <div class="form-group">
              <label>Nama lengkap</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?= set_value('nama') ?>">
              <?= form_error('nama','<small class="form-text text-danger">','</small>') ?>
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
            <span class="text">Simpan</span>
          </button>
        </div>
      </div>
      </form>
    </div>
</div> 