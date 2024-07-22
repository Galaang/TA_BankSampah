<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;



class penjualan_controller extends Controller
{
    public function penjualan(Request $request)
    {
        $jenis_sampah = ['Plastik', 'Kertas', 'Logam', 'Besi', 'Botol Beling', 'Elektronik'];
        $user = User::where('role_id', '2')->get();
        $sampah = Sampah::all();
        return view('penjualan', compact('sampah', 'user', 'jenis_sampah'));
    }

    public function getNamaSampah($jenis_sampah)
    {
        $nama_sampah = Sampah::where('jenis_sampah', $jenis_sampah)->get(['nama_sampah', 'harga_sampah']);
        return response()->json($nama_sampah);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_sampah' => 'required|array',
            'nama_sampah' => 'required|array',
            'berat_sampah' => 'required|array',
            'harga_sampah' => 'required|array'
        ]);

        $name = $request->input('name');
        $user = User::where('name', $name)->first();
        $name = $request->input('name');
        $jenis_sampah = $request->input('jenis_sampah');
        $nama_sampah = $request->input('nama_sampah');
        $berat_sampah = $request->input('berat_sampah');
        $harga_sampah = $request->input('harga_sampah');

        $totalHarga = 0;

        for ($i = 0; $i < count($jenis_sampah); $i++) {
            Penjualan::create([
                'user_id' => $user->id,
                'name' => $name,
                'jenis_sampah' => $jenis_sampah[$i],
                'nama_sampah' => $nama_sampah[$i],
                'berat_sampah' => $berat_sampah[$i],
                'harga_total' => $harga_sampah[$i]
            ]);

            $totalHarga += $harga_sampah[$i];
        }

        $user->update(['saldo' => $user->saldo + $totalHarga]);

        return redirect()->route('penjualan')->with('success', 'Data penjualan berhasil disimpan. Total harga: Rp ' . $totalHarga);
    }

    public function riwayatpenjualan()
    {
        $user = Auth::user();
        $penjualan = Penjualan::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->paginate(15);

        return view('history_penjualan', compact('penjualan'));
    }

    public function cetaklaporan()
    {
        $penjualan = Penjualan::orderBy('created_at', 'desc')->paginate(15);
        return view('laporan', compact('penjualan'));
    }

    public function cetakpdf(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $query = Penjualan::query();

        if ($startDate) {
            // Memisahkan tanggal, bulan, dan tahun dari $startDate
            $startDay = date('d', strtotime($startDate));
            $startMonth = date('m', strtotime($startDate));
            $startYear = date('Y', strtotime($startDate));

            $query->whereDay('created_at', '>=', $startDay)
                ->whereMonth('created_at', '>=', $startMonth)
                ->whereYear('created_at', '>=', $startYear);
        }

        if ($endDate) {
            // Memisahkan tanggal, bulan, dan tahun dari $endDate
            $endDay = date('d', strtotime($endDate));
            $endMonth = date('m', strtotime($endDate));
            $endYear = date('Y', strtotime($endDate));

            $query->whereDay('created_at', '<=', $endDay)
                ->whereMonth('created_at', '<=', $endMonth)
                ->whereYear('created_at', '<=', $endYear);
        }


        $penjualans = $query->orderBy('created_at', 'asc')->get();
        $totalPendapatan = $penjualans->sum('harga_total');


        $pdf = PDF::loadView('formPdf', [
            'penjualans' => $penjualans,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalPendapatan' => $totalPendapatan,
        ]);

        return $pdf->stream('laporan_penjualan.pdf');
    }
}
