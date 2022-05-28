@extends('layouts.app');
@section('main')
<div class="main-content">
    <div class="section__content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">User Lists</div>
                                <div class="col-md-6">
                                    <a href="{{ route('users.create') }}" class="btn btn-sm float-right btn-primary">Create New User </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table table--no-card m-b-30">
                                <table class="table table-borderless table-striped">
                                    <thead class="shadow" >
                                        <tr>
                                            <th class="text-center">Sl</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                        <tr>
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>

                                            <td class="text-center">
                                                @foreach ($user->roles as $role)
                                                    <span class="badge badge-info mr-1">
                                                        {{ $role->name }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a href="" class="badge btn btn-sm btn-primary">Edit</a>
                                                <a href="" class="badge btn btn-sm btn-danger">Delete</a>
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
        </div>
    </div>
</div>
@endsection
