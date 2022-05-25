@extends('layouts.app');
@section('main')
<div class="main-content">
    <div class="section__content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="table table--no-card m-b-30">
                        <form action="" method="">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Role Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Permissions</label>
                                                @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" name="permissions[]" class=" form-group au-checkmark " id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                    <label for="checkPermission{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary float-left" name="submit" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
