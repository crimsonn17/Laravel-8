@extends('layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h2>{{ $post->title }}</h2>
			<p>By <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
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
				<a href="/blog">Back To Blog</a>
        </div>
    </div>
</div>       

@endsection
