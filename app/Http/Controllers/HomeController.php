<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $feeds = Postingan::orderBy('created_at', 'desc')->paginate(7);
        return view('home', [
            'feeds' => $feeds
        ]);
    }

    public function addFeed(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'image|max:8192'
        ]);

        $file_name = date('Ymd_His') . '.' . $request->file('foto')->getClientOriginalExtension();
        Storage::disk('public')->makeDirectory('/foto/feed');
        $path = Storage::disk('public')->putFileAs('/foto/feed', $request->file('foto'), $file_name);
        Postingan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar_path' => $path
        ]);

        return redirect(route('home'))->with(['success' => true]);
    }

    public function deleteFeed(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Postingan::findOrFail($request->id)->delete();
        return redirect(route('home'))->with(['success-delete' => true]);
    }
}
