<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;

class PengisianController extends Controller
{
    public function index()
    {
        $dataTamu = Kunjungan::all();
        return view('users.bukutamu', compact('dataTamu'));
    }

    public function riwayat()
    {
        $dataTamu = Kunjungan::all();
        return view('users.riwayat', compact('dataTamu'));
    }

    public function pesan()
    {
        $dataTamu = Kunjungan::all();
        return view('users.pesan', compact('dataTamu'));
    }

    public function hasil()
    {
        $dataTamu = Kunjungan::all();
        return view('users.hasil', compact('dataTamu'));
    }

    public function rekap()
    {
        $dataTamuAll = Kunjungan::paginate(10);
        $dataTamuDisetujui = Kunjungan::where('status', 'Disetujui')->paginate(10);
        $dataTamuCatatan = Kunjungan::where('status', 'Disetujui Dengan Catatan')->paginate(10);

        return view('users.rekap', compact('dataTamuAll', 'dataTamuDisetujui', 'dataTamuCatatan'));
    }
    public function hasilKunjung()
    {
        $dataTamu = Kunjungan::all();
        return view('users.hasilKunjung', compact('dataTamu'));
    }

    public function addRiwayat(Request $request)
    {
        $request->validate([
            'tujuan' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'jumlah' => 'required|integer',
            'hp' => 'required',
            'tanggal' => 'required|date',
            'surel' => 'required',
            'waktu' => 'required',
            'pdf_file' => 'nullable|mimes:pdf|max:2048',
        ], [
            'tujuan.required' => 'Tujuan kunjungan wajib diisi.',
            'name.required' => 'Penanggung jawab kunjungan wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'jumlah.required' => 'Jumlah peserta wajib diisi.',
            'jumlah.integer' => 'Jumlah peserta harus berupa angka.',
            'hp.required' => 'Nomor HP wajib diisi.',
            'tanggal.required' => 'Tanggal kunjungan wajib diisi.',
            'tanggal.date' => 'Tanggal kunjungan harus berupa format tanggal yang valid.',
            'waktu.required' => 'Waktu kunjungan wajib diisi.',
            'pdf_file.mimes' => 'File harus berupa PDF.',
            'pdf_file.max' => 'Ukuran file maksimal 2MB.',
            'surel.required' => 'Email wajib diisi',
        ]);

        $filePath = null;
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName); // Simpan ke public/uploads
            $filePath = 'uploads/' . $fileName; // Simpan path relatif
        }

        Kunjungan::create([
            'user_id' => auth()->id(), // Menyimpan user yang sedang login
            'instansi' => auth()->user()->name,
            'tujuan' => $request->tujuan,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'jenis' => auth()->user()->jenisInstansi,
            'jumlah' => $request->jumlah,
            'hp' => $request->hp,
            'surel' => $request->surel,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'pdf_file' => $filePath, // Simpan link ke database
        ]);

        return redirect('/riwayat');
    }
    public function edit($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        return view('users.editRekap', compact('tamu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'hp' => 'required',
            'surel' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'pdf_file' => 'required',
        ]);

        $tamu = Kunjungan::findOrFail($id);
        $tamu->update([
            'tujuan' => $request->tujuan,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'hp' => $request->hp,
            'surel' => $request->surel,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            // 'pdf_file' => $pdfPath,
        ]);

        return redirect('/rekap')->with('success', 'Akun Berhasil di Perbaharui!');
    }
    public function destroy($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        $tamu->delete();

        return redirect('/rekap')->with('success', 'Daftar Riwayat Kunjungan Berhasil di Hapus!');
    }
    public function assignedit($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        return view('users.assign', compact('tamu'));
    }
    public function assignupdate(Request $request, $id)
    {
        $request->validate([
            // 'mentor' => 'required',
            'ulasan' => 'required',

        ]);

        $tamu = Kunjungan::findOrFail($id);
        $tamu->update([
            // 'mentor' => $request->mentor,
            'ulasan' => $request->ulasan,
            // 'status' => true,
        ]);

        return redirect('/hasilKunjung')->with('success', 'Data berhasil diperbarui!');
    }
    public function show($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        return view('users.showRekap', compact('tamu'));
    }
    public function riwayatdestroy($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        $tamu->delete();

        return redirect('/riwayat')->with('success', 'Daftar Riwayat Kunjungan Berhasil di Hapus!');
    }

    public function disetujui($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        // $tamu->update([
        //     'status' => 'Disetujui',
        // ]);
        return view('users.isiPesanbaru', compact('tamu'));
    }
    public function disetujuiUpdate(Request $request, $id)
    {
        $request->validate([
            'mentor' => 'required',

        ]);

        $tamu = Kunjungan::findOrFail($id);
        $tamu->update([
            'mentor' => $request->mentor,
            'status' => 'Disetujui',
            'mail' => 'Disetujui',
        ]);

        return redirect('/rekap')->with('success', 'Data Berhasil Diperbarui!');
    }

    public function disetujuiDgnCtt($id)
    {
        $tamu = Kunjungan::findOrFail($id);
        // $tamu->update([
        //     'status' => 'Disetujui Dengan Catatan',
        // ]);
        return view('users.isiPesan', compact('tamu'));
    }
    public function disetujuiDgnCttupdate(Request $request, $id)
    {
        $request->validate([
            'mentor' => 'required',
            'mail' => 'required',

        ]);

        $tamu = Kunjungan::findOrFail($id);
        $tamu->update([
            'mentor' => $request->mentor,
            'mail' => $request->mail,
            'status' => 'Disetujui Dengan Catatan',
        ]);

        return redirect('/rekap')->with('success', 'Data berhasil diperbarui!');
    }
}
