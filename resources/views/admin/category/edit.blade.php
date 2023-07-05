@extends('layouts.seller')
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

                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.category.update', ['id'=>$category->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Nama : </label>
                                        <div class="col-lg-5 col-md-6 col-sm-12">
                                            <input name="name" value="{{ $category->name }}" type="text"
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
@endsection
