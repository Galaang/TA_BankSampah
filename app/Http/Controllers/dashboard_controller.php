<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;


class dashboard_controller extends Controller
{
    public function index()
    {
        //saldo user
        $user = Auth::user();
        $saldo = $user->saldo ?? 0;

        $currentMonth = Carbon::now()->month;
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $currentMonthName = $namaBulan[$currentMonth];
        $currentYear = Carbon::now()->year;

        //chart penjualan
        $penjualan = Penjualan::select('jenis_sampah', DB::raw('SUM(berat_sampah) as total_penjualan'))
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->groupBy('jenis_sampah')
            ->get();

        //penjualan dalam 1 tahun
        $penjualanperbulan = Penjualan::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(DISTINCT user_id) as jumlah_orang')
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->toArray();

        // Membuat array dengan jumlah orang yang menjual per bulan
        $jumlahOrangPerBulan = array_fill(1, 12, 0);
        foreach ($penjualanperbulan as $data) {
            $jumlahOrangPerBulan[$data['month']] = $data['jumlah_orang'];
        }

        // Query untuk menghitung jumlah field (baris) per bulan dalam satu tahun
        $jumlahFieldPerBulan = Penjualan::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as jumlah_field')
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Membuat array dengan jumlah field per bulan
        $jumlahFieldPerBulanArray = array_fill(1, 12, 0);
        foreach ($jumlahFieldPerBulan as $data) {
            // Mengambil nilai bulan dari hasil query
            $bulan = $data->month;
            $jumlahFieldPerBulanArray[$bulan] = $data->jumlah_field;
        }

        //chart jumlah nasabah
        $jmlnasabah = User::where('role_id', '2')->count();

        // jumlah saldo dalam 1 bulan
        $user = auth()->user();
        $jmlsaldonasabah = Penjualan::where('user_id', $user->id)->sum('harga_total');
        $jmlsaldo = Penjualan::sum('harga_total');

        // penjualan sampah nasabah
        $sampah1bulannasabah = Penjualan::select('jenis_sampah', DB::raw('SUM(berat_sampah) as total_penjualan'))
            ->where('user_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->groupBy('jenis_sampah')
            ->get();

        $label_nasabah = $sampah1bulannasabah->pluck('jenis_sampah');
        $data_penjualan_nasabah = $sampah1bulannasabah->pluck('total_penjualan');

        //penjualan dalam 1 tahun
        // $penjualanpertahunanasabah = Penjualan::select(
        //     DB::raw('MONTH(created_at) as month'),
        //     DB::raw('SUM(*) as jumlah_field')
        // )
        //     ->where('user_id', $user->id)
        //     ->whereYear('created_at', $currentYear)
        //     ->groupBy(DB::raw('MONTH(created_at)'))
        //     ->orderBy(DB::raw('MONTH(created_at)'))
        //     ->get();
        // dd($penjualanpertahunanasabah);
        return view('dashboard', compact('saldo', 'penjualan', 'penjualanperbulan', 'jumlahOrangPerBulan', 'jmlnasabah', 'jumlahFieldPerBulanArray', 'jmlsaldo', 'currentMonthName', 'jmlsaldonasabah', 'data_penjualan_nasabah', 'label_nasabah'));
    }
}
