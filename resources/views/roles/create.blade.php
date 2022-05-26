@extends('layouts.app');
@section('main')
<div class="main-content">
    <div class="section__content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="table table--no-card m-b-30">
                        @include('partials.messages')
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Role Name</label>
                                                <input type="text" name="name" placeholder="Enter a Role name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Permissions</label>
                                                <div class="form-check" style="margin-left: 1.2rem;">
                                                    <input class=" form-check-input au-checkmark" type="checkbox"  value="" id="checkPermissionall">
                                                    <label class="form-check-label" for="checkPermissionall">
                                                      All
                                                    </label>
                                                </div>
                                                  <hr>
                                                @foreach ($permissions as $permission)
                                                <div class="form-check" style="margin-left: 1.2rem; margin-top:5px;">
                                                    <label for="checkPermission{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                                                    <input type="checkbox" name="permissions[]" class="form-check-input form-group au-checkmark " id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                </div>
                                                @endforeach
                                            </div>
                                            <input type="submit" class="btn btn-primary float-left" name="submit" value="Add">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('partials.scripts')
                <script>
                    $("#checkPermissionall").click(function(){
                        if($(this).is(':checked')){
                            {{--  check all the checkbox   --}}
                            $('input[type=checkbox]').prop('checked', true);
                        }else{
                            {{--  un check all the checkbox   --}}
                            $('input[type=checkbox]').prop('checked', false);
                        }


                    });
                </script>
@endsection
