@extends('admin.manage')

@section('title', 'Active - Create User')

@section('form')
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col">
                    <label for="slug">E-Mail</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="password" id="confirm_password" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col form-footer justify-content-right">
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection
