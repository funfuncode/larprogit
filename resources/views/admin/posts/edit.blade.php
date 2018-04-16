@extends('layouts.admin')

@section('content')
   <h1>Edit post</h1>

   <div class="row">

      <div class="col-md-3">
         <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->getPath($post->photo->file) : ''}}" alt="">
         @if(! $post->photo)
            <div>no post photo</div>
         @endif
      </div>

   <div class="col-md-9">
      {!! Form::model($post, ['method'=>'patch', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}

      <div class="form-group">
         {!! Form::label('title', 'Title:') !!}
         {!! Form::text('title', null, ['class'=>'form-control']) !!}
      </div>

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
         {!! Form::select('category_id', [''=>'Choose options'] + $categories, $post->category ? $post->category->id : null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
         {!! Form::label('photo_id', 'Photo:') !!}
         {!! Form::file('photo_id') !!}
      </div>

      <div class="form-group">
         {!! Form::submit('Update post', ['class'=>'btn btn-primary col-xs-2']) !!}
      </div>

      {!! Form::close() !!}


      {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}

      <div class="form-group">
         {!! Form::submit('Delete post', ['class'=>'btn btn-danger pull-right col-xs-2']) !!}
      </div>

      {!! Form::close() !!}

   @include('includes.form_error')

   </div>
</div>
@endsection
