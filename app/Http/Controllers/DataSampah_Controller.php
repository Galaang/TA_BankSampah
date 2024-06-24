<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataSampah_Controller extends Controller
{
    public function index()
    {
        $sampah= Sampah::all();
        return view('data_sampah', compact('sampah'));
    }

    public function editsampah($id)
    {
        $jenis_sampah = ['Plastik', 'Kertas', 'Logam'];
        $sampah = Sampah::find($id);
        
        return view('editSampah', compact('sampah', 'jenis_sampah'));
    }

    public function tambahsampah()
    {
        $jenis_sampah = ['Plastik', 'Kertas', 'Logam'];
        return view('tambahSampah', compact('jenis_sampah'));
    }

    public function storesampah(Request $request)
    {   
        $validateData =  $request->validate([
            'jenis_sampah' => 'required',
            'nama_sampah' => 'required',
            'harga_sampah' => 'required',
            'foto_sampah' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('foto_sampah')) {
            $imagePath = $request->file('foto_sampah')->store('foto_sampah');
            $validateData['foto_sampah'] = $imagePath;
        }

        $validateData['user_id'] = auth()->user()->id;
        Sampah::create($validateData);
        return redirect('data_sampah')->with('success', 'Data sampah berhasil ditambahkan');
        
    }

    public function updatesampah(Request $request, $id)
{
    $sampah = Sampah::findOrFail($id); // Gunakan findOrFail untuk menangani kasus ketika id tidak ditemukan

    // Validasi input
    $validateData = $request->validate([
        'jenis_sampah' => 'required|string|max:255',
        'nama_sampah' => 'required|string|max:255',
        'harga_sampah' => 'required|numeric',
        'foto_sampah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Menghandle upload file foto_sampah
    if ($request->hasFile('foto_sampah')) {
        // Hapus file lama jika ada
        if ($sampah->foto_sampah) {
            Storage::delete($sampah->foto_sampah);
        }
        // Simpan file baru dan update path-nya di $validateData
        $imagePath = $request->file('foto_sampah')->store('foto_sampah');
        $validateData['foto_sampah'] = $imagePath;
    }

    // Update data sampah
    $sampah->update($validateData);

    // Redirect ke halaman data_sampah dengan pesan sukses
    return redirect()->route('DataSampah')->with('success', 'Data sampah berhasil diupdate');
}


    public function deletesampah($id)
    {
        $sampah = Sampah::find($id);
        try {
            // Cek dan hapus file foto jika ada
            if ($sampah->foto_sampah && Storage::exists($sampah->foto_sampah)) {
                Storage::delete($sampah->foto_sampah);
            }
    
            // Hapus data sampah dari database
            $sampah->delete();
    
            return redirect('data_sampah')->with('success', 'Data sampah berhasil dihapus');
        } catch (\Exception $e) {
            // Menangani kesalahan jika terjadi
            return redirect('data_sampah')->with('error', 'Terjadi kesalahan saat menghapus data sampah');
        }
    }

}
