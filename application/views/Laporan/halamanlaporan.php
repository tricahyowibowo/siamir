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

        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Data</h3>

              <p>Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?= base_url('data/'.$page.'/'.$filter); ?>" class="small-box-footer" style="font-size:18px">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data</h3>

              <p>Jurnal</p>
            </div>
            <div class="icon">
                <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?= base_url('jurnal/'.$page.'/'.$filter); ?>" class="small-box-footer" style="font-size:18px">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Data</h3>

              <p>Buku Besar</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?= base_url('bukubesar/'.$page.'/'.$filter); ?>" class="small-box-footer" style="font-size:18px">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Data</h3>

              <p>Neraca</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?= base_url('neraca/'.$page.'/'.$filter); ?>" class="small-box-footer" style="font-size:18px">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->        
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>