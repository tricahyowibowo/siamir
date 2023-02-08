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

          <!-- /.box -->
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Pesan -->
              <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:100%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
               </div>
              <?php } ?>

              <?php if($this->session->flashdata('msg_berhasil_keluar')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:100%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil_keluar');?>
               </div>
              <?php } ?>
            <!-- /Pesan -->

            <!-- Tabel -->
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th colspan="2" style="text-align:left;">Neraca tahun lalu (<?php echo $tahun ?>)</th>
                  </tr>
                  <tr>
                    <th width="10">Akun</th>
                    <th width="120">Nama_akun</th>
                    <th width="120">Debet (Rp)</th>
                    <th width="120">Kredit (Rp)</th>
                    <th width="120">Saldo</th>
                    <!-- <th>Saldo</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php if(is_array($neraca_sebelum)){ ?>
                    <?php foreach($neraca_sebelum as $dd): ?>
                      <td><?=$dd->id_akun?></td>
                      <td><?=$dd->nama_akun?></td> 
                      <td><?php echo "Rp. ".number_format($debet = $dd->debet,0)." ,-";?></td>
                      <td><?php echo "Rp. ".number_format($kredit = $dd->kredit,0)." ,-";?></td>
                      <?php $saldo = $debet-$kredit ?>
                      <th><?php echo "Rp. ".number_format($saldo,0)." ,-"; ?></th>
                  </tr>
                <?php endforeach;?>
                <?php }else { ?>
                      <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                <?php } ?>
                  </tbody>
                </table>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th colspan="2" style="text-align:left;">Neraca tahun Ini (<?php echo $tahun+1 ?>)</th>
                  </tr>
                  <tr>
                    <th width="10">Akun</th>
                    <th width="120">Nama_akun</th>
                    <th width="120">Debit (Rp)</th>
                    <th width="120">Kredit (Rp)</th>
                    <th width="120">Saldo</th>
                    <!-- <th>Saldo</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php if(is_array($list_data)){ ?>
                    <?php foreach($list_data as $dd): ?>
                      <td><?=$dd->id_akun?></td>
                      <td><?=$dd->nama_akun?></td> 
                      <td><?php echo "Rp. ".number_format($debet = $dd->debet,0)." ,-";?></td>
                      <td><?php echo "Rp. ".number_format($kredit = $dd->kredit,0)." ,-";?></td>
                      <?php $saldo = $debet-$kredit ?>
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
