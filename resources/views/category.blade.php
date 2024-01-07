@extends('autoblog.app')


@section('title')
{{$category | config('app.name')}}
@endsection

@section('mainContent')
Kategori Sayfası

@foreach($catPosts as $post)

    <a href="{{route('post-show',$post->slug)}}">{{$post->title}}</a>

@endforeach


@endsection