@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Asisten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Asisten</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                        <a class="btn btn-success" data-toggle="modal" data-target="#modalStore">
                            <i class="fas fa-plus"></i>
                        </a>
                            
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role_name }}</td>
                                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Alternatif</label>
                                                        <input type="text" disabled class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-info" data-toggle="modal"
                                                data-target="#modal">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
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
    </section>
</div>

<div class="modal fade" id="modalStore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Store</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
<form method="POST" action="{{ route('asistenSave') }}" enctype="multipart/form-data">
@csrf

<label for="name" >{{ __('Nama') }}</label>
<input type="text" name="name" value="{{ old('name') }}">

<label for="email" >{{ __('Email') }}</label>
<input type="email" name="email" value="{{ old('email') }}">

<label for="password" >{{ __('Password') }}</label>
<input type="password" name="password" value="{{ old('password') }}">

<label for="role_id" >{{ __('role_id') }}</label>
<input type="role_id" name="role_id" value="{{ old('role_id') }}">

<button type="submit">
{{ __('Simpan') }}
</button>

</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection