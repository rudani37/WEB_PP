<?php
error_reporting(0);
include 'fungsi.php';
$hal = $_GET['hal'];
$aksi = $_GET['aksi'];




if ($hal == 'kelola-beranda') {
    $id         = $_GET['id'];
    $isi        = $_POST['isi'];
 
    $foto       = $_FILES['foto']['name'];
    $lokasi_file= $_FILES['foto']['tmp_name'];

    $folder     = "../image/beranda/";

     
        if ($aksi == 'tambah') {
            move_uploaded_file($lokasi_file, $folder.$foto);
            $sql = query("insert into beranda (foto_beranda ,isi) values ('$foto', '$isi')");
            if ($sql == TRUE) {
                echo "<script> alert ('Proses Tambah Beranda Berhasil'); window.location='kelola-beranda.php'; </script>";
            } else {
                 echo "<script> alert ('Proses Tambah Beranda Gagal'); history.back();
        </script>";
            }
        } 
    if ($aksi == 'edit') {
        move_uploaded_file($lokasi_file, $folder.$foto);
            $sql = query("update beranda set foto_beranda='$foto', isi = '$isi' where id_beranda='$id'");
            if ($sql == TRUE) {
                echo "<script> alert ('Proses Edit Beranda Berhasil'); window.location='kelola-beranda.php'; </script>";
            } else {
                echo "<script> alert('Proses Edit Beranda Gagal'); history.back();
        </script>";
            }
        }

        if ($aksi == 'hapus') {
                $sql = query("delete from beranda where id_beranda='$id'");
                if ($sql == TRUE) {
                    echo "<script> alert ('Proses Hapus Beranda Berhasil'); window.location='kelola-beranda.php'; </script>";
                } else {
                    echo "<script> alert('Proses Hapus Beranda Gagal'); history.back();
                </script>";
                }
            }
        }
        


