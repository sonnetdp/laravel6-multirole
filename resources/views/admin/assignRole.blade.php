@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2 border-dark"><h4>Name, Email</h4></div>
                            <div class="col-lg-1 border-dark"><h4>Admin</h4></div>
                            <div class="col-lg-1 border-dark"><h4>Manager</h4></div>
                            <div class="col-lg-1 border-dark"><h4>Customer</h4></div>
                            <div class="col-lg-2 border-dark"><h4>Action</h4></div>
                        </div>
                        @foreach($users as $user)
                        <div class="row">
                            <form action="{{url('/admin/role/assign')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="email" value="{{$user->email}}">
                                <div class="col-lg-2"><b>{{$user->name}}</b><br>{{$user->email}}</div>
                                <div class="col-lg-1"><input type="checkbox" name="role_admin" {{ $user->hasRole('Admin')? 'checked':'' }} ></div>
                                <div class="col-lg-1"><input type="checkbox" name="role_manager" {{ $user->hasRole('Manager')? 'checked':'' }} ></div>
                                <div class="col-lg-1"><input type="checkbox" name="role_customer" {{ $user->hasRole('Customer')? 'checked':'' }} ></div>
                                <div class="col-lg-2"><button type="submit">Assign Roles</button></div>
                            </form>
                        </div>
                        <div class="row border-dark"></div>
                        @endforeach
                    </div>


                </div>
            </div>

@endsection
