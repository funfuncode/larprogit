@extends('layouts.admin')

@section('content')
   <h1>Edit category</h1>

      {!! Form::model($category, ['method'=>'patch', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}

      <div class="form-group">
         {!! Form::label('name', 'Name of category:') !!}
         {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>


      <div class="form-group">
         {!! Form::submit('Update category', ['class'=>'btn btn-primary col-xs-2']) !!}
      </div>

      {!! Form::close() !!}


      {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}

      <div class="form-group">
         {!! Form::submit('Delete category', ['class'=>'btn btn-danger pull-right col-xs-2']) !!}
      </div>

      {!! Form::close() !!}

   @include('includes.form_error')

@endsection
