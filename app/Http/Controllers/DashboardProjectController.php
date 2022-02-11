<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use App\Models\Proyek;
use App\Models\TransaksiProyek;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardProjectController extends Controller
{
    public function index()
    {
        $projects = Proyek::all();
        $investors = User::all();
        return view('dashboard', [
            'investors' => $investors,
            'projects' => $projects
        ]);
    }

    public function list_investor()
    {
        $projects = Proyek::all();
        $investors = User::all();
        return view('dashboard_list_investor', [
            'investors' => $investors
        ]);
    }

    public function detail($id)
    {
        $project = Proyek::findOrFail($id);
        $investors = User::all();
        return view('dashboard_project_detail', ['project' => $project, 'investors' => $investors]);
    }

    public function addTransaksi(Request $request, $id)
    {
        $this->validate($request, [
            'pemasukan_kotor' => ['required', 'integer'],
            'pemasukan_bersih' => ['required', 'integer'],
            'total_penjualan' => ['required', 'integer']
        ]);
        //Untuk mencari apakah proyek memang ada
        $proyek = Proyek::findOrFail($id);
        TransaksiProyek::create([
            'proyek_id' => $proyek->id,
            'total_penjualan' => $request->total_penjualan,
            'pemasukan_kotor' => $request->pemasukan_kotor,
            'pemasukan_bersih' => $request->pemasukan_bersih
        ]);
        //Untuk ini aku gk tau mau dikasih pesan sukses apa
        return redirect()->to(route('dashboard.index'))->with(['success'=>true,'message'=>'Proyek berhasil diupdate']);
    }

    public function addInvestasi(Request $request, $id)
    {
        $this->validate($request, [
            'total_investasi' => ['required', 'integer'],
            'investor' => ['required']
        ]);
        //Untuk mencari apakah proyek memang ada
        $proyek = Proyek::findOrFail($id);
        Investasi::create([
            'user_id' => $request->investor,
            'proyek_id' => $proyek->id,
            'total_pembiayaan' => $request->total_investasi,
        ]);
        return redirect()->to(route('dashboard.index'))->with(['success'=>true,'message'=>'Investasi berhasil ditambahkan']);
    }
}