if ($hal == 'kelola_admin') {
	$id = $_GET['id'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
	if ($aksi == 'tambah') {
        $cek = query("select username from admin where username='$username'");
        if (mysql_num_rows($cek) > 0) {
              echo "<script> alert('Username Ini Sudah Ada'); history.back(); </script>";
        } else {
		$sql = query("insert into admin (nama_lengkap, username, password, no_hp) values ('$nama_lengkap', '$username', '$password', '$no_hp')");
	if ($sql == TRUE) {
		echo "<script> alert ('Proses Tambah Admin Berhasil');
			window.location='kelola_admin.php'; </script>";
		} else {
			echo "<script> alert ('Proses Tambah Admin Gagal');
			history.back(); </script>";
		}
	}
}

	if ($aksi == 'edit') {
		$sql = query("update admin set nama_lengkap='$nama_lengkap', username='$username', password='$password', no_hp='$no_hp'   where id_admin='$id'");
	if ($sql == TRUE) {
		echo "<script> alert ('Proses Edit Admin Berhasil');
			window.location='kelola_admin.php'; </script>";
		} else {
			echo "<script> alert ('Proses Edit Admin Gagal');
			history.back(); </script>";
		}
	}
        if ($aksi == 'hapus') {
              $sql = query("delete from admin where id_admin='$id'");
              if ($sql == TRUE) {
                  echo "<script> alert ('Proses Hapus Data Admin Berhasil'); window.location='kelola_admin.php'; </script>";
              } else {
                  echo "<script> alert('proses gagal'); history.back();
              </script>";
              }
          }
	}

	if ($hal == 'kelola_visimisi') {
    $id = $_GET['id'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    if ($aksi == 'edit') {
        $sql = query("update visimisi set visi='$visi', misi='$misi' where id_visimisi='$id'");
        if ($sql == TRUE) {
            echo "<script> alert ('Proses Edit Visi Misi Berhasil'); window.location='kelola-visimisi.php'; </script>";
        } else {
            echo "<script> alert('Proses Edit Visi Misi Gagal'); history.back();
        </script>";
        }
    }
}

if ($hal == 'kelola-strukturorganisasi') {
    $id = $_GET['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jabatan = $_POST['jabatan'];

    $file       = $_FILES['foto']['name'];
    $lokasi_file= $_FILES['foto']['tmp_name'];

    $folder     = "../image/struktur_organisasi/";

     
        if ($aksi == 'tambah') {
            move_uploaded_file($lokasi_file, $folder.$file);
            $sql = query("insert into struktur_organisasi (nama_lengkap, foto, jabatan) values ('$nama_lengkap', '$file', '$jabatan')");
            if ($sql == TRUE) {
                echo "<script> alert ('Proses Tambah Struktur Organisasi Berhasil'); window.location='kelola-strukturorganisasi.php'; </script>";
            } else {
                 echo "<script> alert ('Proses Tambah Struktur Organisasi Gagal'); history.back();
        </script>";
            }
        } 
    if ($aksi == 'edit') {
        move_uploaded_file($lokasi_file, $folder.$file);
            $sql = query("update struktur_organisasi set nama_lengkap='$nama_lengkap', foto='$file', jabatan='$jabatan' where id_anggota='$id'");
            if ($sql == TRUE) {
                echo "<script> alert ('Proses Edit Struktur Organisasi Berhasil'); window.location='kelola-beranda.php'; </script>";
            } else {
                echo "<script> alert('Proses Edit Struktur Organisasi Gagal'); history.back();
        </script>";
            }
        }

        if ($aksi == 'hapus') {
                $sql = query("delete from struktur_organisasi where id_anggota='$id'");
                if ($sql == TRUE) {
                    echo "<script> alert ('Proses Hapus Struktur Organisasi Berhasil'); window.location='kelola-strukturorganisasi.php'; </script>";
                } else {
                    echo "<script> alert('Proses Hapus Struktur Organisasi Gagal'); history.back();
                </script>";
                }
            }
        }

if ($hal == 'kelola-proyek') {
    $id = $_GET['id'];
    $nama_proyek = $_POST['nama_proyek'];
    $nilai_proyek = $_POST['nilai_proyek'];
    $deskripsi = $_POST['deskripsi'];

    $photo       = $_FILES['foto']['name'];
    $lokasi_file= $_FILES['foto']['tmp_name'];

    $folder     = "../image/proyek/";
    

    if ($aksi == 'tambah') {
        move_uploaded_file($lokasi_file, $folder.$photo);
        $sql = query("insert into proyek (foto, nama_proyek, nilai_proyek, deskripsi) values ('$photo', '$nama_proyek','$nilai_proyek', '$deskripsi')");
        if ($sql == TRUE) {
            echo "<script> alert ('Proses Tambah Proyek Berhasil'); window.location='kelola-proyek.php'; </script>";
        } else {
            echo "<script> alert ('Proses Tambah Proyek Gagal'); history.back();
        </script>";
        }
    }

    if ($aksi == 'edit') {
        move_uploaded_file($lokasi_file, $folder.$photo);
        $sql = query("update proyek set foto='$photo' ,  nama_proyek='$nama_proyek', nilai_proyek='$nilai_proyek', deskripsi='$deskripsi'  where id_proyek='$id'");
        if ($sql == TRUE) {
            echo "<script> alert ('Proses Edit proyek Berhasil'); window.location='kelola-proyek.php'; </script>";
        } else {
            echo "<script> alert('Proses Edit proyek Gagal'); history.back();
        </script>";
        }
    }


if ($aksi == 'hapus') {
        $sql = query("delete from proyek where id_proyek='$id'");
        if ($sql == TRUE) {
            echo "<script> alert ('Proses Hapus proyek Berhasil'); window.location='kelola-proyek.php'; </script>";
        } else {
            echo "<script> alert('Proses Hapus proyek Gagal'); history.back();
        </script>";
        }
    }
}

if ($hal == 'kelola-tenaga_ahli') {
	$id = $_GET['id'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$keahlian = $_POST['keahlian'];

    $foto  = $_FILES['foto']['name'];

    $lokasi_file    = $_FILES['foto']['tmp_name'];
    $folder     = "../image/tenaga_ahli/";

	 if ($aksi == 'tambah') {
            move_uploaded_file($lokasi_file, $folder.$foto);
            $sql = query("insert into tenaga_ahli (nama_lengkap, foto_tenaga_ahli, keahlian) values ('$nama_lengkap', '$foto', '$keahlian')");
            if ($sql == TRUE) {
                echo "<script> alert ('Proses Tambah Tenaga Ahli Berhasil'); window.location='kelola-tenaga_ahli.php'; </script>";
            } else {
                 echo "<script> alert ('Proses Tambah Tenaga Ahli Gagal'); history.back();
        </script>";
            }
        }

	if ($aksi == 'edit') {
        $sql = query("update tenaga_ahli set nama_lengkap='$nama_lengkap', foto_tenaga_ahli='$foto', keahlian='$keahlian' where id_tenaga_ahli='$id'");
        if ($sql == TRUE) {
            echo "<script> alert ('Proses Edit Data Tenaga Ahli Berhasil'); window.location='kelola-tenaga_ahli.php'; </script>";
        } else {
            echo "<script> alert('Proses Edit Data Tenaga Ahli Gagal'); history.back();
        </script>";
        }
    }
    
        if ($aksi == 'hapus') {
              $sql = query("delete from tenaga_ahli where id_tenaga_ahli='$id'");
              if ($sql == TRUE) {
                  echo "<script> alert ('Proses Hapus Data Tenaga Ahli Berhasil'); window.location='kelola-tenaga_ahli.php'; </script>";
              } else {
                  echo "<script> alert('proses gagal'); history.back();
              </script>";
              }
          }
      }


	
if ($hal == 'kelola-kontak') {
	$id = $_GET['id'];
    $alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];

	if ($aksi == 'tambah') {
		$cek = query ("select alamat from kontak where id_kontak='$id' ");
		if (mysql_num_rows($cek)> 0) {
			echo "<script> alert ('alamat Sudah Ada'); history.back(); </script>";
		} else {
		$sql = query("insert into kontak (alamat, email, telepon) values ('$alamat', '$email', '$telepon')");
	if ($sql == TRUE) {
		echo "<script> alert ('Proses Tambah Kontak Berhasil');
			window.location='kelola-kontak.php'; </script>";
		} else {
			echo "<script> alert ('Proses Tambah Kontak Gagal');
			history.back(); </script>";
		}
	}
	
} 
if ($aksi == 'edit') {
        $sql = query("update kontak set alamat='$alamat', email='$email', telepon='$telepon' where id_kontak='$id'");
        if ($sql == TRUE) {
            echo "<script> alert ('Proses Edit Kontak Berhasil'); window.location='kelola-kontak.php'; </script>";
        } else {
            echo "<script> alert('Proses Edit Kontak Gagal'); history.back();
        </script>";
        }
    }
if ($aksi == 'hapus') {
              $sql = query("delete from kontak where id_kontak='$id'");
              if ($sql == TRUE) {
                  echo "<script> alert ('Proses Hapus Kontak Berhasil'); window.location='kelola-kontak.php'; </script>";
              } else {
                  echo "<script> alert('proses hapus kontak gagal'); history.back();
              </script>";
              }
          }
	}