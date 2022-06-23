@extends('layouts.app')
@section('content')
<div class="site-wrap m-2 p-3 d-flex justify-content-center">
    <div class="form-wrap bg-body align-self-center p-5 mt-5 rounded-3 shadow">
        <div class="form-innner">
            <h5 class="title">Post an article</h5>
            <form action="{{route('save')}}" method="post">
            @csrf
                <div class="mb-3" style="width: 350px;">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                    <span class="text-danger">@error('description'){{$message}}@enderror</span>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary shadow-sm m-1">POST</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection