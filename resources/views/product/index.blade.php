@extends('layouts.app')
@section('content')
    <div style="margin-top: 80px;">
        <div class="pb-3" style="background-color: #1D8AEF;">
            <div class="text-center pt-4 pb-2">
                <h2 class="bold-weight text-white">Produk Kami</h2>
            </div>
            <form action="/products">
                <div class="col-md-6 mx-auto">
                    <div class="input-group mb-3 normal-weight">
                        <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
                        <select class="form-select" name="category">
                            <option value="">Semua Kategori</option>
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-secondary bold-weight" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mx-4 mt-4">
            @foreach ($viewData['products'] as $product)
                <div class="col-md-2 mb-4">
                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="text-decoration-none">
                        <div class="card product-card border-0">
                            <div class="card-img">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded">
                                {{-- <img src="{{ asset('img/lorem.png') }}" alt="" class="img-fluid rounded"> --}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title bold-weight">{{ $product->name }}</h5>
                                <p class="card-text normal-weight">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text normal-weight">{{ $product->category->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $viewData['products']->links() }}
        </div>
    </div>
@endsection
