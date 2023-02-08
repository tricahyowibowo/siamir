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
                <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Saldo Awal</h3>
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
                    <form class="form-horizontal" action="<?=base_url('akun/simpansaldoawal')?>" role="form" id="addKategori" method="post">
                      <div class="box-body">

                        <div class="form-group">
                          <label for="akun" class="col-sm-4 control-label">Akun :</label>
                          <div class="col-sm-8">
                            <select class="form-control form" name="akun" id="akun">
                              <option value="">-- Pilih Akun--</option>
                              <?php foreach($list_akun as $b){ ?>
                              <option value="<?=$b->id_akun?>"><?=$b->nama_akun?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="saldoawal" class="col-sm-4 control-label" >Saldo Awal :</label>
                              <div class="col-sm-8">
                              <input type="text" name="saldoawal" id="saldoawal" class="form-control required form" placeholder="Tulisakan saldo awal (ex 5000)">
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

  <script>
$('.form').select2({
  placeholder: 'Pilih akun',
  allowClear: true
});
	</script>

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