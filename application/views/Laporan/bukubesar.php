  <style>
input[type="month"]::before{
  content: attr(placeholder) !important;
  color: #aaa;
  width: 100%;
}

input[type="month"]:focus::before,
input[type="month"]:active::before {
  content: "";
  width: 0%;
}
  </style>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active"><a href="#">Tabel Buku besar <?php echo $page ?></a></li>
      </ol>
      <a href="<?= base_url('datalaporan/'.$page.'/'.$filter); ?>"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>

    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 20px;">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3>Filter Buku besar <?php echo $page ?></h3>
            </div>
            <div class="box-body">
            <form role="form" method="post">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-md-6">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <?php if(is_null($tgl_awal)) {?>
                          <input type="date" class="form-control" name="tgl_awal" placeholder="MM/DD/YYYY">
                        <?php }else { ?>
                          <input type="date" class="form-control" name="tgl_awal" value="<?php echo $tgl_awal ?>" required>
                        <?php } ?>

                      </div>
                      <div class="col-md-6">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <?php if(is_null($tgl_akhir)) {?>
                        <input type="date" class="form-control" name="tgl_akhir" placeholder="bulan" required>
                        <?php }else { ?>
                          <input type="date" class="form-control" name="tgl_akhir" value="<?php echo $tgl_akhir ?>" required>
                        <?php } ?>
                      </div>                 
                    </div>
                  </div>
                </div>
              </div>
                <div class="box-footer">
                  <a href="<?= base_url('bukubesar/'.$page.'/'.$filter)?>" class="btn btn-warning pull-left">Reset</a>
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
              <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i> Data Buku besar <?php echo $page ?> periode <?php echo $periode ?></h3>
              <a href="<?=site_url('transaksi/bukubesarexcel/'.$page.'/'.$filter.'/'.$tgl_awal.'/'.$tgl_akhir)?>" type="button" class="btn btn-success pull-right"><i class="fa fa-download"></i> <span> Export Excel</span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- Tabel -->
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th colspan="4" >Periode : <?php echo $periode ?></th>
                      <th colspan="2" class="text-right">Saldo Awal</th>
                      <th><?php echo "Rp. ".number_format( $saldoawal,2,",",".")?></th>
                  </tr>
                  <tr>
                    <th>No</th>
                    <th>kode</th>
                    <th>Tanggal</th>
                    <th style="width:400px;">Akun - Keterangan</th>
                    <th>Debit (Rp)</th>
                    <th>Kredit (Rp)</th>
                    <th>Saldo</th>
                  </tr>
                  
                  </thead>

                  <tbody>
                  <?php if(is_array($list_data)){ ?>
                    <?php $no = 1;
                    $debet = 0; 
                    $kredit = 0; 
                    // $saldo = 1000;
                  ?>
                  <!-- <tr>
                    <td align="right" colspan="6">Saldo Awal</td>
                    <td><?=$saldo?></td>
                  </tr> -->
  
                  <tr>
                    <?php foreach($list_datafilter as $dd): ?>
                      <?php 
                      $kode_transaksi = $dd->kode_transaksi;
                      $no_transaksi = $dd->no_transaksi;

                      $rinci_data = $this->transaksi_model->GetTransaksiByKode($kode_transaksi, $no_transaksi, $filter, $tgl_awal, $tgl_akhir); 

                      foreach ($rinci_data as $rd) { ?>
                      <td><?=$no++?></td>
                      <td><?= $rd->kode_transaksi.$rd->no_transaksi?></td>
                      <td><?=mediumdate_indo($rd->tgl_transaksi)?></td>
                      <td><?=$rd->id_akun." - ".$rd->nama_akun?> <?=$rd->keterangan?></td>
                      <td class="text-center">
                          <?php 
                          if($rd->jenis_transaksi == "Kredit"){
                            echo "Rp. ".number_format($rd->kredit,2,",",".")." ,-";
                            $saldoawal+=$rd->kredit;
                            $debet+=$rd->kredit;
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          if($rd->jenis_transaksi == "Debet"){
                            echo "Rp. ".number_format($rd->debet,2,",",".");
                            $saldoawal-=$rd->debet;
                            $kredit+=$rd->debet;
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                        <th><?php echo "Rp. ".number_format($saldoawal,2,",","."); ?></th> 
                        <?php }?>

                    </tr>
                <?php endforeach;?>
                <?php }else { ?>
                      <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th colspan="4"></th>
                    <th class="text-center">
                      <?php
                      echo "Rp. ".number_format($debet,2,",",".");
                      ?>
                    </th>
                    <th class="text-center">
                    <?php
                      echo "Rp. ".number_format($kredit,2,",",".");
                      ?>
                    </th>
                  </tr>
                  </tfoot>
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
        lengthChange: true,
         paging   : true,
         info   : true,
         responsive: true,
         ordering: false,
    } );
    
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );

$(document).ready(function () {
    $('#example').DataTable({
        columnDefs: [
            {
                visible: false,
                targets: -1,
            },
        ],
    });
});

</script>