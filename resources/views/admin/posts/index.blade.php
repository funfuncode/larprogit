@extends('layouts.admin')

@section('content')

   @if(session('post_created'))
      <p class="bg-success">{{ session('post_created') }}</p>
   @endif

   <h1>Posts</h1>

   <table class="table text-center">
      <thead>
         <tr>
            <th class="text-center">Post ID</th>
            <th class="text-center">Post image</th>
            <th class="text-center">User</th>
            <th class="text-center">Category</th>
            <th class="text-center">Title</th>
            <th class="text-center">Body</th>
            <th class="text-center">Created at</th>
            <th class="text-center">Updated at</th>
         </tr>
      </thead>
      <tbody>
         @if($posts)
            @foreach($posts as $post)
               <tr>
                  <td>{{ $post->id }}</td>
                  <td><img height="auto" width="30px" src="{{ $post->photo ? $post->photo->getPath($post->photo->file) : null }}" alt="">{{ $post->photo ? '' : '-' }}</td>
                  <td>{{ $post->user ? $post->user->name : '-' }}</td>
                  <td>{{ $post->category ? $post->category->name : '-' }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->body }}</td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>{{ $post->updated_at->diffForHumans() }}</td>
               </tr>
            @endforeach
         @endif
      </tbody>
   </table>
@endsection
