@extends('layouts.admin')
@section('contents')
    <div class="col">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="card-header bg-primary text-white p-2">
                        <strong>Tambahkan Kategori</strong>
                    </div>
                    <div class="card-body mt-2">
                        @if ($errors->any())
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form enctype="multipart/form-data" method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Nama :</label>
                                        <div class="col-lg-5 col-md-6 col-sm-12">
                                            <input name="name" value="{{ old('name') }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Gambar :</label>
                                        <div class="col-lg-10 col-md-6 col-sm-12">
                                            <input class="form-control" type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" rows="6">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="table-primary">Column 1</th>
                                    <th class="table-primary">Column 2</th>
                                    <th class="table-primary">Column 3</th>
                                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Data 1</td>
                                    <td>Data 2</td>
                                    <td>Data 3</td>
                                    <!-- Tambahkan data lain sesuai kebutuhan -->
                                </tr>
                                <!-- Tambahkan baris data lain sesuai kebutuhan -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
