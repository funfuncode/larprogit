@extends('layouts.admin')

@section('content')
   <h1>Create Post</h1>

   <div class="row">
      <div class="col-md-6 col-md-offset-3">
         {!!Form::open(['method'=>'post', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', [''=>'Choose options'] + $categories, null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id') !!}
         </div>

         <div class="form-group">
            {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}
         </div>

         {!! Form::close() !!}

         @include('includes.form_error')
      </div>
   </div>
@endsection
