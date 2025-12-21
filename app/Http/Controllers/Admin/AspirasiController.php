<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    /**
     * Display a listing of aspirations
     */
    public function index(Request $request)
    {
        $query = Aspiration::with('user');

        // Filter by status
        if ($request->filled('status')) {
            $query->status($request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $aspirations = $query->latest()->paginate(15);

        return view('admin.pengaduan', compact('aspirations'));
    }

    /**
     * Display the specified aspiration
     */
    public function show($id)
    {
        $aspiration = Aspiration::with(['user', 'responder'])->findOrFail($id);

        return view('admin.pengaduan-show', compact('aspiration'));
    }

    /**
     * Respond to an aspiration
     */
    public function respond(Request $request, $id)
    {
        $request->validate([
            'admin_response' => ['required', 'string'],
            'status' => ['required', 'in:diproses,selesai,ditolak'],
        ], [
            'admin_response.required' => 'Respon wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        $aspiration = Aspiration::findOrFail($id);

        $aspiration->update([
            'admin_response' => $request->admin_response,
            'status' => $request->status,
            'responded_by' => Auth::id(),
            'responded_at' => now(),
        ]);

        return redirect('/admin/pengaduan')->with('success', 'Respon berhasil dikirim.');
    }

    /**
     * Update aspiration status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:baru,diproses,selesai,ditolak'],
        ]);

        $aspiration = Aspiration::findOrFail($id);

        $aspiration->update([
            'status' => $request->status,
            'responded_by' => Auth::id(),
            'responded_at' => now(),
        ]);

        return back()->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Remove the specified aspiration
     */
    public function destroy($id)
    {
        $aspiration = Aspiration::findOrFail($id);

        // Delete image if exists
        if ($aspiration->image) {
            \Storage::disk('public')->delete($aspiration->image);
        }

        $aspiration->delete();

        return redirect('/admin/pengaduan')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
