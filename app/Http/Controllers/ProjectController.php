<?php

namespace App\Http\Controllers;

use App\Models\Akad;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::orderBy('created_at', 'desc')->paginate(20);
        return view('projects', ['proyeks' => $proyeks]);
    }

    public function detailPage($proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        return view('project_detail', ['proyek' => $proyek]);
    }

    public function crudPage($type, $id = null)
    {
        if ($type != 'create' && $type != 'edit') {
            return redirect()->back();
        }
        $akad = Akad::orderBy('nama', 'asc')->get();
        $project = null;
        if ($type == 'edit') {
            $project = Proyek::findOrFail($id);
        }
        return view('project_crud', ['akad' => $akad, 'proyek' => $project, 'type' => $type]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string',
            'dana_yang_dibutuhkan' => 'required|integer',
            'deskripsi' => 'required|string',
            'foto' => 'image|max:8192|mimes:jpeg,jpg,png',
            'tanggal_mulai_proyek' => 'required|date',
            'tanggal_berakhir_proyek' => 'required|date|after_or_equal:tanggal_mulai_proyek',
            'tanggal_berakhir_galang_dana' => 'required|date',
            'akad' => 'required'
        ]);

        $file_name = date('Ymd_His') . '.' . $request->file('foto')->getClientOriginalExtension();
        Storage::disk('public')->makeDirectory('/foto/proyek');
        $path = Storage::disk('public')->putFileAs('/foto/proyek', $request->file('foto'), $file_name);

        Proyek::create([
            'nama' => $request->nama_proyek,
            'deskripsi' => $request->deskripsi,
            'dana_dibutuhkan' => $request->dana_yang_dibutuhkan,
            'foto_produk' => $path,
            'waktu_pengerjaan_proyek_mulai' => date('Y-m-d', strtotime($request->tanggal_mulai_proyek)),
            'waktu_pengerjaan_proyek_berakhir' => date('Y-m-d', strtotime($request->tanggal_berakhir_proyek)),
            'tanggal_pendanaan_dibuka' => date('Y-m-d'),
            'tanggal_pendanaan_ditutup' => date('Y-m-d', strtotime($request->tanggal_berakhir_galang_dana)),
            'akad_id' => $request->akad
        ]);

        return redirect()->to(route('projects.index'))->with(['success' => 'true', 'message' => 'Proyek berhasil ditambahkan.']);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_proyek' => 'required|string',
            'dana_yang_dibutuhkan' => 'required|integer',
            'deskripsi' => 'required|string',
            'foto' => 'image|max:8192|mimes:jpeg,jpg,png',
            'tanggal_mulai_proyek' => 'required|date',
            'tanggal_berakhir_proyek' => 'required|date|after_or_equal:tanggal_mulai_proyek',
            'tanggal_berakhir_galang_dana' => 'required|date',
            'akad' => 'required'
        ]);
        $proyek = Proyek::findOrFail($request->id);
        $proyek->update([
            'nama' => $request->nama_proyek,
            'deskripsi' => $request->deskripsi,
            'dana_dibutuhkan' => $request->dana_yang_dibutuhkan,
            'waktu_pengerjaan_proyek_mulai' => date('Y-m-d', strtotime($request->tanggal_mulai_proyek)),
            'waktu_pengerjaan_proyek_berakhir' => date('Y-m-d', strtotime($request->tanggal_berakhir_proyek)),
            'tanggal_pendanaan_dibuka' => date('Y-m-d'),
            'tanggal_pendanaan_ditutup' => date('Y-m-d', strtotime($request->tanggal_berakhir_galang_dana)),
            'akad_id' => $request->akad
        ]);
        if($request->foto){
            $file_name = date('Ymd_His') . '.' . $request->file('foto')->getClientOriginalExtension();
            Storage::disk('public')->makeDirectory('/foto/proyek');
            $path = Storage::disk('public')->putFileAs('/foto/proyek', $request->file('foto'), $file_name);

            $proyek->update([
                'foto_produk' => $path
            ]);
        }

        return redirect()->to(route('projects.index'))->with(['success' => 'true', 'message' => 'Proyek berhasil diubah.']);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        Proyek::findOrFail($request->id)->delete();
        return redirect()->to(route('projects.index'))->with(['success' => 'true', 'message' => 'Proyek berhasil dihapus.']);
    }
}

