@extends('layouts.app')

@push('css-libraries')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.4.0/select.bootstrap4.min.css">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">{{ $pageTitle }}</a></div>
                <div class="breadcrumb-item active">List {{ $pageTitle }}</div>
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

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data {{ $pageTitle }} &mdash; </h4>
                            <a href="{{ route('app.aduan.create') }}" class="btn btn-primary">Tambah {{ $pageTitle }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="tableAduan">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Aduan</th>
                                        <th>Isi Aduan</th>
                                        <th>Status</th>
                                        <th>Pengadu</th>
                                        <th>Ditambahkan Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($aduans as $aduan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $aduan->judul_aduan }}</td>
                                            <td>{!! $aduan->isi_aduan !!}</td>
                                            <td>
                                                @if($aduan->status_aduan === 'need_review')
                                                    <span class="badge badge-warning">{{ $aduan->status }}</span>
                                                @elseif($aduan->status_aduan === 'approved')
                                                    <span class="badge badge-success">{{ $aduan->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $aduan->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $aduan->user->name }}</td>
                                            <td>{{ $aduan->created_at }}</td>
                                            <td style="display: flex" class="text-center">
                                                <a href="{{ route('app.aduan.show', $aduan) }}" data-toggle="tooltip" title="" class="btn btn-warning btn-warning mr-2" data-original-title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('app.aduan.edit', $aduan) }}" data-toggle="tooltip" title="" class="btn btn-info btn-action mr-2" data-original-title="Ubah"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('app.aduan.destroy', $aduan) }}" id="formDelete" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button id="btnDelete" class="btn btn-danger" data-toggle="tooltip" data-original-title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js-libraries')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {
            $('#tableAduan').DataTable();
        });

        $('#btnDelete').click(function (e) {
            var form = $(this).closest("#formDelete");
            e.preventDefault();
            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat mengembalikan data ini!",
                icon: "warning",
                buttons: ['Batal', 'Ya Hapus!'],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Dibatalkan");
                    }
                });
        })
    </script>
@endpush
