@extends('layouts.admin')
@section('contents')

@push('styles')
    @livewireStyles()
@endpush

@push('scripts')
    @livewireScripts()
@endpush
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @livewire('user-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
