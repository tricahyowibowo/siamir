<?php
    $this->db->select('a.nama_kategori, a.id_kategori, SUM(case when b.jenis_transaksi="Debet" then b.nominal_transaksi end) as debet, SUM(case when b.jenis_transaksi="kredit" then b.nominal_transaksi end) as kredit,');
    $this->db->from('tbl_kategori a');
    $this->db->join('tbl_transaksi b', 'b.kategori_id = a.id_kategori');
    $this->db->where('a.id_kategori != 0');
    $this->db->group_by('a.id_kategori');
    $query = $this->db->get();
    $datachart = $query->result();

    foreach ($datachart as $data) {
        $arr[] = ['label' => $data->nama_kategori, 'y' => $data->debet];
        $arr2[] = ['label' => $data->nama_kategori, 'y' => $data->kredit];
    }
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-top: 20px;">
      <h1>
        Hai <b><?php echo $name; ?></b> Selamat Datang, Apa kabar hari ini? :)
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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-paper"></i></span>
            <div class="info-box-content">
              <a href="<?= base_url('transaksi/datatransaksi/'.$data->id_kategori)?>" style="color:black;"><span class="info-box-text"><?php echo $data->nama_kategori?></span></a>
              <span class="info-box-number"><?php echo "Rp. ".number_format($data->debet)." ,-"; ?><small></small></span>
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
      <div class="container">
        <div id="chartContainer" style="height: 370px; width: 100%; margin-top: 5%;"></div>
      </div>
      <!-- CHART -->
    </section>
</div>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	axisY: {
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Debit",
		legendText: "Debit",
		showInLegend: true, 
		dataPoints:
        <?= json_encode($arr, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "column",	
		name: "Kredit",
		legendText: "Kredit",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:
    <?= json_encode($arr2, JSON_NUMERIC_CHECK); ?>
	}    
    ]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script> 