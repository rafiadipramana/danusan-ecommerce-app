@extends('layouts.admin')
@section('contents')
    <div class="col">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="card-body mt-2">
                        @if ($errors->any())
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Nama : </label>
                                        <div class="col-lg-5 col-md-6 col-sm-12">
                                            <input name="name" value="{{ old('name') }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
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
                                    <th class="table-primary">No.</th>
                                    <th class="table-primary">Nama Kategori</th>
                                    <th class="table-primary">Edit</th>
                                    <th class="table-primary">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}">
                                                <button class="btn btn-warning">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.category.delete', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
