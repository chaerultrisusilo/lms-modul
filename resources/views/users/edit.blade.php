@extends('layouts.main')
@section('title', 'Add New Users')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Users</h5>
                        <form action="{{ route('users.update', $edit->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="col-form-label">User Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required
                                    value="{{ $edit->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Email *</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required
                                    value="{{ $edit->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Password *</label>
                                <input type="text" class="form-control" name="password" placeholder="Enter Your Pass"
                                    required value="{{ $edit->password }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="is_active" class="form-select">
                                    <option value="1" {{ $edit->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$edit->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Roles *</label>
                                <select name="roles" class="form-select">
                                    <option value="">-- Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ optional($edit->roles->first())->id == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
