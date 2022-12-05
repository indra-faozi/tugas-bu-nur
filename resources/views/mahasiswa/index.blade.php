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

<script>
    $(function(){
        let inputReferensi = $('#refFriend');
        let buttonSubmit = $('#buttonSubmit')
        let inputRef = $('#inputRef')
        let syaratDanKetentuan = $('#syaratDanKetentuan')
        let checkboxReferensi = $('.checkboxTeman')

        inputReferensi.hide();

        if(checkboxReferensi.prop('checked')){
            inputReferensi.show()
        }else{
            inputReferensi.hide()
            inputRef.val('unchecked')
        }

        checkboxReferensi.on('change', function(){
            if($(this).prop('checked')){
                inputReferensi.show()
                inputRef.val('')
            }else{
                inputReferensi.hide()
                inputRef.val('unchecked')
            }
        })
        
        if(syaratDanKetentuan.prop('checked') == false){
            buttonSubmit.addClass('disabled')
        }else{
            buttonSubmit.removeAttr('disabled')
        }

        syaratDanKetentuan.on('change', function(){
            if($(this).prop('checked') == false){
                buttonSubmit.addClass('disabled')
            }else{
                buttonSubmit.removeClass('disabled')
            }
        })

    })
</script>

<body>
    <div class="container">
        <h1>PENDAFTARAN MAHASISWA BARU</h1>

        <form action={{ route('mahasiswas.store')}} method="POST">
            @csrf
            <table class="table table-bordered">

                <tr>
                    <td class="bg-success text-white" colspan="2">PENGISIAN BIODATA (Bila Anda Lupa/Tidak Tahu Isi "0"/ Bisa Menyusul)</td>
                </tr>

                <tr>
                    <td class="title">Nama Calon Mahasiswa<span class="text-danger">*</span></td>
                    <td>
                        <input type="text" value="{{old('nama_calon_mahasiswa')}}" class="form-control" placeholder="Nama ..." name="nama_calon_mahasiswa">
                        @error('nama_calon_mahasiswa') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">No. Induk Siswa Nasional Ijazah</td>
                    <td>
                        <input type="text" value="{{old('nisn')}}" class="form-control" placeholder="NISN" name="nisn">
                        @error('nisn') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Jenis Kartu Identitas<span class="text-danger">*</span></td>
                    <td>
                        <select class="form-select" name="jenis_kartu_identitas">
                            <option value="">- Klik Disini Pilih -</option>
                            <option value="KTP" {{old('jenis_kartu_identitas') == 'KTP' ? 'selected' : ''}}>KTP</option>
                            {{-- <option value="PASSPORT" {{old('jenis_kartu_identitas') == 'PASSPORT' ? 'selected' : ''}}>PASSPORT</option> --}}
                            <option value="SIM" {{old('jenis_kartu_identitas') == 'SIM' ? 'selected' : ''}}>SIM</option>
                        </select>
                        @error('jenis_kartu_identitas') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Isi No. Kartu Identitas<span class="text-danger">*</span></td>
                    <td>
                        <input type="text" value="{{old('no_kartu_identitas')}}" class="form-control" placeholder="No Identitas ..." name="no_kartu_identitas">
                        @error('no_kartu_identitas') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Jenis Kelamin<span class="text-danger">*</span></td>
                    <td>
                        <select class="form-select" name="jenis_kelamin">
                            <option value="">- Klik Disini Pilih -</option>
                            <option value="Laki-Laki" {{old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Agama<span class="text-danger">*</span></td>
                    <td>
                        <select class="form-select" name="agama">
                            <option value="">- Klik Disini Pilih -</option>
                            <option value="ISLAM" {{old('agama') == 'ISLAM' ? 'selected' : ''}}>ISLAM</option>
                            <option value="KRISTEN" {{old('agama') == 'KRISTEN' ? 'selected' : ''}}>KRISTEN</option>
                            <option value="BUDHA" {{old('agama') == 'BUDHA' ? 'selected' : ''}}>BUDHA</option>
                            <option value="KATHOLIK" {{old('agama') == 'KATHOLIK' ? 'selected' : ''}}>KATHOLIK</option>
                            <option value="HINDU" {{old('agama') == 'HINDU' ? 'selected' : ''}}>HINDU</option>
                        </select>
                        @error('agama') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Tempat Lahir<span class="text-danger">*</span></td>
                    <td>
                        <input type="text" value="{{old('tempat_lahir')}}" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
                        @error('tempat_lahir') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Tanggal Lahir<span class="text-danger">*</span></td>
                    <td>
                        <input type="date" class="form-control" value="{{old('tanggal_lahir')}}" placeholder="No Identitas ..." name="tanggal_lahir">
                        @error('tanggal_lahir') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>
                <tr>
                    <td class="title">Alamat Lengkap<span class="text-danger">*</span></td>
                    <td>
                        <textarea id="" cols="100" rows="5" name="alamat_lengkap">{{old('alamat_lengkap')}}</textarea>
                        @error('alamat_lengkap') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">No. WA<span class="text-danger">*</span></td>
                    <td>
                        <input type="text" value="{{old('no_wa')}}" class="form-control" placeholder="No.WA ..." name="no_wa">
                        @error('no_wa') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Alamat Email<span class="text-danger">*</span></td>
                    <td>
                        <input type="text" value="{{old('email')}}" class="form-control" placeholder="E-mail" name="email">
                        @error('email') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">No. Telepon Wali<span class="text-danger">*</span></td>
                    <td>
                        <input type="text" value="{{old('no_telepon_wali')}}" class="form-control" placeholder="No Telepon Wali ..." name="no_telepon_wali">
                        @error('no_telepon_wali') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="bg-success text-white" colspan="2">SUMBER INFORMASI & PERNYATAAN</td>
                </tr>

                <tr>
                    <td class="title">Sumber Informasi<span class="text-danger">*</span></td>
                    <td>
                        <ul>

                            @foreach ($sumber_informasi as $item)
                            
                            @if ($item['sumber_informasi'] == 'Teman')
                                <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input checkboxTeman" {{old('sumber_informasi') ? in_array($item['sumber_informasi'], old("sumber_informasi")) ? 'checked' : '' : ''}} value={{$item['id']}}> {{$item['sumber_informasi']}} </li>
                            @else
                                <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input" {{old('sumber_informasi') ? in_array($item['sumber_informasi'], old("sumber_informasi")) ? 'checked' : '' : ''}} value={{$item['id']}}> {{$item['sumber_informasi']}} </li>
                            @endif
                            @endforeach

                            {{-- <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input" {{old('sumber_informasi') ? in_array('Website', old("sumber_informasi")) ? 'checked' : '' : ''}} value="Website"> Website </li>
                            <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input checkboxTeman" {{old('sumber_informasi') ? in_array('Teman', old("sumber_informasi")) ? 'checked' : '' : ''}} value="Teman"> Teman </li>
                            <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input" {{old('sumber_informasi') ? in_array('Brosur', old("sumber_informasi")) ? 'checked' : '' : ''}} value="Brosur"> Brosur </li>
                            <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input" {{old('sumber_informasi') ? in_array('Spanduk', old("sumber_informasi")) ? 'checked' : '' : ''}} value="Spanduk"> Spanduk </li>
                            <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input" {{old('sumber_informasi') ? in_array('Sosialisasi', old("sumber_informasi")) ? 'checked' : '' : ''}} value="Sosialisasi"> Sosialisasi </li>
                            <li><input type="checkbox" name="sumber_informasi[]" class="form-check-input" {{old('sumber_informasi') ? in_array('WA', old("sumber_informasi")) ? 'checked' : '' : ''}} value="WA"> WA </li> --}}
                        </ul>
                        @error('sumber_informasi') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    <td>
                </tr>

                <tr id="refFriend">
                    <td class="title">Jika Referensi Dari Teman</td>
                    <td>
                        <input type="text" value="{{old('nama_pemberi_referensi')}}" id="inputRef" class="form-control" placeholder="Nama Pemberi Referensi ..." name="nama_pemberi_referensi">
                        @error('nama_pemberi_referensi') <div id="emailHelp" class="form-text text-danger">{{$message}}</div> @enderror
                    </td>
                </tr>

                <tr>
                    <td class="title">Pernyataan<span class="text-danger">*</span></td>
                    <td><input type="checkbox" id="syaratDanKetentuan" class="form-check-input" value="WA"> Dengan ini saya menyatakan bahwa data yang saya masukkan benar adanya, dan jika ternyata dikemudian hari ditemukan kesalahan pada data ini baik yang disengaja ataupun tidak disengaja, maka menjadi tanggung jawab saya pribadi.  </td>
                </tr>

                <tr>
                    <td>Apakah data sudah benar?</td>
                    <td><input type="submit" id="buttonSubmit" class="btn btn-success" value="Submit"></td>
                </tr>

            </table>
        </form>
    </div>
</body>
</html>