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

    <a href="<?= base_url('datalaporan/'.$page.'/'.$filter); ?>"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>

  </section>

  <!-- Main content -->
  <section class="content" style="margin-top: 20px;">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3>Filter Laporan</h3>
          </div>
          <div class="box-body">
          <form role="form" method="post">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Tanggal Awal</label>
                      <?php if(is_null($tgl_awal)) {?>
                        <input type="date" class="form-control" name="tgl_awal" required>
                      <?php }else { ?>
                        <input type="date" class="form-control" name="tgl_awal" value="<?php echo $tgl_awal ?>" required>
                      <?php } ?>

                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputPassword1">Tanggal Akhir</label>
                      <?php if(is_null($tgl_akhir)) {?>
                      <input type="date" class="form-control" name="tgl_akhir" required>
                      <?php }else { ?>
                        <input type="date" class="form-control" name="tgl_akhir" value="<?php echo $tgl_akhir ?>" required>
                      <?php } ?>
                    </div>                 
                  </div>
                </div>
              </div>
            </div>
              <div class="box-footer">
                <a href="<?= base_url('data/'.$page.'/'.$filter)?>" class="btn btn-warning pull-left">Reset</a>
                <button type="submit" class="btn btn-primary pull-right">Filter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">      
        <!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i> Tabel Laporan <?php echo $page ?> periode <?php echo $periode ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <!-- Tabel -->
            
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th colspan="4" >Periode : <?php echo $periode ?></th>
                  </tr>
                  <tr>
                    <th style="width:10px;">No</th>
                    <th>kode</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th style="width:400px;">Akun - Keterangan</th>
                    <th>Nominal (Rp)</th>
                    <!-- <th>Kredit (Rp)</th> -->
                    <th>Saldo</th>

                  </tr>
                  
                </thead>
                <tbody>
                
                  <?php if(is_array($list_data)){ ?>
                  <?php $no = 1;
                  $debet = 0; 
                  $kredit = 0; 
                  $saldo = 0;
                  ?>
                  
                  <?php foreach($list_datafilter as $dd){?>
                    <?php 
                    $kode_transaksi = $dd->kode_transaksi;
                    $no_transaksi = $dd->no_transaksi;
                    $rinci_data = $this->transaksi_model->GetTransaksiByKode($kode_transaksi, $no_transaksi, $akun, $tgl_awal, $tgl_akhir); 

                    foreach ($rinci_data as $rd) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><a style="color:black" target="_blank" href="<?=base_url('transaksi/cetak/'.$rd->kode_transaksi.$rd->no_transaksi)?>"><?= $rd->kode_transaksi.$rd->no_transaksi?></a></td>
                      <td><?=$rd->tgl_transaksi?></td>
                      <td><?=$rd->nama_kategori?></td>
                      <td><?=$rd->id_akun." - ".$rd->nama_akun?> <?=$rd->keterangan?></td>
                      <td class="text-center">
                        <?php 
                        if($rd->jenis_transaksi == "Debet"){
                          echo "Rp. ".number_format($rd->debet,2,",",".");
                          $saldo-=$rd->debet;
                          // $debet+=$rd->nominal_transaksi;
                        }else{
                          echo "Rp. ".number_format($rd->kredit,2,",",".");
                          $saldo+=$rd->kredit;
                          // $debet+=$rd->nominal_transaksi;
                        }
                        ?>
                      </td>
                      <th><?php echo "Rp. ".number_format($saldo,2,",",".") ?></th>
                    </tr>
                    <?php
                    }
                    ?>
                  <?php }?>
              <?php }else { ?>
                    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
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