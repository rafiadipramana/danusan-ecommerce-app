@extends('layouts.app')
@section('content')
    <div class="p-4 normal-weight" style="margin-top: 80px;">
        <div class="col p-2">
            <div class="row">
                <a class="d-flex flex-column col-3 mb-2 px-0 text-decoration-none" href="/products">
                    <button class="btn btn-danger bold-weight"><i class="fa-solid fa-arrow-left mx-2"></i>Kembali</button>
                </a>
            </div>
            <div class="row">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{ asset('/storage/' . $viewData['product']->image) }}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <div class="card mx-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <h2><strong>{{ $viewData['product']->name }}</strong></h2>
                                    <h3>{{ 'Rp ' . number_format($viewData['product']->price, 0, ',', '.') }}</h3>
                                </h5>
                                <p class="card-text bold-weight mb-1 mt-3">Deskripsi :</p>
                                <p class="card-text" style="text-align: justify;">
                                    <?php echo nl2br($viewData['product']->description); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col">
                            <div class="card p-2 mb-2">
                                <div class="card-title mb-0">
                                    <h5 class="p-1"><strong>Atur Jumlah</strong></h5>
                                </div>
                                {{-- Disini nanti akan ditambahkan action untuk memanggil cart.add --}}
                                <form method="POST" action="">
                                    <div class="col justify-content-center">
                                        @csrf
                                        <div class="col p-0 mx-1">
                                            <div class="input-group">
                                                <div class="input-group-text">Jumlah</div>
                                                <input type="number" min="1" max="10"
                                                    class="form-control quantity-input" name="quantity" value="1">
                                            </div>
                                        </div>
                                        <div class="col mt-2 mx-1">
                                            <button class="btn btn-primary text-white shadow w-100"
                                                type="submit"><strong>Tambahkan ke Keranjang</strong></button>
                                        </div>
                                    </div>
                                </form>
                                </p>
                            </div>

                            <div class="card p-2">
                                <div class="card-title mb-0">
                                    <h5 class="p-1"><strong>Penjual</strong></h5>
                                </div>
                                <div class="col justify-content-center">
                                    <div class="col p-0 mx-1">
                                        <p class="bold-weight">
                                            {{ $viewData['product']->seller->name }}
                                        </p>
                                    </div>
                                    <div class="col mt-2 mx-1">
                                        <button class="btn btn-primary text-white shadow w-100" type="submit"><strong>Lihat
                                                Toko</strong></button>
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 border-0 mt-4">
            <h4 class="mx-4"><strong>Produk serupa : </strong></h4>
            <div class="row">
                @foreach ($viewData['other_products'] as $other_product)
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('product.detail', ['id' => $other_product->id]) }}" class="text-decoration-none">
                            <div class="card product-card border-0">
                                <div class="card-img">
                                    <img src="{{ asset('storage/' . $other_product->image) }}" alt=""
                                        class="img-fluid rounded">
                                    {{-- <img src="{{ asset('img/lorem.png') }}" alt="" class="img-fluid rounded"> --}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title bold-weight">{{ $other_product->name }}</h5>
                                    <p class="card-text normal-weight">
                                        {{ 'Rp ' . number_format($other_product->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text normal-weight">{{ $other_product->category->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
