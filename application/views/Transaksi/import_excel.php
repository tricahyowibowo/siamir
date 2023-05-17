<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Input Bahan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Data Bahan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data bahan</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
            <?php if($this->session->flashdata('msg_gagal')){ ?>
              <div class="alert alert-danger alert-dismissible" style="width:91%">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong><br> <?php echo $this->session->flashdata('msg_gagal');?>
              </div>
            <?php } ?>

            <?php if($this->session->flashdata('msg_berhasil')){ ?>
              <div class="alert alert-success alert-dismissible" style="width:91%">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
              </div>
            <?php } ?>

            <?php if(validation_errors()){ ?>
              <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
              </div>
            <?php } ?>
            <form class="form-horizontal" action="<?=base_url('transaksi/spreadsheet_import')?>" role="form" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tgl_transaksi" class="col-sm-4 control-label" >File :</label>
                      <div class="col-sm-3">
                      <input type="file" name="upload_file" id="upload_file" class="form-control">
                      </div>
                </div>

                <div class="form-group">
                    <label for="tgl_transaksi" class="col-sm-4 control-label" >Template :</label>
                      <div class="col-sm-3">
                        <a href="<?=base_url('transaksi/format_excel')?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> unduh template</a>
                      </div>
                </div>
            
          </div>
          <!-- /. box-body -->
          <div class="box-footer">
            <div class="col-xs-12">
              <a type="button" class="btn btn-default" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
              <input type="submit" value="import" class="btn btn btn-success pull-right"></input>
            </div>
          </div>
          </form>
        </div>
        <!-- /.box-footer -->
        <!-- /.box -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
<!-- /.content-wrapper -->