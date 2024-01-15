@extends('layout.main')

@section('container')
	
		<h2>
			<a href="/post/{{ $post['slug'] }}">{{ $post["title"] }}</a>
		</h2>
		<h5>{{ $post["author"] }}</h5>

		<p>{{ $post["body"] }}</p>

@endsection