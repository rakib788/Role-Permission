@extends('layouts.app');
@section('main')
<div class="main-content">
    <div class="section__content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">User Lists</div>
                                <div class="col-md-6">
                                    <a href="{{ route('users.create') }}" class="btn btn-sm  btn-primary">Create New User </a>
                                    <a href="" class="btn btn-sm btn-danger" id="deleteAllSelectRecord">Delete Selected</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table table--no-card m-b-30">
                                <table class="table table-borderless ">
                                    <thead class="" >
                                        <tr>
                                            <th><input type="checkbox" name="" class="checkBoxAll" style="border: 1px solid black" id="checkBoxAll">
                                                <label for="checkBoxAll">All</label>
                                            </th>
                                            <th class="text-center">Sl</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                        <tr id="uid{{ $user->id }}">
                                            <td><input type="checkbox" class="checkBoxClass" style="border: 1px solid black" name="ids" value="{{ $user->id }}"></td>
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


                                        @include('partials.scripts')
                                        <script>
                                            $(function(e){
                                                $("#checkBoxAll").click(function(){
                                                    $(".checkBoxClass").prop('checked',$(this).prop('checked'));
                                                });
                                                $('#deleteAllSelectRecord').click(function(e){
                                                    e.preventDefault();
                                                    var allids = [];
                                                    $("input:checkbox[name=ids]:checked").each(function(){
                                                        allids .push($(this).val());
                                                    });
                                                    $.ajax({
                                                        url:"{{ route('user.deleteSelected') }}",
                                                        type:"DELETE",
                                                        data:{
                                                            _token:$("input[name= _token]").val(),
                                                            ids:allids  
                                                        },
                                                        success:function(response){
                                                            $.each(allids, function(key, val){
                                                                $("#uid"+val).remove();
                                                                
                                                            })
                                                        }
                                                    })
                                                });
                                            });
                                        </script>
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
