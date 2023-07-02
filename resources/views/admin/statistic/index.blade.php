@extends('layouts.admin')
@section('contents')
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
