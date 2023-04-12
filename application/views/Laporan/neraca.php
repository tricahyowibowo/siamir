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
                    <th colspan="2" style="text-align:left;">Neraca <?php echo $page ?></th>
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
                    <?php 
                      $totdebet=0;
                      $totkredit=0;
                      $totalsaldo=0;
                      foreach($list_data as $dd): ?>
                      <td><?=$dd->id_akun?></td>
                      <td><?=$dd->nama_akun?></td> 
                      <td class="text-center">
                        <?php 
                          if($dd->jenis_transaksi == "Kredit"){
                            echo "Rp. ".number_format($dd->kredit,2,",",".")." ,-";
                            $totalsaldo+=$dd->kredit;
                            $totdebet+=$dd->kredit;
                          }else{
                            echo "-";
                          }
                        ?>
                        
                      </td>
                      <td class="text-center" >
                        <?php 
                        if($dd->jenis_transaksi == "Debet"){
                          echo "Rp. ".number_format($dd->debet,2,",",".");
                          $totalsaldo-=$dd->debet;
                          $totkredit+=$dd->debet;
                        }else{
                          echo "-";
                        }
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
                    <th colspan="3"></th>
                    <th class="text-right">
                      Total Neraca
                    </th>
                    <th class="text-left">
                    <?php
                      echo "Rp. ".number_format($totalsaldo,2,",",".");
                      ?>
                    </th>
                  </tr>
                  <tr>
                    <th colspan="3"></th>
                    <th class="text-right">
                      Saldo Awal
                    </th>
                    <th class="text-left">
                    <?php
                      echo "Rp. ".number_format($saldoawal,2,",",".");
                      ?>
                    </th>
                  </tr>
                  <tr>
                    <th colspan="3"></th>
                    <th class="text-right">
                      Saldo Akhir
                    </th>
                    <th class="text-left">
                    <?php
                      echo "Rp. ".number_format($saldoawal-$totalsaldo,2,",",".");
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
