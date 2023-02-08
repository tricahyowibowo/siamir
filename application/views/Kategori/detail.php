<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Input Transaksi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Data Transaksi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="container">
        <div class="col-md-8">
            <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="container">

              <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
                </div>
              <?php } ?>

              <?php if(validation_errors()){ ?>
                <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                </div>
              <?php } ?>
              <div class="row">
                <div class="col-md-8">
                  <form class="form-horizontal" action="<?=base_url('kategori/update')?>" role="form" method="post">
                    <div class="box-body">

                    <?php foreach($list_data as $l){ ?>
                      <div class="form-group">
                          <label for="tgl_transaksi" class="col-sm-4 control-label" >Nama Kategori :</label>
                            <div class="col-sm-3">
                            <input type="hidden" name="id_kategori" id="id_kategori" class="form-control" value="<?= $l->id_kategori ?>">
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $l->nama_kategori ?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label for="tgl_transaksi" class="col-sm-4 control-label" >Kode Kategori :</label>
                            <div class="col-sm-3">
                            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" value="<?= $l->kode_kategori ?>">
                            </div>
                      </div>
                      <div class="form-group">
                      <label for="normal_balance" class="col-sm-4 control-label" >Kode Kategori :</label>
                      <div class="col-sm-3">
                        <select class="form-control theSelect" name="normal_balance" id="normal_balance">
                          <option <?= $l->normal_balance === "Debet" ? "selected": ""?> value="<?=$l->normal_balance ?>"> <?=$l->normal_balance?></option>
                          <option value="<?= $l->normal_balance != "Debet" ? "Debet": "Kredit"?>"><?= $l->normal_balance != "Debet" ? "Debet": "Kredit"?></option>
                        </select>
                        </div>
                      
                      </div>
                    <?php } ?>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?=base_url('kategori')?>" type="button" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <input type="submit" value="Update" class="btn pull-right btn btn-success"></input>
                    </div>
                    <!-- /.box-footer -->
                    <!-- /.box-body -->
                  </form>
                </div>
              </div>
            </div>
          <!-- /.box -->
          </div>
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->