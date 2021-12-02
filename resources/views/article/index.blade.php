@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-white text-center">Article List</h2>
            @foreach($articles as $article)
                <div class="col-12 col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                                @foreach($photos as $photo)
                                    @if($article->id == $photo->article_id)
                                        <div class="img-box">
                                            <img src="{{ asset("storage/img/".$photo->name) }}" class="card-img-top w-75" alt="">
                                        </div>
                                    @endif
                                @endforeach
                                <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>{{ $article->title }}</h4>
                                <small class="badge bg-secondary">{{ $article->category->title }}</small>
                            </div>
                            <p>{{ \Illuminate\Support\Str::words($article->description,20) }}</p>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <a href="{{ route("article.show",$article->id) }}" class="btn btn-outline-dark">See More</a>
                                    <a href="{{ route("article.edit",$article->id) }}" class="btn btn-outline-warning">Edit</a>
                                </div>
                                <form action="{{ route("article.destroy",$article->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-outline-danger">Del</button>
                                </form>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                                <div class="">
                                    Created By -
                                    <p class="d-inline-block fw-bold mb-0">{{ \App\Models\User::find($article->user_id)->name }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
