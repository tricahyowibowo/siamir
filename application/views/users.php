<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        <i class="fa fa-users"></i> User Management
      </h1>
    </section>
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xs-12 text-right">
            <div class="form-group">
              <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="box-title">Users List</h3>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="tabel_user" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    if (!empty($list_user)) {
                      foreach ($list_user as $record) {
                    ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $record->name ?></td>
                          <td><?php echo $record->username ?></td>
                          <td><?php echo $record->role ?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOld/' . $record->userId; ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger btn-delete" href="<?php echo base_url() . 'user/delete/' . $record->userId; ?>"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
        </div>
    </section>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    var table = $('#tabel_user').DataTable({
      lengthChange: true,
      paging: true,
      info: true,
      responsive: true,
    });


    table.buttons().container()
      .appendTo('#example_wrapper .col-sm-6:eq(0)');

    jQuery('ul.pagination li a').click(function(e) {
      e.preventDefault();
      var link = jQuery(this).get(0).href;
      var value = link.substring(link.lastIndexOf('/') + 1);
      jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
      jQuery("#searchList").submit();
    });
  });
</script>