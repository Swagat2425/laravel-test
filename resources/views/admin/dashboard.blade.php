@extends('layouts.admin')

@push('styles')

@endpush

@section('content')
    
    <main class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="bg-body-tertiary p-5 rounded text-center">
                    <h3>Total Blogs</h3>
                    <h1 class="text-dark">{{ $blogs }}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="bg-body-tertiary p-5 rounded text-center">
                    <h3>Total Customers</h3>
                    <h1 class="text-dark">{{ $users }}</h1>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')

@endpush