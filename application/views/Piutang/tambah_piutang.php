<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
  
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
          <!-- form start -->
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal" action="<?=base_url('piutang/simpan')?>" role="form" method="post">
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
                          <?php foreach($kategori as $k){ ?>
                          <input type="text" class="form-control" readonly="readonly" value="<?=$k->kode_kategori.strftime('%m%y', strtotime($tgl_transaksi))?><?php echo sprintf("%03s", $no_transaksi) ?>">
                          <input type="hidden" name="kode_transaksi" id="kode_transaksi" class="form-control" readonly="readonly" value="<?=$k->kode_kategori?>">
                          <input type="hidden" name="no_transaksi" id="no_transaksi" class="form-control" readonly="readonly" value="<?=strftime('%m%y', strtotime($tgl_transaksi))?><?php echo sprintf("%03s", $no_transaksi) ?>">
                          <input type="hidden" name="kategori_id" id="kategori_id" class="form-control" value="<?=$k->id_kategori?>">
                          <input type="hidden" name="jenis_transaksi" id="jenis_transaksi" class="form-control" value=" <?=$k->normal_balance?>">
                          <?php } ?>  

                        </div>
                      </div>
                      <div class="form-group">
                          <label for="tgl_transaksi" class="col-sm-4 control-label" >Tanggal :</label>
                            <div class="col-sm-3">
                            <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" readonly="readonly" value="<?= $tgl_transaksi ?>">
                            </div>
                      </div>

                      <div class="form-group">
                        <label for="akun" class="col-sm-4 control-label">Atas Nama :</label>
                        <div class="col-sm-3">
                          <select class="form-control theSelect" name="karyawan" id="karyawan">
                            <option value="">- Pilih Karyawan -</option>
                            <?php foreach($list_karyawan as $lk){ ?>
                            <option value="<?=$lk->nama_karyawan?>"> <?=$lk->nama_karyawan?></option>
                            <?php } ?>
                          </select>  
                        </div>
                      </div>

                      <!-- Buat tombol untuk menabah form data -->
                      <!-- <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button> -->
                      <!-- <button type="button" class="btn btn-warning" id="btn-reset-form">Reset Form</button><br><br> -->

                      <div class="form-group">
                        <label for="akun" class="col-sm-4 control-label">Akun Transaksi :</label>
                        <div class="col-sm-3">
                          <select class="form-control theSelect" type="submit" name="akun" id="akun" method = "get">
                            <option value="">- Pilih Akun -</option>
                            <?php foreach($list_akun as $la){ ?>
                            <option value="<?=$la->id_akun?>"> <?=$la->id_akun?> - <?=$la->nama_akun?></option>
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
				var no_transaksi = $("#no_transaksi").val();
				var kategori_id = $("#kategori_id").val();
				var tgl_transaksi = $("#tgl_transaksi").val();
				var akun = $("#akun").val();
				// var nama_akun = $("#nama_akun").val();
				// var keterangan = $("#keterangan").val();
				var jenis_transaksi = $("#jenis_transaksi").val();
				var rek_id = $("#rek_id").val();

        $akun = akun;


        if ($akun != 11202){
          $("#table1").append(
					'<tr>' +
					'<td><input type="hidden" name="kode_transaksi[]" value=' + kode_transaksi + '> ' + kode_transaksi + no_transaksi + ' </td>' +
					'<input type="hidden" name="no_transaksi[]" value=' + no_transaksi + ' >' +
					'<input type="hidden" name="kategori_id[]" value=' + kategori_id + ' >' +
          '<input type="hidden" name="jenis_transaksi[]" value=' + jenis_transaksi + '> '+
					'<input type="hidden" name="rek_id[]" value=' + rek_id + '>' +
          
					'<td><input type="hidden" name="tgl_transaksi[]" value=' + tgl_transaksi + '> ' + tgl_transaksi + ' </td>' +  
					'<td><input type="hidden" class="form-control" name="akun[]"value=' + akun + '>' + akun+'</td>' +
 
					'<td><input type="text" class="form-control" placeholder="Masukkan Nominal (ex 1000)" name="nominal_transaksi[]"</td>' +
          '<td><input type="text" class="form-control" name="keterangan[]" placeholder="Masukkan Keterangan" </input></td>' +
					"<td><a href='javascript:void(0);' class='remCF btn btn-danger'>Remove</a></td>" +
					"</tr>" +
					"<br><br>");
        }else{
          $("#table1").append(
					'<tr>' +
					'<td><input type="hidden" name="kode_transaksi[]" value=' + kode_transaksi + '> ' + kode_transaksi + no_transaksi + ' </td>' +
					'<input type="hidden" name="no_transaksi[]" value=' + no_transaksi + ' >' +
					'<input type="hidden" name="kategori_id[]" value=' + kategori_id + ' >' +
          '<input type="hidden" name="jenis_transaksi[]" value=' + jenis_transaksi + '> '+
					'<input type="hidden" name="rek_id[]" value=' + rek_id + '>' +
          
					'<td><input type="hidden" name="tgl_transaksi[]" value=' + tgl_transaksi + '> ' + tgl_transaksi + ' </td>' +  
					'<td><input type="hidden" class="form-control" name="akun[]"value=' + akun + '>' + akun +'</td>' +
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