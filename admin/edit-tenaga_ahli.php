<?php
include 'fungsi.php';
error_reporting(0);
$id = $_GET['id'];
$data_tenaga_ahli = query("select * from tenaga_ahli where id_tenaga_ahli='$id'");
if (mysql_num_rows($data_tenaga_ahli) == 0) {
    echo "Data tidak ada";
    die();
} else {
    $data = mysql_fetch_array($data_tenaga_ahli);
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Tenaga Ahli PT HIJ</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Ckeditor -->
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
                <a class="navbar-brand" href="index.html">Halaman Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php
                include 'navigasi.php';
                ?>
				
				</div>
            <!-- /.navbar-static-side -->
        </nav>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Tenaga Ahli</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Tenaga Ahli PT HIJ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">


                <!-- page content -->
					<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Silahkan Masukkan Data Tenaga Ahli
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="aksi.php?hal=kelola-tenaga_ahli&aksi=edit&id=<?php echo $data['id_tenaga_ahli']; ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        
                                         <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama<span class="required"></span>
                                                </label>
                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                    <input type="text" value="<?php echo $data['nama_lengkap']; ?>" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                         </div>
										 <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Foto<span class="required"></span>
                                                </label>
                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                   <img id="foto" alt="upload gambar" src="../image/tenaga_ahli/<?php echo $data['foto_tenaga_ahli'] ?>" style="width: 40%; height: auto;"/>  
                                                    <input type="file" name="foto" required="required" onchange="document.getElementById('foto').src = window.URL.createObjectURL(this.files[0])">

                                                </div>
                                         </div>
										 <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Keahlian
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="<?php echo $data['keahlian']; ?>" name="keahlian"  readonly class="form-control col-md-7 col-xs-12">
                                                </div>
                                         </div>
                                         <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
												<select type="text" name="keahlian">
													<option value="">--Pilih Keahlian--</option>
                                                    <option value="Bangunan Sipil">Bangunan Sipil</option>
                                                    <option value="Perpipaan">Perpipaan</option>
												</select>
                                                </div>
                                         </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="reset" class="btn btn-primary" href="#" 
                                                            onclick="var x = confirm('Tinggalkan halaman ini?');
                                                                    if (x)
                                                                    {
                                                                        window.location = 'kelola-tenaga_ahli.php'}">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </div>

                                        </form>   
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