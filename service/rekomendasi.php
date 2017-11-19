<?php
	include "../koneksi.php";
	$fasilitas= $_POST ['fasilitas'];
	$harga = $_POST ['harga'];
	$menu = $_POST['menu'];

	$obj = new stdClass();

	$G_arr3TempatPilihan = [];		// menyimpan 3 tempat pilihan.
	$G_arr3FasilitasPilihan = [];		// Menyimpan fasilitas milik 3 tempat pilihan.
	$G_arrSemuaTempat = [];			// Menyimpan seluruh tempat hasil query.
	$G_arrKelompok = [];
	$G_arrC = [];
	$G_JarakTerdekat = [];

	function jumTotFasilitas(){
		$query = "SELECT * FROM fasilitas";
		$sql = mysql_query($query);
		return mysql_num_rows($sql);
	}

	function getAllTempat(){
		$tmpTempat = [];
		$query = mysql_query("SELECT * from tempat");

		if (mysql_num_rows($query) > 0){
			// Memasukkan hasil query (semua tempat) ke arrTmp.
			while ($data = mysql_fetch_array($query)) {
				array_push($tmpTempat, $data);
			}
		}

		return $tmpTempat;
	}

	function pilih3TempatRandom($tmpDataTempat){
		$tmpArrPilihan = [];
		global $G_arr3TempatPilihan;

		for ($i = 0; $i < 3; $i++) {
			$index = rand(0, sizeof($tmpDataTempat));		// Pilih angka random dari 0 - banyak tempat.
			array_push($tmpArrPilihan, $tmpDataTempat[$index]);	// Masukkan tempat yg dipilih ke arrPilihan.
		}

		return $tmpArrPilihan;
	}

	// Ambil fasilitas tiap tempat pilihan (khusus untuk tempat pilihan).
	function ambilFasilitasDariArr($tmpDataTempat){
		$tmpHasil = [];

		for($i = 0; $i < sizeof($tmpDataTempat); $i++){
			$tmpFasilitasPilihan = [];

			$tmpObjsaatini = $tmpDataTempat[$i];
			$queryFasilitas = mysql_query("SELECT * FROM relasi_tempat_fasilitas
											WHERE id_tempat = $tmpObjsaatini[id_tempat]");

			while ($dataFasilitas = mysql_fetch_array($queryFasilitas)) {
				array_push($tmpFasilitasPilihan, $dataFasilitas);
			}

			// Menyimpan daftar fasilitas per tempat pilihan.
			array_push($tmpHasil, $tmpFasilitasPilihan);
		}
		return $tmpHasil;
	}

	// Ambil fasilitas khusus per tempat.
	function ambilFasilitasDariObj($tmpDataTempat){
		$tmpHasil = [];

		$queryFasilitasObj = mysql_query("SELECT * FROM relasi_tempat_fasilitas
										WHERE id_tempat = $tmpDataTempat[id_tempat]");

		while ($dataFasilitas = mysql_fetch_array($queryFasilitasObj)) {
			array_push($tmpHasil, $dataFasilitas);
		}

		return $tmpHasil;
	}

	// Konversi nilai fasilitas (1 ada 0 ga ada).
	function konversiNilaiFasilitasPerTempat($tmpObj){
		$tmpObjFasilitas = [];	// Tmp var untuk penyimpanan sementara ada fasilitas atau tidak.

		// Pengulangan sebanyak jum fasilitas yang ada di db.
		for($i = 0; $i < jumTotFasilitas(); $i++){
			// cek untuk dapat nilai ada fasilitas tidak.
			if($i < (sizeof($tmpObj) - 1)){
				// $tmpPenguranganPilihan[$i] = $tmp3FasilitasPilihan[$i];
				$tmpObjFasilitas[$i] = 2;	// ada
			}else{
				$tmpObjFasilitas[$i] = 1;	// ga ada
			}
		}

		return $tmpObjFasilitas;
	}

	function perhitunganJarakKepusat($tmpSemuaTempat, $tmp3TempatPilihan, $tmp3FasilitasPilihan){
		global $G_arrSemuaTempat;
		global $G_arrC;

		$tmpJarakKePusat = [];

		// Penyimpanan tmp untuk pengurangan fasilitas.
		$tmpPenguranganPilihan = [];
		$arrC = [];		// Menyimpan C1, C2, C3.

		// Assign nilai ke $tmpPenguranganPilihan.
		for($x = 0; $x < 3; $x++){
			// Penyimpanan sementara untuk objpilihan yang dolooping saat ini.
			$tmpObjPilihan = $tmp3FasilitasPilihan[$x];
			array_push($tmpPenguranganPilihan, 	konversiNilaiFasilitasPerTempat($tmpObjPilihan));
		}

		// Pengelompokan tempat.
		for ($i = 0; $i < (sizeof($G_arrSemuaTempat) - 1); $i++) {
			// Yang nyimpan arr [1,0,1, dst] -> konversi nilai fasilitas.
			$tmpPenguranganSaatIni = [];
			$tmpPenguranganHasil = [];

			$tmpObjsaatini = $G_arrSemuaTempat[$i];
			$tmpFasilitasTempatSaatIni = ambilFasilitasDariObj($tmpObjsaatini);
			$tmpPenguranganSaatIni = konversiNilaiFasilitasPerTempat($tmpFasilitasTempatSaatIni);

			// Perhitungan.
			$tmpArrHasilAkhir = [];
			$tmpJarakTerdekat = 100;

			for($z = 0; $z < 3; $z++){
				$tmpHasilAkar = 0;
				for($x = 0; $x < jumTotFasilitas(); $x++){
					$saatIni = $tmpPenguranganSaatIni[$x];
					$pilihan = $tmpPenguranganPilihan[$z][$x];
					$tmpPenguranganHasil[$x] = pow(($saatIni - $pilihan), 2);
					$tmpHasilAkar += $tmpPenguranganHasil[$x];
				}

				$tmpHasilAkar = sqrt($tmpHasilAkar);
				array_push($tmpArrHasilAkhir, $tmpHasilAkar);

				// if untuk jarak terdekat.
				if($tmpJarakTerdekat < $tmpHasilAkar){
					$tmpJarakTerdekat = $tmpHasilAkar;
				}
			}
			array_push($arrC, $tmpArrHasilAkhir);
			array_push($tmpJarakKePusat, $tmpJarakTerdekat);
		}

		$G_arrC = $arrC;
		// var_dump($arrC);
		return $tmpJarakKePusat;
	}

	// Yang ini belum selesai
	function pengelompokanData($tmpDataC, $tmpDataJarakTerdekat){
		global $G_arrSemuaTempat;
		$tmpArr = [];	// arr jarak terdekat.
		// $tmpArrKelompok = [];

		// Buat nyimpan tempat per kelombok.
		$arrKelompok1 = [];
		$arrKelompok2 = [];
		$arrKelompok3 = [];

		// cari jarak terdekat.
		$tmp = 0;
		for($x = 0; $x < sizeof($tmpDataC); $x++){
			$tmpTempat = $tmpDataC[$x];
			$tmpJarak = $tmpTempat[0];
			for($i = 0; $i < 3; $i++){
				if($tmpJarak > $tmpTempat[$i]){
					$tmpJarak = $tmpTempat[$i];
				}
			}
			array_push($tmpArr, $tmpJarak);
		}

		// Ulang sebanyak jumlah data.
		for($i = 0; $i < (sizeof($G_arrSemuaTempat) - 1); $i++){
			$tmpSaatIni = $G_arrSemuaTempat[$i];
			$tmpObjC = $tmpDataC[$i];

			for($j = 0; $j < 3; $j++){
				if($tmpObjC[$j] == $tmpArr[$i]){
					// $tmpArrKelompok[$i] = $j;
					if($j == 0){
						$arrKelompok1[$i] = $tmpSaatIni;
					}else if($j == 1){
						$arrKelompok2[$i] = $tmpSaatIni;
					}else{
						$arrKelompok3[$i] = $tmpSaatIni;
					}
					break;
				}
			}
		}

		// echo "<h1>tmpArr</h1>";
		// var_dump($tmpArr);
		// echo "<hr>";
		// echo "<h1>data c</h1>";
		// var_dump($tmpDataC);
		// echo "<hr>";
		// echo "<h1>kelompok 1</h1>";
		// var_dump($arrKelompok1);
		// echo "<hr>";
		// echo "<h1>kelompok 2</h1>";
		// var_dump($arrKelompok2);
		// echo "<hr>";
		// echo "<h1>kelompok 3</h1>";
		// var_dump($arrKelompok3);
		$tmpReturn = [];
		array_push($tmpReturn, $arrKelompok1);
		array_push($tmpReturn, $arrKelompok2);
		array_push($tmpReturn, $arrKelompok3);
		return $tmpReturn;
	}

	// function rataRataFasilitasPerKelompok($tmpArrKelompok){
	// 	$tmpC = [];
		$tmpJumFasilitas = 0;

		for($i = 0; $i < (sizeof($tmpArrKelompok) - 1); $i++){

			// $tmpJumFasilitas +=
		}

		return $tmpC;
	}

	// ================= MULAI DISINI =================.
	$G_arrSemuaTempat = getAllTempat();

	if (sizeof($G_arrSemuaTempat) > 0){
		// Pilih 3 tempat random dari $G_arrSemuaTempat dan simpan ke $G_arr3TempatPilihan.
		$G_arr3TempatPilihan = pilih3TempatRandom($G_arrSemuaTempat);
		$G_arr3FasilitasPilihan = ambilFasilitasDariArr($G_arr3TempatPilihan);
		$G_JarakTerdekat = perhitunganJarakKepusat($G_arrSemuaTempat, $G_arr3TempatPilihan, $G_arr3FasilitasPilihan);
		$G_arrKelompok = pengelompokanData($G_arrC, $G_JarakTerdekat);


		// SEMENTARA LANGSUNG.=============================
		// Validasi (3 x). coba 3x dulu.
		for($i = 0; $i < 3; $i++){
			for($j = 0; $j < 3; $j++){
				$tmpC = [];
				$tmpKelompok = $G_arrKelompok[$j];

			}

			// Hitung c.
			// c1 = ARR sepanjang jumlah fasilitas di db.
			// c1 kolom 1 = (tempat1 fasilitas1 + tempat2 fasilitas 1 + ...) / jum kelompok 1.
			// c1 kolom 2 = (tempat1 fasilitas2 + tempat2 fasilitas 2 + ...) / jum kelompok 1.
			// c2, c3 sama

			// hitung jarak terpendek
				// perulangan sebanyak tempat.
					// fasilitas saat ini - c1
					// fasilitas saat ini - c2,
					// fasilitas saat ini - c3,
						// Terus ambil yang paling pendek, simpan.

			// sekarang punya 52 jarak terpendek

			// pengelompokan, cara sama.
			// Kalau hasilnya sama seperti hasil sebelumnya, berarti berhasil. berhenti. kalau engga, ulangi perulangan berikutnya
		}
		// ==========================================================
		var_dump($G_arrKelompok);

		// Tinggal assign nilai ke tmp arr untuk pengurangan, terus hitung pengelompokan.

		$obj->status = true;
		$obj->pesan = "Berhasil mendapatkan rekomendasi";
		$obj->data = new stdClass();
	}else{
		$obj->status = false;
		$obj->pesan = "Tidak ada tempat";
		$obj->data = new stdClass();
	}

	// echo json_encode($obj);
	mysql_close($koneksi);
?>
