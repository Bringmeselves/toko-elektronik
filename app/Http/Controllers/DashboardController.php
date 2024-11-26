<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Tugas;

class DashboardController extends Controller
{
    // Menampilkan data dashboard
    public function index()
    {
        // Data Statistik Dummy (contoh) - Gantikan dengan data dari database Anda
        $data = [
            'pendapatan_bulanan' => 40000,
            'pendapatan_tahunan' => 215000,
            'persentase_tugas' => 50,
            'permintaan_penjualan' => 18,
        ];

        // Data untuk grafik pendapatan bulanan
        $pendapatanBulanan = [
            'Jan' => 5000,
            'Feb' => 7000,
            'Mar' => 10000,
            'Apr' => 12000,
            'May' => 15000,
            'Jun' => 13000,
            'Jul' => 14000,
            'Aug' => 16000,
            'Sep' => 18000,
            'Oct' => 20000,
            'Nov' => 25000,
            'Dec' => 30000,
        ];

        // Data untuk grafik sumber pendapatan
        $sumberPendapatan = [
            'Produk A' => 40,
            'Produk B' => 35,
            'Produk C' => 25,
        ];

        // Kirim data ke view 'admin.dashboard'
        return view('admin.dashboard', compact('data', 'pendapatanBulanan', 'sumberPendapatan'));
    }
}
