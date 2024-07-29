@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('data-users.create') }}" class="btn btn-success btn-labeled">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Tambah
                    </a>
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        <a href="{{ route('data-users.edit', $u->id) }}" class="btn btn-warning btn-labeled">
                                            <span class="btn-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            Edit
                                        </a>
                                        |
                                        <form action="{{ route('data-users.destroy', $u->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-labeled">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                Delete
                                            </button>
                                        </form>
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
