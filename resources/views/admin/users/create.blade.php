@extends('layouts.admin')

@section('content')
   <h1 class="title">Create a User</h1>

   <div class="row">
      <div class="col-md-6 col-md-offset-3">
         {!!Form::open(['method'=>'post', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

         <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', [''=>'Choose options'] + $roles, null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', [1=>'active', 0 => 'not active'], 0,  ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::file('file') !!}
         </div>

         <div class="form-group">
            {!! Form::submit('Create user', ['class'=>'btn btn-primary']) !!}
         </div>

         {!! Form::close() !!}

      @include('includes.form_error')

      </div>
   </div>

@endsection
