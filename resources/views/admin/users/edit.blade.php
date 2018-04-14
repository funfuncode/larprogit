@extends('layouts.admin')

@section('content')
   <h1 class="title">Edit a User</h1>

   <div class="row">
      <div class="col-md-3">
         <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->getPath($user->photo->file) : ''}}" alt="">
         @if(! $user->photo)
            <div>no user photo</div>
         @endif
      </div>
      <div class="col-md-9">
         {!! Form::model($user, ['method'=>'patch', 'action'=> ['AdminUsersController@update', $user->id], 'files'=>true]) !!}

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
            {!! Form::select('is_active', [1=>'active', 0 => 'not active'], null,  ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::file('file') !!}
         </div>

         <div class="form-group">
            {!! Form::submit('Update user', ['class'=>'btn btn-primary']) !!}
         </div>

         {!! Form::close() !!}

      @include('includes.form_error')

      </div>
   </div>

@endsection
