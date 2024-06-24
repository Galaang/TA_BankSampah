<?php

namespace App\Http\Controllers;

use App\Models\Penarikan_saldo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class Transaksi_controller extends Controller
{
    public function index()
    {
        $saldo = Penarikan_saldo::where('status', 'Diproses')->get();
        return view('transaksi', compact('saldo'));
    }

    public function accsaldo($id)
    {
        $penarikan = Penarikan_saldo::find($id);
        $penarikan->status = 'Diterima';
        $user = User::find($penarikan->user_id);
        $user->saldo -= $penarikan->jumlah_saldo;

        $user->save();

        $penarikan->save();
        return redirect()->back()->with('success', 'Saldo Berhasil Dikirim.');
    }

    public function tariksaldo()
    {
        return view('penarikan_saldo');
    }

    public function saldostore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'jumlah_saldo' => 'required',
        ]);

        // Mengambil input dari request
        $nama = $request->input('nama');
        $no_hp = $request->input('no_hp');
        $jumlah_saldo = $request->input('jumlah_saldo');
        $user = Auth::user();

        // Check if the user has enough balance
        if ($user->saldo < $jumlah_saldo) {
            return redirect()->back()->withErrors(['jumlah_saldo' => 'Saldo tidak cukup.']);
        }

        // Menggunakan PenarikanSaldo tanpa underscore
        Penarikan_saldo::create([
            'user_id' => $user->id,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'jumlah_saldo' => $jumlah_saldo,
            'status' => 'Diproses'
        ]);

        return redirect()->route('dashboard')->with('success', 'Penarikan saldo berhasil diajukan.');
    }

    

    public function riwayat_penarikan()
    {
        $saldo = Penarikan_saldo::where('user_id', Auth::user()->id)->get();
        return view('riwayat_penarikan_saldo', compact('saldo'));
    }
}
