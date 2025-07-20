@extends('layout.admin.master')
@section('xmt_tit', 'Create Service Admin')

@push('headcss')
<style>
    body {
        background-color: #0751bf;
    }
</style>
@endpush

@section('content')
<main>
    <div class="d-flex align-items-center py-5" >
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="text-center alert alert-danger" role="alert">:message</div>')) !!}
                    @endif
                    @if (session('error'))
                        <div class="text-center alert alert-danger">
                        {{ session('error') }}
                        </div>
                    @endif
                    <div class="card shadow-lg rounded">
                        <h1 class="fs-4 card-title text-center text-primary pt-5">Admin Login</h1>
                        <div class="card-body cust-p pt-3">
                            <form action="/admin/authenticate" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
                                </div>
                                <div class="text-center pt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection