@extends('layouts.app');
@section('main')
<div class="main-content">
    <div class="section__content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="table table--no-card m-b-30">
                        <div class="row">
                            <div class="col-6">Role Lists</div>
                            <div class="col-6">
                                <a href="{{ route('roles.create') }}" class="btn btn-sm float-right btn-primary">Create New Role </a>
                            </div>
                        </div>
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl</th>
                                    <th class="text-center">Role Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role )
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $role->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('roles.edit', $role->id) }}" class="badge btn btn-sm btn-primary">Edit</a>
                                        <a href="" class="badge btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
