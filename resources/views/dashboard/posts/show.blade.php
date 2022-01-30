@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">
			<h2>{{ $post->title }}</h2>
			<a href="/dashboard/posts" class=" btn btn-success">Back to my posts</a>
			<a href="/dashboard/posts/{{ $post->slug }}/edit" class=" btn btn-warning">Edit</a>
			<form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
				@method('delete')
				@csrf
				<button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
					Delete
				</button>
			</form>

				@if ($post->image)
				<div style="max-height: 350px; overflow:hidden;">
					<img src="{{ asset('storage/' . $post->image) }}"" class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid">
				</div>
				@else
				<img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"" class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid">
				@endif
				<article class="my-3 text">
					{!! $post->body !!}
				</article>
        </div>
    </div>
</div>
@endsection