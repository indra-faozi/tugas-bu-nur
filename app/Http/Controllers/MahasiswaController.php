<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SumberInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumber_informasi = SumberInformasi::all();
        
        $data = [
            'sumber_informasi' => $sumber_informasi,
        ];
        return view('mahasiswa.index', $data);
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
        $no_telpon = [
            '0852',
            '0853',
            '0811',
            '0812',
            '0813',
            '0821',
            '0822',
            '0851',
        ];
        
        $str_no_telepon = implode(',', $no_telpon);
        
        $rules = [
            'nama_calon_mahasiswa' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:30',
            'nisn' => 'required|numeric|digits:10|unique:mahasiswas,nisn',
            'jenis_kartu_identitas' => 'required',
            'no_kartu_identitas' => 'required|numeric|digits_between:12,16|unique:mahasiswas,no_kartu_identitas',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:40',
            'tanggal_lahir' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'alamat_lengkap' => 'required',
            'no_wa' => 'required|numeric|unique:mahasiswas,no_wa|starts_with:'.$str_no_telepon,
            'email' => 'required|email|unique:mahasiswas,email',
            'no_telepon_wali' => 'required|numeric|starts_with:'.$str_no_telepon,
            'nama_pemberi_referensi' => 'required|regex:/^[\pL\s\-]+$/u',
            'sumber_informasi' => 'required',
        ];

        $messages = [
            "nama_calon_mahasiswa.min" => "Nama Calon Mahasiswa minimal :min",
            "nama_calon_mahasiswa.max" => "Nama Calon Mahasiswa maksimal :max",
            "nama_calon_mahasiswa.required" => "Nama Calon Mahasiswa harus diisi",
            "nisn.required" => "NISN harus diisi",
            "nisn.digits" => "NISN harus berisi :digits digit",
            "nisn.numeric" => "NISN harus berupa angka",
            "nisn.unique" => "NISN sudah digunakan",
            "no_kartu_identitas.required" => "No Kartu Identitas harus diisi",
            "no_kartu_identitas.unique" => "No Kartu Identitas sudah digunakan",
            "no_kartu_identitas.digits_between" => "Minimal angka :min dan maksimal angka :max",
            "no_kartu_identitas.numeric" => "No Kartu Identitas harus berupa angka",
            "jenis_kartu_identitas.required" => "Jenis Kartu Identitas harus dipilih",
            "jenis_kelamin.required" => "Jenis Kelamin harus dipilih",
            "agama.required" => "Agama harus dipilih",
            "tempat_lahir.required" => "Tempat Lahir harus diisi",
            "tempat_lahir.digits_between" => "Minimal huruf :min dan maksimal huruf :max",
            "tanggal_lahir.required" => "Tanggal Lahir harus diisi",
            "tanggal_lahir.before_or_equal" => "Usia harus 18 tahun",
            "alamat_lengkap.required" => "Alamat Lengkap harus diisi",
            "email.required" => "Alamat Email harus diisi",
            "email.email" => "Masukkan format email yang benar",
            "email.unique" => "Email sudah digunakan",
            "no_telepon_wali.required" => "Nama Telepon Wali harus diisi",
            "no_telepon_wali.numeric" => "Nama Telepon Wali harus berisi angka",
            "no_telepon_wali.starts_with" => "Nama Telepon Wali harus diawali: :values",
            "nama_pemberi_referensi.required" => "Nama Pemberi Referensi harus diisi",
            "sumber_informasi.required" => "Sumber Informasi harus dipilih minimal 1",
            "no_wa.required" => "No WA harus diisi",
            "no_wa.numeric" => "No WA harus berupa angka",
            "no_wa.unique" => "No WA sudah digunakan",
            "no_wa.starts_with" => "No WA harus diawali: :values",
            'nama_calon_mahasiswa.regex' => 'Nama Calon Mahasiswa harus berupa huruf',
            'tempat_lahir.regex' => 'Tempat Lahir harus berupa huruf',
            'nama_pemberi_informasi.regex' => 'Nama Pemberi Informasi harus berupa huruf',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('mahasiswas.index')->withErrors($validator)->withInput();
        }

        $str_sumber_informasi = implode(',', $request->sumber_informasi);
        $request->merge(['sumber_informasi' => $str_sumber_informasi]);

        $mahasiswa = Mahasiswa::create($request->all());

        $data = [
            'email' => $mahasiswa->email
        ];

        return redirect()->route('mahasiswas.show', $data['email']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $mahasiswa = Mahasiswa::where('email', $email)->first();
        if(!$mahasiswa) return redirect()->route('mahasiswas.index');

        $id_sumber_informasi_arr = explode(',', $mahasiswa->sumber_informasi);
        
        
        $sumber_informasi = SumberInformasi::all()->whereIn('id', $id_sumber_informasi_arr);

        $data = [
            'data' => $mahasiswa,
            'sumber_informasi' => $sumber_informasi
        ];

        return view('mahasiswa.result', $data);
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
