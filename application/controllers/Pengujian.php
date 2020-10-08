<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengujian extends CI_Controller
{
	public function index()
	{
		$data['peramalan'] = $this->hitung();
		$this->load->view('admin/pengujian/index', $data);
	}

	public function hitung()
	{

		$merk = $this->input->post('merk');

		#langkah 1

		if ($merk != "") {
			$this->db->where('produk.merk', $merk);
		}
		$db_penjualan = $this->db
			->select('transaksi.*,year(tgl) as tahun,monthname(tgl) as bulan,sum(jumlah) as jumlah')
			->join('transaksi', 'transaksi.id=detailtransaksi.fk_transaksi')
			->join('produk', 'produk.id=detailtransaksi.fk_produk')
			->group_by('year(tgl)')
			->group_by('month(tgl)')
			->get('detailtransaksi')
			->result();

		if (count($db_penjualan) == 0) {
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

		$tabel_data = [];
		foreach ($data_ramalan as $key => $value) {
			$mape = abs($keterangan_data[$key]->jumlah - $value)/$keterangan_data[$key]->jumlah;
			$tabel_data[] = (object) [
				'keterangan' => $keterangan_data[$key]->bulan . " " . $keterangan_data[$key]->tahun,
				'aktual' => $keterangan_data[$key]->jumlah,
				'predik' => $value,
				'mape' => $mape,
			];
		}

		return $tabel_data;
	}
}
