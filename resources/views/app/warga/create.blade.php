@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('app.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('app.warga.index') }}">Warga</a></div>
                <div class="breadcrumb-item">{{ $pageTitle }}</div>
            </div>
        </div>

        <div class="section-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <p>{{ session()->get('success') }}</p>
                    </div>
                </div>
            @endif
            @if(session()->has('errors'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <p>Data gagal dimasukan, isi inputan dengan benar!</p>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('app.warga.index') }}" class="mr-2"><i class="fas fa-arrow-left"></i></a>
                            <h4>Form {{ $pageTitle }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.warga.store') }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                @method('POST')

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>NIK</label>
                                        <input type="number" name="nik" maxlength="16" class="form-control" placeholder="Masukan NIK" required>
                                        <div class="invalid-feedback">
                                            Isian NIK harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nama Warga</label>
                                        <input type="text" name="nama_warga" class="form-control" placeholder="Masukan nama warga" required>
                                        <div class="invalid-feedback">
                                            Isian nama warga harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Alamat</label>
                                    <textarea class="form-control" name="alamat" style="min-height: 100px" placeholder="Masukan alamat warga" required></textarea>
                                    <div class="invalid-feedback">
                                        Isian alamat harus diisi!
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" maxlength="16" class="form-control" placeholder="Masukan tempat lahir warga" required>
                                        <div class="invalid-feedback">
                                            Isian tempat lahir harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukan tanggal lahir warga" required>
                                        <div class="invalid-feedback">
                                            Isian tanggal lahir harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="pria">Laki-laki</option>
                                            <option value="wanita">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isian jenis kelamin harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen Protestan</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Budha</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isian nama warga harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="no_telp" maxlength="13" class="form-control phone-number" placeholder="Masukan nomor telepon" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Isian nomor telepon harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan pekerjaan warga" required>
                                        <div class="invalid-feedback">
                                            Isian pekerjaan warga harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Status Perkawinan</label>
                                        <select class="form-control" name="status_perkawinan" id="statusPerkawinan" required>
                                            <option value="">Pilih Status Perkawinan</option>
                                            <option value="lajang">Lajang</option>
                                            <option value="menikah">Menikah</option>
                                            <option value="cerai">Cerai</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isian status perkawinan harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="display: none" id="fieldNoKK">
                                        <label>Nomor KK</label>
                                        <input type="number" name="no_kk" id="inputNoKK" class="form-control" placeholder="Masukan nomor KK">
                                        <div class="invalid-feedback">
                                            Isian nomor KK harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('#statusPerkawinan').change(function () {
            let val = $(this).val();

            if (! (val === 'lajang' || val === '')) {
                $('#fieldNoKK').show();
                $('#inputNoKK').attr('required', true);
            } else {
                $('#fieldNoKK').hide();
            }
        })
    </script>
@endpush
