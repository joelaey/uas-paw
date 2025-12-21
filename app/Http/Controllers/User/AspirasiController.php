<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AspirasiController extends Controller
{
    /**
     * Show form to create new aspiration
     */
    public function create()
    {
        return view('user.pengaduan');
    }

    /**
     * Store a new aspiration
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'], // 5MB max
        ], [
            'title.required' => 'Judul pengaduan wajib diisi.',
            'location.required' => 'Lokasi pengaduan wajib diisi.',
            'content.required' => 'Isi laporan wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('aspirations', 'public');
        }

        Aspiration::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'location' => $validated['location'],
            'content' => $validated['content'],
            'image' => $imagePath,
            'status' => 'baru',
        ]);

        return redirect('/user/riwayat')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Show aspiration history
     */
    public function riwayat(Request $request)
    {
        $user = Auth::user();

        $aspirations = $user->aspirations()
            ->latest()
            ->paginate(10);

        return view('user.riwayat', compact('aspirations'));
    }

    /**
     * Show aspiration detail
     */
    public function show($id)
    {
        $aspiration = Aspiration::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.riwayat-detail', compact('aspiration'));
    }
}
