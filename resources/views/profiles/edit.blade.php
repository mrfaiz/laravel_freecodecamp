@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
                            <input
                            id="title"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"
                            value="{{ old('title') ?? $user->profile->title }}"
                            required autocomplete="title" autofocus/>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
                            <input
                            id="description"
                            type="text"
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            value="{{ old('description') ?? $user->profile->description }}"
                            required autocomplete="description" autofocus/>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label">{{ __('Url') }}</label>
                            <input
                            id="url"
                            type="text"
                            class="form-control @error('url') is-invalid @enderror"
                            name="url"
                            value="{{ old('url') ?? $user->profile->url }}"
                            required autocomplete="url" autofocus/>

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                            <input id="image" class="form-control-file" type="file" name="image"/>
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="row">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
