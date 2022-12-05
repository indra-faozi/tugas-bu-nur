<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js' integrity='sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==' crossorigin='anonymous'></script>
    <title>Mahasiswa</title>
</head>

<style>
    .table td.title{
        width: 150px;
    }
</style>

<body>
    <div class="container">
        {{-- <h1>PENDAFTARAN MAHASISWA BARU</h1> --}}

        <form action="">
            <table class="table table-bordered">

                <tr>
                    <td class="bg-success text-white" colspan="2">BIODATA</td>
                </tr>

                <tr>
                    <td class="title">Nama Calon Mahasiswa<span class="text-danger">*</span></td>
                    <td><span>{{$data->nama_calon_mahasiswa}}</span></td>
                </tr>

                <tr>
                    <td class="title">No. Induk Siswa Nasional Ijazah</td>
                    <td><span>{{$data->nisn}}</span></td>
                </tr>

                <tr>
                    <td class="title">Jenis Kartu Identitas<span class="text-danger">*</span></td>
                    <td><span>{{$data->jenis_kartu_identitas}}</span></td>
                </tr>

                <tr>
                    <td class="title">Isi No. Kartu Identitas<span class="text-danger">*</span></td>
                    <td><span>{{$data->no_kartu_identitas}}</span></td>
                </tr>

                <tr>
                    <td class="title">Jenis Kelamin<span class="text-danger">*</span></td>
                    <td><span>{{$data->jenis_kelamin}}</span></td>
                </tr>

                <tr>
                    <td class="title">Agama<span class="text-danger">*</span></td>
                    <td><span>{{$data->agama}}</span></td>
                </tr>

                <tr>
                    <td class="title">Tempat Lahir<span class="text-danger">*</span></td>
                    <td><span>{{$data->tempat_lahir}}</span></td>
                </tr>

                <tr>
                    <td class="title">Tanggal Lahir<span class="text-danger">*</span></td>
                    <td><span>{{$data->tanggal_lahir}}</span></td>
                </tr>
                <tr>
                    <td class="title">Alamat Lengkap<span class="text-danger">*</span></td>
                    <td><span>{{$data->alamat_lengkap}}</span></td>
                </tr>

                <tr>
                    <td class="title">No. WA<span class="text-danger">*</span></td>
                    <td><span>{{$data->no_wa}}</span></td>
                </tr>

                <tr>
                    <td class="title">Alamat Email<span class="text-danger">*</span></td>
                    <td><span>{{$data->email}}</span></td>
                </tr>

                <tr>
                    <td class="title">No. Telepon Wali<span class="text-danger">*</span></td>
                    <td><span>{{$data->no_telepon_wali}}</span></td>
                </tr>

                <tr>
                    <td class="bg-success text-white" colspan="2">SUMBER INFORMASI</td>
                </tr>

                <tr>
                    <td class="title">Sumber Informasi<span class="text-danger">*</span></td>
                    <td>
                        @foreach ($sumber_informasi as $item)
                            <ul>
                                <li>{{$item['sumber_informasi']}}</li>
                                @if ($item['sumber_informasi'] == 'Teman')
                                    {{"Nama Pemberi Referensi: " . $data->nama_pemberi_referensi}}
                                @endif
                            </ul>
                        @endforeach
                    <td>
                </tr>

                {{-- {{var_dump($data->sumber_informasi)}} --}}

            </table>
        </form>
    </div>
</body>
</html>