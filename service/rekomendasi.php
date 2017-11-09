<?php

include "../koneksi.php";
$fasilitas= $_POST ['fasilitas'];
$harga=$_POST ['harga'];
$menu=$_POST['menu'];

$query = mysql_query("SELECT * from tempat");
	// $sql = mysql_query($query);
	$arrpilihan=[];		// menyimpan 3 tempat pilihan.
	$arrPilihanFasilitas = [];	// Menyimpan fasilitas milik 3 tempat pilihan.
	$arrTmp = [];		// Menyimpan seluruh tempat hasil query.
	
	// Buat nyimpan tempat per kelombok.
	$arrKelompok1 = [];
	$arrKelompok2 = [];
	$arrKelompok3 = [];

	// Penyimpanan tmp untuk pengurangan fasilitas.
	$tmpPenguranganPilihan = [0, 0, 0, 0, 0, 0, 0];
	$tmpPenguranganSaatIni = [0, 0, 0, 0, 0, 0, 0];
	$tmpPenguranganHasil = [0, 0, 0, 0, 0, 0, 0];		


	if (mysql_num_rows($query)>0)
	{
		// Memasukkan hasil query (semua tempat) ke arrTmp.
		while ($data = mysql_fetch_array($query)) {
			array_push($arrTmp, $data);		
		}

		// Pilih 3 tempat secara random.
		for ($i=0; $i<3; $i++) { 
			$index = rand(0, sizeof($arrTmp));		// Pilih angka random dari 0 - banyak tempat.
			array_push($arrpilihan, $arrTmp[$index]);	// Masukkan tempat yg dipilih ke arrPilihan.
			
			// Ambil fasilitas tiap tempat pilihan.
			$tmpObjsaatini = $arrTmp[$index];
			$queryFasilitas = mysql_query("SELECT * From relasi_tempat_fasilitas where id_tempat = $tmpObjsaatini[id_tempat]");
			
			$tmpFasilitasPilihan = [];
			while ($dataFasilitas = mysql_fetch_array($queryFasilitas)) {
				array_push($tmpFasilitasPilihan, $dataFasilitas);		
			}

			// Menyimpan daftar fasilitas per tempat pilihan di arrPilihanFasilitas.
			array_push($arrPilihanFasilitas, $tmpFasilitasPilihan);

					
			// Assign nilai ke tmpFasilitasPilihan.
			for($y = 0; $y < sizeof($tmpFasilitasPilihan); $y++){
				// $obj = $tmpFasilitasPilihan[$y];
				$tmpPenguranganPilihan[$y] = 1;
			}
		}
		
		
		// Pengelompokan tempat.
		for ($i = 0; $i < sizeof($arrTmp); $i++) { 
			$arrC = [];		// Menyimpan C1, C2, C3.
			$tmpObjsaatini = $arrTmp[$i];	
			$queryFasilitas = mysql_query('SELECT * From relasi_tempat_fasilitas where id_tempat = "$tmpObjsaatini[id_tempat]"');

	
			$tmpFasilitasTempatSaatIni = [];
			while ($dataFasilitas = mysql_fetch_array($queryFasilitas)) {
				array_push($tmpFasilitasTempatSaatIni, $dataFasilitas);		
			}

			// Assign nilai ke tmpFasilitasTempatSaatIni.
			for($y = 0; $y < sizeof($tmpFasilitasTempatSaatIni); $y++){
				// $obj = $tmpFasilitasTempatSaatIni[$y];	
				$tmpPenguranganSaatIni[$y] = 1;
			}

			for($x = 0; $x < 7; $x++){
				$tmpPenguranganHasil[$x] = $tmpPenguranganPilihan[$x] - $tmpPenguranganSaatIni[$x];

				echo "pilihan: ";
				echo $tmpPenguranganPilihan[$x];
				echo "<br>";

				echo "saat ini: ";
				echo $tmpPenguranganSaatIni[$x];
				echo "<br>";

				echo "hasil: ";
				echo $tmpPenguranganHasil[$x];
				echo "<br>";
			}

			echo "<br><br>";

			// Menghitung sesuai 3 tempat pilihan.
			// for($j = 0; $j < 3; $j++){
			// 	$tmpObj = $arrTmp[$i];		// Tempat saat ini.

			// 	$tmpHasilPerhitungan = 
			// 	pow(($tmpObj['id_harga'] - $arrpilihan['id_harga']), 2) + 
			// 	pow(($tmpObj['id_jumlah_menu'] - $arrpilihan['id_jumlah_menu']), 2) +
			// 	pow(($tmpObj['id_jumlah_menu'] - $arrpilihan['id_jumlah_menu']), 2);
			
			// 	$hasilPerhitungan = sqrt($tmpHasilPerhitungan);
			// }
		}
			
		
	}
	else{
		$obj->status = false;
		$obj->pesan = "Tidak ada tempat";
		$obj->data = null;	
	}


	
	
	mysql_close($koneksi);
?>