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
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Akun</label>
                      <select class="form-control theSelect" name="akun" id="akun">
                        <option value="">- Pilih Akun -</option>
                        <?php foreach($list_akun as $la){ ?>
                        <option <?= $akun === $la->id_akun ? "selected ": ""?> value="<?=$la->id_akun?>"> <?=$la->id_akun?> - <?=$la->nama_akun?></option>

                        <?php } ?>
                      </select>   
                    </div>
                  </div>
                  <div class="col-md-8">
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
                  <a href="<?= base_url('data/'.$page)?>" class="btn btn-warning pull-left">Reset</a>
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
                  <tr>
                    <!-- <?php if(is_array($list_data)){ ?> -->
                    <?php $no = 1;
                    $debet = 0; 
                    $kredit = 0; 
                    $saldo = 0;
                    ?>
                    
                    <?php foreach($list_data as $dd): ?>
                      <td><?=$no++?></td>
                      <td><a style="color:black" href="<?=base_url('transaksi/cetak/'.$dd->kode_transaksi.$dd->no_transaksi)?>"><?= $dd->kode_transaksi.$dd->no_transaksi?></a></td>
                      <td><?=strftime('%d %b %Y', strtotime($dd->tgl_transaksi))?></td>
                      <td><?=$dd->nama_kategori?></td>
                      <td><?=$dd->id_akun." - ".$dd->nama_akun?> <?=$dd->keterangan?></td>
                      <td class="text-center">
                          <?php 
                          if($dd->jenis_transaksi == "Debet"){
                            echo "Rp. ".number_format($dd->debet)." ,-";
                            $saldo-=$dd->debet;
                            // $debet+=$dd->nominal_transaksi;
                          }else{
                            echo "Rp. ".number_format($dd->kredit)." ,-";
                            $saldo+=$dd->kredit;
                            // $debet+=$dd->nominal_transaksi;
                          }
                          ?>
                        </td>
                        <th><?php echo "Rp. ".number_format($saldo,0)." ,-"; ?></th>
                                       </tr>
                <?php endforeach;?>
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