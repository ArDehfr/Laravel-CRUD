@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data User') }}</div>
                <form class="m-3" action="{{ route('data-users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input name="password" type="password" class="form-control" id="password">
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="w-100 btn btn-success">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
