@extends('layout.main')

@section('container')

	@foreach($post as $post)
		<h2>
			<a href="/post/{{ $post['slug']}}">{{ $post["title"] }}</a>
		</h2>
		<h5>{{ $post["author"] }}</h5>

		<p>{{ $post["body"] }}</p>
	@endforeach

@endsection