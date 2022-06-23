@extends('layouts.app')
@section('content')
<div class="site-wrap m-3 p-3 d-flex-inline">

    @if(Session::get('success'))
    <div class="alert alert-success m-3 mt-0 mb-2" style="width: 35rem;">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="d-flex justify-content-between m-3 mb-4" style="width: 35rem;">
        <h3 class="title">The Articles Daily</h3>
        <form action="{{ route('create') }}" method="get">
            <button type="submit" class="btn btn-outline-primary rounded-3">Post New Article</button>
        </form>
    </div>
    
    @foreach ($articles as $art)
        <div class="card m-3" style="width: 35rem;">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">{{ $art->title }}</h5>
                <div class="d-flex justify-content-end">
                    <a href="edit/{{$art->id}}" class="text-warning m-1">Edit</a>
                    <a href="delete/{{$art->id}}" class="text-danger m-1">Delete</a>
                </div>
            </div>
            <h6 class="card-subtitle mb-2 text-muted">Posted on {{ $art->date }}</h6>
            <p class="card-text">{{ $art->description }}</p>
            <a href="upvote/{{$art->id}}" class="p-1 text-success" style="text-decoration:none;"><i class="fa-solid fa-circle-arrow-up"></i> {{ $art->upvote }} votes</a> 
            <a href="downvote/{{$art->id}}" class="p-1 text-secondary" style="text-decoration:none;"><i class="fa-solid fa-circle-arrow-down"></i> {{ $art->downvote }} votes</a>
        </div>
        </div>
    @endforeach
 

</div>
@endsection
