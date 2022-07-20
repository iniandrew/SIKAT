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
                <div class="breadcrumb-item"><a href="{{ route('app.aduan.index') }}">Agenda</a></div>
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
                            <a href="{{ route('app.aduan.index') }}" class="mr-2"><i class="fas fa-arrow-left"></i></a>
                            <h4>Form {{ $pageTitle }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.aduan.store') }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                @method('POST')

                                <div class="form-group">
                                    <label>Judul Aduan</label>
                                    <input type="text" name="judul_aduan" class="form-control" placeholder="Masukan judul aduan" required>
                                    <div class="invalid-feedback">
                                        Isian judul aduan harus diisi!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Isi Aduan</label>
                                    <textarea class="summernote-simple" name="isi_aduan" placeholder="Masukan isi aduan" required></textarea>
                                    <div class="invalid-feedback">
                                        Isian isi aduan harus diisi!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label >Bukti Aduan</label>
                                    <input type="file" name="bukti_aduan" class="form-control">
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
