<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Mirota KSM | Admin System Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        <i class="fa fa-users"></i> User Management
      </h1>
    </section>
    <section class="content">
      <div class="container">
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
                            <?php if($record->isLogin != "0") { ?>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'open/' . $record->userId; ?>"><i class="fa fa-lock"></i></a>
                            <?php }else{ ?>
                            <a class="btn btn-sm btn-success"><i class="fa fa-unlock"></i></a>
                            <?php } ?>
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
<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>