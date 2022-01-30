
@extends('layout.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-5">
        <form action="/blog">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('user'))
                <input type="hidden" name="user" value="{{ request('user') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count() > 0)
<div class="card mb-3">
    @if ($posts[0]->image)
		<div style="max-height: 350px; overflow:hidden;">
			<img src="{{ asset('storage/' . $posts[0]->image) }}"" class="card-img-top mt-3" alt="{{ $posts[0]->category->name }}" class="img-fluid">
			</div>
			@else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
	@endif
    <div class="card-body text-center">
    <h3 class="card-title"><a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
    <small class="text-muted">
    <p>By <a href="/blog?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></p>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>
    <p class="card-text">{{ $posts[0]->created_at->diffForHumans() }}</small></p> {{-- carbon di laravel utk atur waktu --}}

    <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card">
                <div class="position-absolute text-white p-1" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                @if ($post->image)
					<img src="{{ asset('storage/' . $post->image) }}"" class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid">
				@else
				<img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"" class="card-img-top mt-3" alt="{{ $posts[0]->category->name }}">
				@endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>By <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a><br>{{ $post->created_at->diffForHumans() }}</small></p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    @else
    <p class="fs-3">No Post Found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

@endsection