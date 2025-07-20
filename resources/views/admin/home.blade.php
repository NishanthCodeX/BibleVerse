@extends('layout.admin.master')
@section('xmt_tit', 'Create Service Admin')

@section('content')

<div class="container my-5 pb-4">
    <div class="row g-4 pb-4">
        <div class="col-12 col-md-4">
            <a href="/admin/project" class="text-decoration-none text-dark">
                <div class="card h-100 bg-dark-subtle">
                    {{-- <img src="/image/admin/settings.png" class="card-img-top" alt="Service"> --}}
                    <div class="card-body text-center">
                        <h5 class="card-title">Project Control</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4">
            <a href="/admin/settings" class="text-decoration-none text-dark">
                <div class="card h-100 bg-dark-subtle">
                    {{-- <img src="/image/admin/settings.png" class="card-img-top" alt="Service"> --}}
                    <div class="card-body text-center">
                        <h5 class="card-title">Settings</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4">
            <a href="/admin/password" class="text-decoration-none text-dark">
                <div class="card h-100 bg-dark-subtle">
                    {{-- <img src="/image/admin/admin.jpg" class="card-img-top" alt="Admin"> --}}
                    <div class="card-body text-center">
                        <h5 class="card-title">Password</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="py-3 text-center">
        <h5>Project Link</h5>
        <p><a href="{{config('app.url')}}/master/{{$ulink}}" class="text-dark text-decoration-none" target="_blank">{{config('app.url')}}/master/{{$ulink}}</a></p>
    </div>
    
</div>

@endsection
