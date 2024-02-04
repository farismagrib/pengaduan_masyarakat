@extends('layouts.auth')

@section('page-contents')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome!!</h1>
                                </div>
                                @if (session()->has('auth-message'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('auth-message') }}
                                    </div>
                                @endif
                                @if (session()->has('login-message'))
                                    <div class="alert alert-warning">
                                        {{ session()->get('login-message') }}
                                    </div>
                                @endif
                                <form class="user" action="{{ route('authenticate-petugas') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username"
                                            placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Password"
                                            name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
