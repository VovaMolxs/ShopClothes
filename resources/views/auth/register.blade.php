@extends('auth.layouts')
@section('content')
    <section class="content-main mt-80 mb-80">
        <div class="card mx-auto card-login">
            <div class="card-body">
                <h4 class="card-title mb-4">Create an Account</h4>
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" :value="old('name')" placeholder="User Name" type="text">
                        <div class="valid-feedback">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                    </div> <!-- form-group// -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" placeholder="Your email" type="email">

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div> <!-- form-group// -->
                    <div class="mb-3">
                        <label class="form-label">Create password</label>
                        <input class="form-control" name="password" placeholder="Password" type="password">

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div> <!-- form-group// -->
                    <div class="mb-3">
                        <label class="form-label">Confirm password</label>
                        <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password">

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div> <!-- form-group// -->
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100"> Register </button>
                    </div> <!-- form-group// -->
                </form>
                <p class="text-center mb-2">Already have an account? <a href="#">Sign in now</a></p>
            </div>
        </div>
    </section>



@endsection
