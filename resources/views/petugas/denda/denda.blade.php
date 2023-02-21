@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <i class="material-icons">monetization_on</i></span>Data Denda
            </h4>
        </div>


        @if (session('success'))
            <div class="alert alert-success alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
                {{ session('fail') }}
            </div>
        @endif
        @php
            $cek_denda = DB::Table('denda')->get();
        @endphp
        <div class="row justify-content-md-center">
            <div class="col-xl-6">
                <section class="hk-sec-wrapper">
                    @if ($cek_denda->count() < 1)
                    <p class="mb-40">
                        <button class="btn btn-success btn-wth-icon btn-sm" data-toggle="modal" data-target="#createdenda">
                            <span class="icon-label">
                                <span class="material-icons">
                                    control_point
                                </span>
                            </span>
                            <span class="btn-text">Tambah Denda</span>
                        </button>
                    </p>
                    @endif
                    <div class="modal fade" id="createdenda" tabindex="-1" role="dialog" aria-labelledby="createdenda"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Tambah Denda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('denda.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="validationCustom01">Nomilan Denda</label>
                                            <input type="number" class="form-control" name="nominal_denda"
                                                id="validationCustom01" placeholder="5000" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-success" type="submit">Simpan
                                            Denda</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nominal Denda</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($denda as $data)
                                                <tr>
                                                    <td>{{ Str::upper($data->nominal_denda) }}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#updatedenda{{ $data->id_denda }}" class="mr-25"
                                                            data-toggle="tooltip" data-original-title="Edit"> <i
                                                                class="icon-pencil"></i> </a>
                                                        <a href="{{ route('denda.destroy', $data->id_denda) }}" data-toggle="tooltip" data-original-title="Hapus"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('denda-delete-form-{{ $data->id_denda }}').submit();">
                                                            <i class="icon-trash txt-danger" style="color: red"></i></a>
                                                            <form id="denda-delete-form-{{ $data->id_denda }}" action="{{ route('denda.destroy', $data->id_denda) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                    </td>
                                                    <div class="modal fade" id="updatedenda{{ $data->id_denda }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="updatedenda{{ $data->id_denda }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Denda</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('denda.update', $data->id_denda) }}" method="post"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01">Nama
                                                                                denda</label>
                                                                            <input type="number" class="form-control"
                                                                                name="nominal_denda" id="validationCustom01"
                                                                                placeholder="5000" value="{{ $data->nominal_denda }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button class="btn btn-success"
                                                                            type="submit">Perbaharui
                                                                            Denda</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2" class="text-center">Nominal Denda Belum Di Atur</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
