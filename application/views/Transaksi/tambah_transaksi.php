
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
  <!-- /Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="container">
        <!-- form start -->
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <form class="form-horizontal" action="<?=base_url('transaksi/simpan/'.$id_sumber.'/'.$id_kategori)?>" role="form" method="post">
                <!-- box-header -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data Transaksi</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- PESAN -->
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
                  </div>

                  <!-- /PESAN -->
                  <div class="box-body">
                    <div class="form-group">      
                      <label for="kode_transaksi" class="col-sm-4 control-label">Kode Transaksi :</label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" readonly="readonly" value="<?=$kode_kategori.$kode_sumber.strftime('%m%y', strtotime($tgl_transaksi))?><?php echo sprintf("%03s", $no_transaksi) ?>">
                        <input type="hidden" name="jenis_kategori" id="jenis_kategori" class="form-control" readonly="readonly" value="<?=$jenis_kategori?>">
                        <input type="hidden" name="kode_transaksi" id="kode_transaksi" class="form-control" readonly="readonly" value="<?=$kode_kategori.$kode_sumber?>">
                        <input type="hidden" name="no_transaksi" id="no_transaksi" class="form-control" readonly="readonly" value="<?=strftime('%m%y', strtotime($tgl_transaksi))?><?php echo sprintf("%03s", $no_transaksi)?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tgl_transaksi" class="col-sm-4 control-label" >Tanggal :</label>
                      <div class="col-sm-3">
                        <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" readonly="readonly" value="<?= $tgl_transaksi ?>">
                      </div>
                    </div>

                    
                    <!-- <?php 
                    if ($id != 8) {
                      
                    }else{?>
                    <div class="form-group">
                      <label for="akun" class="col-sm-4 control-label">Nama Karyawan :</label>
                      <div class="col-sm-3">
                        <select class="form-control theSelect" name="keterangan" id="keterangan">
                          <option value="">- Pilih Karyawan -</option>
                          <?php foreach($list_karyawan as $lk){ ?>
                          <option value="<?=$lk->nama_karyawan?>"> <?=$lk->nama_karyawan?></option>
                          <?php } ?>
                        </select>  
                      </div>
                    </div>
                    <?php } ?> -->


                    <!-- Buat tombol untuk menabah form data -->
                    <!-- <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button> -->
                    <!-- <button type="button" class="btn btn-warning" id="btn-reset-form">Reset Form</button><br><br> -->

                    <div class="form-group">
                      <label for="akun" class="col-sm-4 control-label">Akun Transaksi :</label>
                      <div class="col-sm-3">
                        <select class="form-control theSelect" type="submit" name="akun" id="akun" method = "get">
                          <option value="">- Pilih Akun -</option>
                          <?php foreach($list_akun as $la){ ?>
                          <option value="<?=$la->id_akun?>"> <?=$la->id_akun?> - <?=$a = $la->nama_akun?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button>
                      </div>
                    </div>

                    <div id="insert-form"></div>

                    <div id="insert-tabel">
                      <table id="table1" name="table1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Kode Transaksi</th>
                            <th class="width:120px;">Tanggal</th>
                            <th>Akun Transaksi</th>
                            <th>Jenis Transaksi</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                          <tr>
                        </thead>
                        <tbody id="body">
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <a type="button" class="btn btn-default" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                      <input type="submit" value="Simpan" class="btn pull-right btn btn-success"></input>
                  </div>
                  <!-- /.box-footer -->

                  <!-- Kita buat textbox untuk menampung jumlah data form -->
                  <input type="hidden" id="jumlah-form" value="0">
                </div>
                <!-- /.box -->
              </form>
            </div>
          </div>
        </div>
        <!-- form end -->
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
<!-- /.content-wrapper -->
<script>
  $(".theSelect").select2();
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

<script>
  $(document).ready(function() { // Ketika halaman sudah diload dan siap

    $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      var kode_transaksi = $("#kode_transaksi").val();
      var jenis_kategori = $("#jenis_kategori").val();
      var no_transaksi = $("#no_transaksi").val();
      var tgl_transaksi = $("#tgl_transaksi").val();
      var akun = $("#akun").val();

      $akun = akun;
      $jenis_kategori = jenis_kategori;

      if ($akun != 11202){
        $("#table1").append(
        '<tr>' +
        '<td><input type="hidden" name="kode_transaksi[]" value=' + kode_transaksi + '> ' + kode_transaksi + no_transaksi + ' </td>' +
        '<input type="hidden" name="no_transaksi[]" value=' + no_transaksi + ' >' +
        '<td><input type="hidden" name="tgl_transaksi[]" value=' + tgl_transaksi + '> ' + tgl_transaksi + ' </td>' +  
        '<td><input type="hidden" class="form-control" name="akun[]"value=' + akun + '>' + akun+'</td>' +
        '<td><select name="jenis_transaksi[]">' +
        '<option <?= $jenis_kategori === "Debet" ? "selected": ""?> value="<?= $jenis_kategori === "Debet" ? "Kredit": "Debet"?>"> <?= $jenis_kategori === "Debet" ? "Kredit": "Debet"?> </option>'+
        '<option value="<?= $jenis_kategori != "Debet" ? "Kredit": "Debet"?>"><?= $jenis_kategori != "Debet" ? "Kredit": "Debet"?></option>'+
        '</select></td>'+
        '<td><input type="text" class="form-control" placeholder="Masukkan Nominal (ex. 1000)" name="nominal_transaksi[]"</td>' +
        '<td><input type="text" class="form-control" name="keterangan[]" placeholder="Masukkan Keterangan (ex. ATK)" </input></td>' +
        "<td><a href='javascript:void(0);' class='remCF btn btn-danger'>Remove</a></td>" +
        "</tr>" +
        "<br><br>");
      }else{
        $("#table1").append(
        '<tr>' +
        '<td><input type="hidden" name="kode_transaksi[]" value=' + kode_transaksi + '> ' + kode_transaksi + no_transaksi + ' </td>' +
        '<input type="hidden" name="no_transaksi[]" value=' + no_transaksi + ' >' +
        '<td><input type="hidden" name="tgl_transaksi[]" value=' + tgl_transaksi + '> ' + tgl_transaksi + ' </td>' +  
        '<td><input type="hidden" class="form-control" name="akun[]"value=' + akun + '>' + akun +'</td>' +
        '<td><select class="form-control" name="jenis_transaksi[]">' +
        '<option value="Debet">Debit</option>'+
        '<option value="Kredit">Kredit</option>'+
        '</select></td>'+
        '<td><input type="text" class="form-control" placeholder="Masukkan Nominal (ex 1000)" name="nominal_transaksi[]"</td>' +
        '<td><select class="form-control" name="keterangan[]">' +
        '<option value="">- Pilih Karyawan -</option>'+
        '<?php foreach($list_karyawan as $lk){ ?>'+ 
        '<option value="<?=$lk->nama_karyawan?>"> <?=$lk->nama_karyawan?></option>'+
        '<?php } ?>'+
        '</select></td>'+
        "<td><a href='javascript:void(0);' class='remCF btn btn-danger'>Remove</a></td>" +
        "</tr>" +
        "<br><br>");
      }

      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    $("#table1").on('click', '.remCF', function() {
      $(this).parent().parent().remove();
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function() {
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });

    $("input")
      .keyup(function() {
        var value = $(this).val();
        $("#").text(value);
      })
      .keyup();
  });
</script>
  
<script>
  jQuery(document).ready(function($){
  $('.btn-add').on('click',function(){
      var getLink = $(this).attr('href');
      swal({
            title: 'Konfirmasi Data',
            text: 'Periksa kembali data yang anda masukkan <br> <b>Apakah Data Sudah Benar ?</b>',
            html: true,
            confirmButtonColor: '#00A65A',
            confirmButtonText: 'Sudah Benar',
            showCancelButton: true,
            cancelButtonText: 'Periksa',
            },function(){
            window.location.href = getLink
          });
      return false;
      });
  });
</script>