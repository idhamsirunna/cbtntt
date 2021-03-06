<?php
require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
$idnilai = $_POST['id'];
$nilai = fetch($koneksi, 'nilai', array('id_nilai' => $idnilai));
$idm = $nilai['id_mapel'];
$ids = $nilai['id_siswa'];
$idu = $nilai['kode_ujian'];
$iduj = $nilai['id_ujian'];
$where = array(
	'id_mapel' => $idm,
	'id_siswa' => $ids,
	'kode_ujian' => $idu
);
$where2 = array(
	'id_mapel' => $idm,
	'id_siswa' => $ids,
	'id_ujian' => $iduj
);
$benar = $salah = 0;
$mapel = fetch($koneksi, 'mapel', array('id_mapel' => $idm));
$siswa = fetch($koneksi, 'siswa', array('id_siswa' => $ids));
$ceksoal = select($koneksi, 'soal', array('id_mapel' => $idm, 'jenis' => 1));
$arrayjawab = array();
foreach ($ceksoal as $getsoal) {
	$w = array(
		'id_siswa' => $ids,
		'id_mapel' => $idm,
		'id_soal' => $getsoal['id_soal'],
		'jenis' => 1
	);
	$cekjwb = rowcount($koneksi, 'jawaban', $w);
	if ($cekjwb <> 0) {
		$getjwb = fetch($koneksi, 'jawaban', $w);
		$arrayjawab[$getjwb['id_soal']] = $getjwb['jawaban'];
		($getjwb['jawaban'] == $getsoal['jawaban']) ? $benar++ : $salah++;
	} else {
		$salah++;
	}
}
$bagi = $mapel['jml_soal'] / 100;
$skor = $benar / $bagi;
$data = array(
	'ujian_selesai' => $datetime,
	'jml_benar' => $benar,
	'jml_salah' => $salah,
	'skor' => $skor,
	'total' => $skor,
	'online' => 0,
	'jawaban' => serialize($arrayjawab)
);
update($koneksi, 'nilai', $data, $where);
echo mysqli_error($koneksi);
delete($koneksi, 'pengacak', $where2);
delete($koneksi, 'jawaban', $where2);
//delete($koneksi, 'pengacakopsi', $where2);
