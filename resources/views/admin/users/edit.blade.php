@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    @include('admin.users._form',['user'=>$user])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
