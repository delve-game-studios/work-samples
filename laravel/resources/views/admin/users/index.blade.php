@extends('admin.app')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        @include('admin.breadcrumb-partial')

        <div class="container-fluid">
            <div class="animated fadeIn">

                @if (session('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="font-weight-bold">Users</span>
                                <div class="card-header-actions">
                                    {{--<a href="{{ route('admin.users.create') }}" class="btn btn-success">Add User</a>--}}

                                    @if (request()->has('filters'))
                                        <a href="{{ route('admin.users.index') }}" class="class-header-action btn btn-danger">Clear filters</a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-responsive-md table-striped">
                                            <thead>
                                            <tr>
                                                <th class="border-0">Name</th>
                                                <th class="border-0">E-Mail</th>
                                                <th class="border-0 text-center">Notifications</th>
                                                <th class="border-0 text-center">Status</th>
                                                <th class="border-0 text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.users.toggle-notification', $user) }}" title="Toggle Notifications" class="badge badge-{{ $user->canGetNotifications ? 'success' : 'danger' }} p-2">
                                                            {{ $user->canGetNotifications ? 'Enabled' : 'Disabled' }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.users.toggle-status', $user) }}" class="badge badge-{{ $user->status ? 'success' : 'danger' }} p-2">
                                                            {{ $user->status ? 'Active' : 'Inactive' }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.users.edit', $user) }}" title="Edit User" class="btn btn-warning">
                                                            <i class="icon-note"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-danger text-center">No results found.</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
