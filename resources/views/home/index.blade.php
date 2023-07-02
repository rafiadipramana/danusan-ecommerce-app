@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column">
        <div class="vh-100 d-flex flex-column flex-lg-row justify-content-center align-items-center" style="margin-top: 75px">
            <div class="col-12 col-md-4 h-100 d-flex flex-column justify-content-center align-items-center" style="background-color: #1D8AEF;">
                <h1 class="bold-weight text-white">Jual Produk</h1>
            </div>
            <div class="col-md-8 h-100 d-flex flex-column">
                <div id="carouselExample" class="carousel slide mt-auto">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/carousel-placeholder.png') }}" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/carousel-placeholder.png') }}" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/carousel-placeholder.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="m-4">
            <div class="category-card">
                <ul class="category-card-list m-0">
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}">
                            </div>
                        </div>
                    </li>
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}">
                            </div>
                        </div>
                    </li>
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}">
                            </div>
                        </div>
                    </li>
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}"">
                            </div>
                        </div>
                    </li>
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}"">
                            </div>
                        </div>
                    </li>
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}"">
                            </div>
                        </div>
                    </li>
                    <li class="category-card-item">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('img/lorem.png') }}"">
                            </div>
                        </div>
                    </li>
                    <!-- Tambahkan lebih banyak item jika diperlukan -->
                </ul>
            </div>
        </div>
    </div>
@endsection
