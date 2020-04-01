@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="/p" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label">{{ __('Caption') }}</label>
                            <input 
                            id="caption" 
                            type="text" 
                            class="form-control @error('caption') is-invalid @enderror" 
                            name="caption" 
                            value="{{ old('caption') }}" 
                            required autocomplete="caption" autofocus/>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label">{{ __('Choose an Image') }}</label>
                            <input id="image" class="form-control-file" type="file" name="image"/>
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
