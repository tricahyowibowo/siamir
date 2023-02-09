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
                    <th>Debit (Rp)</th>
                    <th>Kredit (Rp)</th>
                    <?php
                    if($role == ROLE_ADMIN || $role == ROLE_KABAG){?>
                    <th>aksi</th>
                    <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php if(is_array($list_data)){ ?>
                    <?php $no = 1;
                    ?>
                    
                    <?php foreach($list_data as $dd): ?>
                      <td><?=$no++?></td>
                      <td><a style="color:black" target="_blank" href="<?=base_url('transaksi/cetak/'.$dd->kode_transaksi.$dd->no_transaksi)?>"><?= $dd->kode_transaksi.$dd->no_transaksi?></a></td>
                      <td><?=strftime('%d %b %Y', strtotime($dd->tgl_transaksi))?></td>
                      <td><?=$dd->nama_kategori?></td>
                      <td><?=$dd->id_akun?></td>
                      <td><?=$dd->nama_akun." ".$dd->keterangan?></td>
                      <td class="text-center">
                          <?php 
                          if($dd->jenis_transaksi == "Debet"){
                            echo "Rp. ".number_format($dd->debet)." ,-";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          if($dd->jenis_transaksi == "Kredit"){
                            echo "Rp. ".number_format($dd->kredit)." ,-";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                        <?php
                        if($role == ROLE_ADMIN || $role == ROLE_KABAG || $role == ROLE_KAS){?>
                        <td>
                          <a href="<?=base_url('transaksi/edittransaksi/'.$dd->no_transaksi)?>" type="button" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                        </td>
                        <?php } ?>
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