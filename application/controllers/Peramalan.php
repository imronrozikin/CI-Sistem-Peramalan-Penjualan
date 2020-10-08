<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peramalan extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/peramalan/index');
	}

	public function hitung_old()
	{
		$tahun = $this->input->post('year');

		$data_transaksi = $this->db
			->select('transaksi.*,month(tgl) as bulan,sum(jumlah) as jumlah')
			->where('year(tgl)', $tahun)
			->join('detailtransaksi', 'transaksi.id=detailtransaksi.fk_transaksi')
			->group_by('year(tgl)')
			->group_by('month(tgl)')
			->get('transaksi')
			->result();


		for ($i = 0; $i < 12; $i++) {
			$data[$i] = 0;
		}

		foreach ($data_transaksi as $key => $value) {
			$data[$value->bulan - 1] = $value->jumlah;
		}


		if (count($data_transaksi) == 0) {
			echo json_encode([
				'error' => 'Data Tidak ada',
			]);
			return;
		}



		// $data = [
		// 	176,
		// 	65,
		// 	55,
		// 	154,
		// 	97,
		// 	113,
		// 	115,
		// 	95,
		// 	177,
		// 	123,
		// 	96,
		// 	54
		// ];

		$min = min($data);
		$max = max($data);


		$data_interval = [];
		for ($i = 1; $i < count($data); $i++) {
			$data_interval[$i - 1] = abs($data[$i] - $data[$i - 1]);
		}

		$total = array_sum($data_interval);

		$rata2 = $total / count($data_interval);

		$b = $rata2 / 2;

		$basis = 0;

		if ($b >= 0.1 && $b <= 1) {
			$basis = 0.1;
		} else if ($b >= 1.1 && $b <= 10) {
			$basis = 1;
		} else if ($b >= 11 && $b <= 100) {
			$basis = 10;
		} else if ($b >= 101 && $b <= 1000) {
			$basis = 100;
		} else if ($b >= 1001 && $b <= 10000) {
			$basis = 1000;
		}

		$jumlah_interval = ($max - $min) / $basis;

		$jumlah_interval = ceil($jumlah_interval);

		$himpunan_fuzzy = [];
		for ($i = 0; $i < $jumlah_interval; $i++) {
			$himpunan_fuzzy[] = [
				'x' => ($min + ($i * 10)),
				'y' => ($min + ($i * 10)) + 10
			];
		}

		$data_fuzzy = [];
		foreach ($data as $key => $value) {
			foreach ($himpunan_fuzzy as $k => $v) {
				if ($value >= $v['x'] && $value <= $v['y']) {
					$data_fuzzy[$key] = $k;
				}
			}
		}

		$fuzzy_relation = [];

		foreach ($data_fuzzy as $key => $value) {
			if ($key == count($data_fuzzy) - 1) {
				$fuzzy_relation[$key][0] = [
					'from' => $data_fuzzy[$key],
					'to' => $data_fuzzy[0]
				];
				break;
			}
			$fuzzy_relation[$key][$key + 1] = [
				'from' => $data_fuzzy[$key],
				'to' => $data_fuzzy[$key + 1]
			];
		}

		$fuzzy_relation_group = [];

		foreach ($fuzzy_relation as $key => $value) {
			foreach ($value as $k => $v) {
				if (!isset($fuzzy_relation_group[$v['from']])) {
					$fuzzy_relation_group[$v['from']] = [];
				}
				array_push($fuzzy_relation_group[$v['from']], $v['to']);
			}
		}

		$data_peramalan = [];
		foreach ($fuzzy_relation as $key => $value) {


			$himpunan_from = 0;
			foreach ($value as $k => $v) {
				$himpunan_from = $v['from'];
			}
			$data_peramalan[$key] = ($himpunan_fuzzy[$himpunan_from]['x'] + $himpunan_fuzzy[$himpunan_from]['y']) / 2;
		}

		foreach ($data_peramalan as $key => $value) {
			$set = [
				'tahun' => $tahun,
				'bulan' => $key + 1,
				'nilai' => $value,
			];
			// $this->db->insert('peramalan_transaksi', $set);
		}

		echo json_encode([
			'peramalan' => $data_peramalan,
			'aktual' => $data,
		]);
	}

	public function hitung()
	{
		// $db_penjualan[] = (object) [
		// 	'bulan' => "january",
		// 	'tahun' => 2017,
		// 	'jumlah' => 122,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "february",
		// 	'tahun' => 2017,
		// 	'jumlah' => 74,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "maret",
		// 	'tahun' => 2017,
		// 	'jumlah' => 76,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "april",
		// 	'tahun' => 2017,
		// 	'jumlah' => 86,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "mei",
		// 	'tahun' => 2017,
		// 	'jumlah' => 203,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "juni",
		// 	'tahun' => 2017,
		// 	'jumlah' => 187,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "juli",
		// 	'tahun' => 2017,
		// 	'jumlah' => 90,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "agustus",
		// 	'tahun' => 2017,
		// 	'jumlah' => 156,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "september",
		// 	'tahun' => 2017,
		// 	'jumlah' => 84,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "oktober",
		// 	'tahun' => 2017,
		// 	'jumlah' => 172,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "november",
		// 	'tahun' => 2017,
		// 	'jumlah' => 118,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "desember",
		// 	'tahun' => 2017,
		// 	'jumlah' => 120,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "january",
		// 	'tahun' => 2018,
		// 	'jumlah' => 176,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "february",
		// 	'tahun' => 2018,
		// 	'jumlah' => 65,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "maret",
		// 	'tahun' => 2018,
		// 	'jumlah' => 55,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "april",
		// 	'tahun' => 2018,
		// 	'jumlah' => 154,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "mei",
		// 	'tahun' => 2018,
		// 	'jumlah' => 97,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "juni",
		// 	'tahun' => 2018,
		// 	'jumlah' => 113,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "juli",
		// 	'tahun' => 2018,
		// 	'jumlah' => 115,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "agustus",
		// 	'tahun' => 2018,
		// 	'jumlah' => 95,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "september",
		// 	'tahun' => 2018,
		// 	'jumlah' => 177,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "oktober",
		// 	'tahun' => 2018,
		// 	'jumlah' => 123,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "november",
		// 	'tahun' => 2018,
		// 	'jumlah' => 96,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "desember",
		// 	'tahun' => 2018,
		// 	'jumlah' => 54,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "january",
		// 	'tahun' => 2019,
		// 	'jumlah' => 131,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "february",
		// 	'tahun' => 2019,
		// 	'jumlah' => 79,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "maret",
		// 	'tahun' => 2019,
		// 	'jumlah' => 77,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "april",
		// 	'tahun' => 2019,
		// 	'jumlah' => 73,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "mei",
		// 	'tahun' => 2019,
		// 	'jumlah' => 68,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "juni",
		// 	'tahun' => 2019,
		// 	'jumlah' => 112,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "juli",
		// 	'tahun' => 2019,
		// 	'jumlah' => 94,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "agustus",
		// 	'tahun' => 2019,
		// 	'jumlah' => 90,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "september",
		// 	'tahun' => 2019,
		// 	'jumlah' => 146,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "oktober",
		// 	'tahun' => 2019,
		// 	'jumlah' => 127,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "november",
		// 	'tahun' => 2019,
		// 	'jumlah' => 83,
		// ];
		// $db_penjualan[] = (object) [
		// 	'bulan' => "desember",
		// 	'tahun' => 2019,
		// 	'jumlah' => 30,
		// ];


		
		#post
		$tahun = $this->input->post('tahun');
		$merk = $this->input->post('merk');

		#langkah 1

		if ($merk != "" AND $tahun == "") {
			$this->db->where('produk.merk', $merk);
		}else if($tahun != "" AND $merk != ""){
			$this->db->where('produk.merk', $merk);
			$this->db->where('year(tgl)', $tahun);
		}else if($tahun != "" AND $merk == ""){
			$this->db->where('year(tgl)', $tahun);
		}
		$db_penjualan = $this->db
			->select('transaksi.*,year(tgl) as tahun,monthname(tgl) as bulan,sum(jumlah) as jumlah')
			->join('transaksi', 'transaksi.id=detailtransaksi.fk_transaksi')
			->join('produk', 'produk.id=detailtransaksi.fk_produk')
			->group_by('year(tgl)')
			->group_by('month(tgl)')
			->get('detailtransaksi')
			->result();

		if(count($db_penjualan) == 0){
			echo json_encode([
				'error' => 1,
				'message' => "Data Kosong",
			]);
			die();
		}

		$keterangan_data = [];
		$datas = [];

		foreach ($db_penjualan as $key => $value) {
			$keterangan_data[$key] = $value;
			$datas[$key] = $value->jumlah;
		}

		#langkah 2
		$dmin = min($datas);
		$dmax = max($datas);

		#cons
		$d1 = 10;
		$d2 = 7;

		$Himpunan1 = $dmin - $d1;
		$Himpunan2 = $dmax + $d2;


		#cons
		$jumlah_interval_kelas = 10;

		#langkah 3
		$data = [];
		foreach ($datas as $key => $value) {
			if ($key == 0) continue;
			$data[] = abs($datas[$key] - $datas[$key - 1]);
		}

		$avg_data = array_sum($data) / count($data);


		#langkah3.1
		$b = $avg_data / 2;

		$basis = 0;

		if ($b >= 0.1 && $b <= 1) {
			$basis = 0.1;
		} else if ($b >= 1.1 && $b <= 10) {
			$basis = 1;
		} else if ($b >= 11 && $b <= 100) {
			$basis = 10;
		} else if ($b >= 101 && $b <= 1000) {
			$basis = 100;
		} else if ($b >= 1001 && $b <= 10000) {
			$basis = 1000;
		}

		#langka3.2
		$panjang_interval = ($dmax + $d1 - $dmin + $d2) / $basis;


		#langkah4
		$himpunan_interval = [];
		for ($i = $Himpunan1; $i < $Himpunan2; $i += $panjang_interval) {
			$himpunan_interval[] = [
				'min' => $i,
				'max' => $i + $panjang_interval
			];
		}

		$nilaitengah_A = [];
		foreach ($himpunan_interval as $key => $value) {
			$nilaitengah_A[$key] = ($value['min'] + $value['max']) / 2;
		}


		#langkah5
		$fuzzifikasi = [];
		foreach ($datas as $key => $value) {
			foreach ($himpunan_interval as $k => $v) {
				if ($value >= $v['min'] && $value <= $v['max']) {
					$fuzzifikasi[$key] = $k;
				}
			}
		}

		#langkah6
		$relasi_fuzzy = [];
		foreach ($fuzzifikasi as $key => $value) {
			if ($key == 0) continue;
			$relasi_fuzzy[] = [
				'index_from' => ($key - 1),
				'index_to' => ($key),
				'from' => $fuzzifikasi[$key - 1],
				'to' => $fuzzifikasi[$key],
			];
		}

		#langkah7
		$relasi_group_fuzzy = [];
		foreach ($relasi_fuzzy as $key => $value) {
			if (isset($relasi_group_fuzzy[$value['from']][$value['to']])) {
				$relasi_group_fuzzy[$value['from']][$value['to']] += 1;
			} else {
				$relasi_group_fuzzy[$value['from']][$value['to']] = 1;
			}
		}

		#langkah7
		$matrix = [];
		foreach ($relasi_group_fuzzy as $key => $value) {
			$sum = array_sum($value);
			foreach ($value as $k => $v) {
				$matrix[$key][$k] = $v / $sum;
			}
		}
		/*$maxku = max($relasi_group_fuzzy);
		$coba = [];
		foreach ($relasi_fuzzy as $boy => $maxku) {
			$coba[$maxku['from']][$maxku['to']];
		}*/
		$data_ramalan = [];
		foreach ($relasi_fuzzy as $key => $value) {
			if ($value['from'] == $value['to']) {

				$value_to = $value['to'];
				$before = 0;
				if (isset($matrix[$value_to][$value_to - 1])) {
					$before = $matrix[$value_to][$value_to - 1] * $nilaitengah_A[$value_to - 1];
				}
				$after = 0;
				if (isset($matrix[$value_to][$value_to + 1])) {
					$after = $matrix[$value_to][$value_to + 1] * $nilaitengah_A[$value_to + 1];
				}
				$rumus_many = $before + ($datas[$value['index_to'] - 1] * $matrix[$value_to][$value_to]) + $after;
				$data_ramalan[$value['index_to']] = $rumus_many;
			} else {
				$data_ramalan[$value['index_to']] = $nilaitengah_A[$value['to']];
			}
		}

		$chart_label = [];
		$chart_data_predik = [];
		$chart_data_aktual = [];
		foreach ($data_ramalan as $key => $value) {
			$chart_label[] = $keterangan_data[$key]->bulan . " " . $keterangan_data[$key]->tahun;
			$chart_data_predik[] = $value;
			$chart_data_aktual[] = $keterangan_data[$key]->jumlah;
		}

		echo json_encode([
			'error' => 0,
			'chart' => [
				'label' => $chart_label,
				'predik' => $chart_data_predik,
				'aktual' => $chart_data_aktual,
			]
		]);
	}
	public function prediksi()
	{


		#post
		$tahun = $this->input->post('year');
		$merk = $this->input->post('merk');

		#langkah 1

		if ($merk != "") {
			$this->db->where('produk.merk', $merk);
		}else if($tahun != "" AND $merk != ""){
			$this->db->where('produk.merk', $merk);
			$this->db->where('year(tgl)', $tahun);
		}else if($tahun != ""){
			$this->db->where('year(tgl)', $tahun);
		}
		$db_penjualan = $this->db
			->select('transaksi.*,year(tgl) as tahun,monthname(tgl) as bulan,sum(jumlah) as jumlah')
			->join('transaksi', 'transaksi.id=detailtransaksi.fk_transaksi')
			->join('produk', 'produk.id=detailtransaksi.fk_produk')
			->group_by('year(tgl)')
			->group_by('month(tgl)')
			->get('detailtransaksi')
			->result();

		if(count($db_penjualan) == 0){
			echo json_encode([
				'error' => 1,
				'message' => "Data Kosong",
			]);
			die();
		}

		$keterangan_data = [];
		$datas = [];

		foreach ($db_penjualan as $key => $value) {
			$keterangan_data[$key] = $value;
			$datas[$key] = $value->jumlah;
		}

		#langkah 2
		$dmin = min($datas);
		$dmax = max($datas);

		#cons
		$d1 = 10;
		$d2 = 7;

		$Himpunan1 = $dmin - $d1;
		$Himpunan2 = $dmax + $d2;


		#cons
		$jumlah_interval_kelas = 10;

		#langkah 3
		$data = [];
		foreach ($datas as $key => $value) {
			if ($key == 0) continue;
			$data[] = abs($datas[$key] - $datas[$key - 1]);
		}

		$avg_data = array_sum($data) / count($data);


		#langkah3.1
		$b = $avg_data / 2;

		$basis = 0;

		if ($b >= 0.1 && $b <= 1) {
			$basis = 0.1;
		} else if ($b >= 1.1 && $b <= 10) {
			$basis = 1;
		} else if ($b >= 11 && $b <= 100) {
			$basis = 10;
		} else if ($b >= 101 && $b <= 1000) {
			$basis = 100;
		} else if ($b >= 1001 && $b <= 10000) {
			$basis = 1000;
		}

		#langka3.2
		$panjang_interval = ($dmax + $d1 - $dmin + $d2) / $basis;


		#langkah4
		$himpunan_interval = [];
		for ($i = $Himpunan1; $i < $Himpunan2; $i += $panjang_interval) {
			$himpunan_interval[] = [
				'min' => $i,
				'max' => $i + $panjang_interval
			];
		}

		$nilaitengah_A = [];
		foreach ($himpunan_interval as $key => $value) {
			$nilaitengah_A[$key] = ($value['min'] + $value['max']) / 2;
		}


		#langkah5
		$fuzzifikasi = [];
		foreach ($datas as $key => $value) {
			foreach ($himpunan_interval as $k => $v) {
				if ($value >= $v['min'] && $value <= $v['max']) {
					$fuzzifikasi[$key] = $k;
				}
			}
		}

		#langkah6
		$relasi_fuzzy = [];
		foreach ($fuzzifikasi as $key => $value) {
			if ($key == 0) continue;
			$relasi_fuzzy[] = [
				'index_from' => ($key - 1),
				'index_to' => ($key),
				'from' => $fuzzifikasi[$key - 1],
				'to' => $fuzzifikasi[$key],
			];
		}

		#langkah7
		$relasi_group_fuzzy = [];
		foreach ($relasi_fuzzy as $key => $value) {
			if (isset($relasi_group_fuzzy[$value['from']][$value['to']])) {
				$relasi_group_fuzzy[$value['from']][$value['to']] += 1;
			} else {
				$relasi_group_fuzzy[$value['from']][$value['to']] = 1;
			}
		}

		#langkah7
		$matrix = [];
		foreach ($relasi_group_fuzzy as $key => $value) {
			$sum = array_sum($value);
			foreach ($value as $k => $v) {
				$matrix[$key][$k] = $v / $sum;
			}
		}
		/*$maxku = max($relasi_group_fuzzy);
		$coba = [];
		foreach ($relasi_fuzzy as $boy => $maxku) {
			$coba[$maxku['from']][$maxku['to']];
		}*/
		$data_ramalan = [];
		foreach ($relasi_fuzzy as $key => $value) {
			if ($value['from'] == $value['to']) {

				$value_to = $value['to'];
				$before = 0;
				if (isset($matrix[$value_to][$value_to - 1])) {
					$before = $matrix[$value_to][$value_to - 1] * $nilaitengah_A[$value_to - 1];
				}
				$after = 0;
				if (isset($matrix[$value_to][$value_to + 1])) {
					$after = $matrix[$value_to][$value_to + 1] * $nilaitengah_A[$value_to + 1];
				}
				$rumus_many = $before + ($datas[$value['index_to'] - 1] * $matrix[$value_to][$value_to]) + $after;
				$data_ramalan[$value['index_to']] = $rumus_many;
			} else {
				$data_ramalan[$value['index_to']] = $nilaitengah_A[$value['to']];
			}
		}

		$chart_label = [];
		$chart_data_predik = [];
		$chart_data_aktual = [];
		foreach ($data_ramalan as $key => $value) {
			$chart_label[] = $keterangan_data[$key]->bulan . " " . $keterangan_data[$key]->tahun;
			$chart_data_predik[] = $value;
			$chart_data_aktual[] = $keterangan_data[$key]->jumlah;
		}

		echo json_encode([
			'error' => 0,
			'chart' => [
				'label' => $chart_label,
				'predik' => $chart_data_predik,
				'aktual' => $chart_data_aktual,
			]
		]);
	}
}
