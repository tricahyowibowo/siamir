<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Tables</li>
      <li class="active"><a href="<?=base_url('Datatransaksi')?>">Tabel Laporan Transaksi</a></li>
    </ol>

    <a href="<?= base_url('datalaporan/'); ?>"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>

  </section>

  <!-- Main content -->
  <section class="content" style="margin-top: 20px;">
    <div class="row">
      <div class="col-xs-12">      
        <!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i> Tabel Data Transaksi</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <!-- Tabel -->
            
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width:10px;">No</th>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                  </tr>
                  
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($list_data as $dd){?>
                    <tr>
                      <td><?=$no++ ?></td>
                      <td><?=$dd->tgl_transaksi?></td>
                      <td><?=$dd->kode_transaksi?><?=$dd->no_transaksi?></td>
                      <td><?=$dd->nama_kategori?></td>
                    </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
          <!-- /Tabel -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  
<script>
$(document).ready(function() {
    var table = $('#example1').DataTable( {
        lengthChange: false,
        ordering: false,
        paging   : true,
        info   : true,
        responsive: true,
    } );
} );
</script>

<script>
		$(".theSelect").select2();
</script>