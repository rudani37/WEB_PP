<?php
include 'fungsi.php';
$data_kontak = query("select * from kontak order by id_kontak ASC");
session_start();
error_reporting(0);
if ($_SESSION[level] != 'Admin') {
     echo "<script>alert('Anda Harus Login Terlebih Dahulu'); window.location='login.php'; </script>";
} else {

?>

<!DOCTYPE html>
<html lang="en">
    
     <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/logo.jpg" rel="apple-touch-icon">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT Harapan Indah Jaya</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Ckeditor -->
	<script type="text/javascript" src="ckeditor/style.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">HALAMAN ADMIN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php include('navigasi.php'); ?>
            <!--  fungsi pemanggilan navigasi -->

            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kontak</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            KONTAK PT Harapan Indah Jaya
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                <!-- TABEL DIMULAI -->
								<table align="CENTER" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<div class="form-group">
                                        <button type="submit" style="margin-bottom:20px" class="btn btn-primary" href="#" 
                                                onclick="var x = confirm('Tambah Kontak?');
                                                        if (x)
                                                        {
                                                window.location = 'tambah-kontak.php'}">Tambah</button>                  
								                                            
                                            <thead>
                                                <tr class="headings">                                                    
                                                    <th>No</th>
                                                    <th>Alamat</th>
													<th>Email Perusahaan</th>
                                                    <th>Nomor Telp/Fax Perusahaan</th>
													<th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $no = 1;
                                                while ($data = mysql_fetch_array($data_kontak)) {
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no;
                                                $no++;
                                                    ?></td>
                                                        <td><?php echo $data['alamat']; ?></td>
													    <td><?php echo $data['email']; ?></td>
                                                        <td><?php echo $data['telepon']; ?></td>
                                                         <td><a class="bn btn-success btn-sm" href="edit-kontak.php?id=<?php echo $data['id_kontak']; ?>"><i class="fa fa-edit">&nbsp;Edit </i></a> &nbsp;
                                                            <a class="bn btn-danger btn-sm" href="#" onclick="var x = confirm('Anda yakin menghapus kontak ini ?');
                                                                    if (x)
                                                                    {
                                                                        window.location = 'aksi.php?hal=kelola-kontak&aksi=hapus&id=<?php echo $data['id_kontak'] ?>'}"><i class="fa fa-trash">&nbsp;Hapus </i></a>
                                                                        

                                                        </td>


                                                    </tr>

                                                    <?php
                                                }
                                                ?>

                                </tbody>
                          </table>
                            <!-- /.TABEL SELESAI -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php
}
?>

