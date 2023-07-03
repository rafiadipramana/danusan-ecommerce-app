@extends('layouts.seller')
@section('contents')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="table-primary">No.</th>
                                    <th class="table-primary">Pesanan</th>
                                    <th class="table-primary">Pemesan</th>
                                    <th class="table-primary">Terima</th>
                                    <th class="table-primary">Tolak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <button class="btn btn-warning">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">Hapus</button>
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
