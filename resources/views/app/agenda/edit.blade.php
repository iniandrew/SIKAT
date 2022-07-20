@extends('layouts.app')

@push('css-libraries')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('app.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('app.agenda.index') }}">Agenda</a></div>
                <div class="breadcrumb-item">{{ $pageTitle }}</div>
            </div>
        </div>

        <div class="section-body">
            @if(session()->has('error'))
                <div class="alert alert-info alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <p>{{ session()->get('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('app.agenda.index') }}" class="mr-2"><i class="fas fa-arrow-left"></i></a>
                            <h4>Form {{ $pageTitle }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.agenda.update', $agenda) }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label>Judul Agenda</label>
                                    <input type="text" name="judul_agenda" class="form-control" placeholder="Masukan judul agenda" value="{{ $agenda->judul_agenda }}" required>
                                    <div class="invalid-feedback">
                                        Isian judul agenda harus diisi!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Isi Agenda</label>
                                    <textarea class="summernote-simple" name="isi_agenda" placeholder="Masukan isi agenda" required>
                                        {{ $agenda->isi_agenda }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        Isian isi agenda harus diisi!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Tempat Agenda</label>
                                    <input type="text" class="form-control" name="tempat_agenda" placeholder="Masukan tempat agenda" value="{{ $agenda->tempat_agenda }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai_agenda" class="form-control" value="{{ $agenda->tanggal_mulai_agenda }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tanggal_selesai_agenda" class="form-control" value="{{ $agenda->tanggal_selesai_agenda }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Waktu Mulai</label>
                                        <input type="time" name="waktu_mulai" class="form-control" value="{{ $agenda->waktu_mulai }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Waktu Mulai</label>
                                        <input type="time" name="waktu_selesai" class="form-control" value="{{ $agenda->waktu_selesai }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status_agenda" class="form-control" required>
                                            <option value="">Pilih Status Agenda</option>
                                            <option value="published" @if($agenda->status_agenda == 'published') selected @endif>Diterbitkan</option>
                                            <option value="draft" @if($agenda->status_agenda == 'draft') selected @endif>Draft</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Isian status agenda harus diisi!
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

@push('js-libraries')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endpush
