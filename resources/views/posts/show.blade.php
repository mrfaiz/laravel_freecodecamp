@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7 pl-4">
            <img src="/storage/{{$post->image}}" alt="" class="w-100"/>
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle" style="max-width: 30px">
                    </div>
                    <div>
                        <a href="/profile/{{$post->user->id}}" class="font-weight-bold text-dark">{{$post->user->username}}</a>
                        <span class="pl-3"> <a href="#">Follow</a><span>
                    </div>
                </div>
                <hr/>
                <div>
                    <a href="/profile/{{$post->user->id}}" class="font-weight-bold text-dark"> {{$post->user->username}}</a>
                    <span class="pl-1">{{ $post->caption}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
