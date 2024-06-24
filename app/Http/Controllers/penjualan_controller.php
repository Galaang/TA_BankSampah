<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class penjualan_controller extends Controller
{
    public function penjualan(Request $request)
    {
        $jenis_sampah = ['Plastik', 'Kertas', 'Logam'];
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
        $penjualan = Penjualan::where('user_id', $user->id)->get();
        
        return view('history_penjualan', compact('penjualan'));
    }
}
