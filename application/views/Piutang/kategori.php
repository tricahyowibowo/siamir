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
                    <form class="form-horizontal" action="<?=base_url('piutang/tambahdata')?>" role="form" method="post">
                      <div class="box-body">


                        <div class="form-group">
                          <label for="kategori" class="col-sm-4 control-label">Kategori :</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="kategori">
                              <?php 
                              $id = "5";
                              foreach ($list_kategori as $lk) {
                              if ($id === $lk->id_kategori) {?>
                              <option <?= $id === $lk->id_kategori ? "selected ": ""?> value="<?=$id?>"> <?=$lk->nama_kategori?></option>
                              <?php } }  ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_transaksi" class="col-sm-4 control-label" >Tanggal :</label>
                              <div class="col-sm-3">
                              <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control" placeholder="Klik Disini">
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


<!-- public function tambahdata()
    {
        $this->global['pageTitle'] = 'Tambah Transaksi';

        $id = $this->input->post('kategori');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $rekening = $this->input->post('rek_id');


        $kategori = $this->transaksi_model->cekkategori($id);
        $rekening = $this->transaksi_model->cekrekening($rekening);
        $tanggal = strftime('%m', strtotime($tgl_transaksi));
        $tanggal = substr($tanggal, 1, 1);
        // $tanggal = $this->transaksi_model->cektanggal();
        var_dump($tanggal);
        $cektanggal = $this->transaksi_model->cekkodebytanggal($tanggal);
        $dariDB = $this->transaksi_model->cekkodetransaksi($id);
        // var_dump($dariDB);
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kode_transaksi = $nourut + 1;

        $data = array(
            'kategori'       => $kategori,
            'tgl_transaksi'       => $tgl_transaksi,
            'rekening'       => $rekening,
            'tanggal'       => $tanggal,
            'kode_transaksi' => $kode_transaksi,
            );

        $this->loadViews("transaksi/tambah_transaksi", $this->global, $data , NULL);
    } -->