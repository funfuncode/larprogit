@extends('layouts.admin')

@section('content')

   @if(session('category_created'))
      <p class="bg-success">{{ session('category_created') }}</p>
   @elseif(session('category_updated'))
      <p class="bg-success">{{ session('category_updated') }}</p>
   @elseif(session('category_deleted'))
      <p class="bg-warning">{{ session('category_deleted') }}</p>
   @endif

<h1>Categories</h1>

<div class="row">

   <div class="col-sm-6">
      {!!Form::open(['method'=>'post', 'action'=>'AdminCategoriesController@store']) !!}

      <div class="form-group">
         {!! Form::label('name', 'Name of category:') !!}
         {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
         {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
      </div>

      {!! Form::close() !!}

      @include('includes.form_error')
   </div>

   <div class="col-sm-6">
      <table class="table text-center">
         <thead>
            <tr>
               <th class="text-center">Category ID</th>
               <th class="text-center">Name</th>
               <th class="text-center">Created at</th>
               <th class="text-center">Updated at</th>
            </tr>
         </thead>
         <tbody>
            @if($categories)
               @foreach($categories as $category)
                  <tr>
                     <td>{{ $category->id }}</td>
                     <td><a href="{{ route('admin.categories.edit', $category->id) }}"> {{ $category->name }} </a></td>
                     <td>{{ $category->created_at->diffForHumans() }}</td>
                     <td>{{ $category->updated_at->diffForHumans() }}</td>
                  </tr>
               @endforeach
            @endif
         </tbody>
      </table>
   </div>
</div>

@endsection()
