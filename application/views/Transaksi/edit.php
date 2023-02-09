  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Data Transaksi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Tables</li>
        <li class="active"><a href="<?=base_url('Datatransaksi')?>">Tabel Data Transaksi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i> Data Transaksi</h3>
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
                    <th style="width: 20px;">No</th>
                    <th>kode</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Akun</th>
                    <th style="width: 250px;">Keterangan</th>
                    <th>Normal Balance</th>
                    <th>Debit (Rp)</th>
                    <th>Kredit (Rp)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php if(is_array($list_data)){ ?>
                    <?php $no = 1;
                    ?>
                    
                    <?php foreach($list_data as $dd): ?>
                    <form action="<?=base_url('transaksi/updatedata/')?>" role="form" method="post">
                      <td><?=$no++?>
                      <input style="width:110px" type="hidden" name="id_transaksi[]" value="<?=$dd->id_transaksi?>"></input>
                      </td>
                      <td><?=$dd->kode_transaksi." "?><input style="width:70px" type="text" name="no_transaksi[]" value="<?=$dd->no_transaksi?>"></input></td>
                      <td><input style="width:110px" type="date" name="tgl_transaksi[]" value="<?=$dd->tgl_transaksi?>"></input></td>
                      <td><?=$dd->nama_kategori?></td>
                      <!-- <td><?=$dd->id_akun?></td> -->
                      <td>
                      <select class="form-control theSelect" style="width:200px" type="submit" name="akun[]" id="akun[]" method = "get">
                        <?php foreach($list_akun as $la){ ?>
                        <option <?= $dd->id_akun === $la->id_akun ? "selected": ""?>  value="<?=$la->id_akun?>"> <?=$la->id_akun?> - <?=$a = $la->nama_akun?></option>
                        <?php } ?>
                      </select>
                      </td>
                      <td><?=$dd->nama_akun." ".$dd->keterangan?></td>
                      <td>
                        <select class="form-control theSelect" name="jenis_transaksi[]" id="jenis_transaksi[]">
                          <option <?= $dd->jenis_transaksi === "Debet" ? "selected": ""?> value="<?= $dd->jenis_transaksi ?>"> <?= $dd->jenis_transaksi?></option>
                          <option value="<?= $dd->jenis_transaksi != "Debet" ? "Debet": "Kredit"?>"><?= $dd->jenis_transaksi != "Debet" ? "Debet": "Kredit"?></option>
                        </select></td>
                      <td class="text-center">
                        <?php 
                        if($dd->jenis_transaksi == "Debet"){?>
                          <input style="width:80px" type="text" name="nominal_transaksi[]" value="<?=$dd->debet?>"></input>
                        <?php }else{
                          echo " - ";
                        } ?>
                      </td>
                      <td class="text-center">
                        <?php 
                        if($dd->jenis_transaksi == "Kredit"){?>
                          <input style="width:80px" type="text" name="nominal_transaksi[]" value="<?=$dd->kredit?>"></input>
                        <?php }else{
                          echo " - ";
                        } ?>
                      </td>
                      <td><input type="submit" value="Update" class="btn btn btn-success pull-right"></input></td>
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
        lengthChange: true,
         paging   : true,
         info   : true,
         responsive: true,
         

        dom:
      "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            extend: 'print',
            footer: true,
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
            }
          },
          {
            extend: 'pdf',
            footer: true,
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
            }
          },
          {
            extend: 'excel',
            footer: true,
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
            }
          },
          'colvis'
        ],
        
    } );
    
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );
</script>