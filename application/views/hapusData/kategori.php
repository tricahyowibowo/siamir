  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Pilih Kategori
      </h1>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="container">
          <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Pilih Kategori</h3>
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
                    <form class="form-horizontal" action="<?=base_url('HapusData/data')?>" role="form" id="addKategori" method="post">
                      <div class="box-body">


                        <div class="form-group">
                          <label for="kategori" class="col-sm-4 control-label">Kategori :</label>
                          <div class="col-sm-6">
                            <select class="form-control required" name="kategori">
                              <option value="">-- Pilih Kategori--</option>
                              <?php foreach($list_kategori as $l){ ?>
                              <option value="<?=$l->id_kategori?>"><?=$l->nama_kategori?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="kas" class="col-sm-4 control-label">Sumber :</label>
                          <div class="col-sm-6">
                            <select class="form-control required" name="sumber" id="sumber">
                              <option value="">-- Pilih Sumber--</option>
                              <?php foreach($list_bank as $b){ ?>
                              <option value="<?=$b->id_akun?>"><?=$b->nama_akun?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_transaksi" class="col-sm-4 control-label" >Tanggal :</label>
                              <div class="col-sm-6">
                              <input type="date" name="tanggal" id="tanggal" class="form-control required" placeholder="Klik Disini">
                              </div>
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                          <button type="submit" class="btn pull-right btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
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

<script src="<?php echo base_url(); ?>assets/js/addKategori.js" type="text/javascript"></script>


    <script type="text/javascript">
      $(".form_datetime").datetimepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayBtn: true,
        pickTime: false,
        minView: 2,
        maxView: 4,
      });
  </script>