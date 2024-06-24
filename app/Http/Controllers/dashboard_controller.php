<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;



class dashboard_controller extends Controller
{
    public function index()
    {
        //saldo user
        $user = Auth::user();
        $saldo = $user->saldo ?? 0;

        //chart penjualan
        $penjualan = Penjualan::select('jenis_sampah', DB::raw('SUM(berat_sampah) as total_penjualan'))
            ->groupBy('jenis_sampah')
            ->get();

        return view('dashboard', compact('saldo', 'penjualan'));
    }

    // public function provinsi()
    // {
    //     $client = new Client();

    //     try {
    //         // Mengambil data provinsi
    //         $responseProvinces = $client->request('GET', 'https://api.binderbyte.com/wilayah/provinsi?api_key=9b559f9e86e0d27f791f4c273f913a3ad9b7c37fad5a9ea7b344b3fbaa36597b');
    //         $provinces = json_decode($responseProvinces->getBody()->getContents(), true);

    //         if (isset($provinces['status']) && $provinces['status'] == 'success') {
    //             $provincesData = $provinces['data'];
    //         } else {
    //             $provincesData = [];
    //         }

    //     } catch (RequestException $e) {
    //         $provincesData = [];
    //     }

    //     return view('tes', ['provinces' => $provincesData]);
    // }
}
