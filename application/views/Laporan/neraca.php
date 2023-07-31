  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Neraca <?php echo $page ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active"><a href="<?=base_url('Datapiutang')?>"></a>Laporan Neraca</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
                  <a href="<?= base_url('neraca/'.$page.'/'.$filter)?>" class="btn btn-warning pull-left">Reset</a>
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
              <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i> Data Neraca <?php echo $page ?></h3>
              <a href="<?=site_url('transaksi/neracaexcel/'.$page.'/'.$filter.'/'.$tgl_awal.'/'.$tgl_akhir)?>" type="button" class="btn btn-success pull-right"><i class="fa fa-download"></i> <span> Export Excel</span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- Tabel -->
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Akun</th>
                      <th style="width:400px;">Nama_akun</th>
                      <th>Debit (Rp)</th>
                      <th>Kredit (Rp)</th>
                      <th>Saldo</th>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-right">Saldo Awal : </th>
                        <th><?php 
                        foreach($saldoawal as $sa){
                        $totalsaldoawal = $sa->debet-$sa->kredit;
                        echo "Rp. ".number_format( $totalsaldoawal,2,",",".")?></th>
                        <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php if(is_array($list_data)){ ?>
                      <?php 
                        $no = 1;
                        $totdebet=0;
                        $totkredit=0;
                        $totalsaldo= $totalsaldoawal;
                        foreach($list_data as $dd): ?>
                        <td><?=$no++?></td>
                        <td><?=$dd->id_akun?></td>
                        <td><?=$dd->nama_akun?></td> 
                        <td class="text-left">
                          <?php 
                              echo "Rp. ".number_format($dd->kredit,2,",",".")." ,-";
                              $totalsaldo+=$dd->kredit;
                              $totdebet+=$dd->kredit;
                          ?>
                          
                        </td>
                        <td class="text-left" >
                          <?php 
                            echo "Rp. ".number_format($dd->debet,2,",",".");
                            $totalsaldo-=$dd->debet;
                            $totkredit+=$dd->debet;
                          ?>
                        </td>
                        <th>
                          <?php 
                          echo "Rp. ".number_format($totalsaldo,2,",","."); 
                          // $totalsaldo+=$saldo;
                          ?>
                        </th>
                    </tr>
                      <?php endforeach;?>
                      <?php }else { ?>
                            <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                      <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th colspan="2"></th>
                    <th class="text-right">
                      Total Neraca
                    </th>
                    <th class="text-center">
                    <?php
                      echo "Rp. ".number_format($totkredit,2,",",".");
                      ?>
                    </th>
                    <th class="text-center">
                    <?php
                      echo "Rp. ".number_format($totdebet,2,",",".");
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

<!-- <script>
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

</script> -->
