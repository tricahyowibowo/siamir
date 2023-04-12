<?php
    $this->db->select('a.nama_kategori, a.id_kategori, MONTH(tgl_transaksi) as tgl_transaksi, SUM(case when b.jenis_transaksi="Debet" then b.nominal_transaksi end) as debet, SUM(case when b.jenis_transaksi="kredit" then b.nominal_transaksi end) as kredit,');
    $this->db->from('tbl_kategori a');
    $this->db->join('tbl_transaksi b', 'b.kategori_id = a.id_kategori');
    $this->db->where('a.id_kategori != 0');
    $this->db->group_by('a.id_kategori');
    $query = $this->db->get();
    $datachart = $query->result();

    foreach ($datachart as $data) {
        $arr3[] = [$data->debet];
        $arr4[] = [$data->nama_kategori];
        $arr5[] = [$data->tgl_transaksi];
    }
?>

<div class="content-wrapper">
  
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-top: 20px;">
      <h1>
        Hai <b><?php echo $name; ?></b> Selamat Datang, Apa kabar hari ini?
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>    
    <section class="content">
      <!-- Info boxes -->
      <div class="row" style="padding-top: 20px;">
        <?php foreach ($datachart as $data) : ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-paper"></i></span>
            <div class="info-box-content">
              <a href="<?= base_url('transaksi/datatransaksi/'.$data->id_kategori)?>" style="color:black;"><span class="info-box-text"><?php echo $data->nama_kategori?></span></a>
              <span class="info-box-number"><?php echo "Rp. ".number_format($data->debet,2,",","."); ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php endforeach;?>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- CHART -->
      <div class="row">
        <div class="col-md-6">
          <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-6">
        </div>
      </div>
      <!-- CHART -->


    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/utils.js" charset="utf-8"></script>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?= json_encode($arr4, JSON_NUMERIC_CHECK); ?>,
    datasets: [{
    data: <?= json_encode($arr3, JSON_NUMERIC_CHECK); ?>,
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>