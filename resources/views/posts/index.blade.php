@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row pt-4">
        @foreach($posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="{{$post->caption}}" title="{{$post->caption}}"/>
            </a>
        </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
