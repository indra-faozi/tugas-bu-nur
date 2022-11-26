<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_calon_mahasiswa' => 'required',
            'nisn' => 'required|numeric',
            'jenis_kartu_identitas' => 'required',
            'no_kartu_identitas' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat_lengkap' => 'required',
            'no_wa' => 'required|numeric',
            'email' => 'required|email',
            'no_telepon_wali' => 'required|numeric',
            'nama_pemberi_referensi' => 'required',
            'sumber_informasi' => 'required',
        ];

        $messages = [
            "nama_calon_mahasiswa.required" => "Nama Calon Mahasiswa harus diisi",
            "nisn.required" => "NISN harus diisi",
            "nisn.numeric" => "NISN harus berupa angka",
            "no_kartu_identitas.required" => "No Kartu Identitas harus diisi",
            "no_kartu_identitas.numeric" => "No Kartu Identitas harus berupa angka",
            "jenis_kartu_identitas.required" => "Jenis Kartu Identitas harus dipilih",
            "jenis_kelamin.required" => "Jenis Kelamin harus dipilih",
            "agama.required" => "Agama harus dipilih",
            "tempat_lahir.required" => "Tempat Lahir harus diisi",
            "tanggal_lahir.required" => "Tanggal Lahir harus diisi",
            "alamat_lengkap.required" => "Alamat Lengkap harus diisi",
            "email.required" => "Alamat Email harus diisi",
            "email.email" => "Masukkan format email yang benar",
            "no_telepon_wali.required" => "Nama Telepon Wali harus diisi",
            "no_telepon_wali.numeric" => "Nama Telepon Wali harus berisi angka",
            "nama_pemberi_referensi.required" => "Nama Pemberi Referensi harus diisi",
            "sumber_informasi.required" => "Sumber Informasi harus dipilih minimal 1",
            "no_wa.required" => "No WA harus diisi",
            "no_wa.numeric" => "No WA harus berupa angka",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('mahasiswas.index')->withErrors($validator)->withInput();
        }
        $data = [
            'data' => $request->all()
        ];

        return view('mahasiswa.result', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
