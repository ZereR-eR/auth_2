@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-white text-center">Article List</h2>
                <div class="col-12 col-lg-6">
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
                            <p>{{ $article->description }}</p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route("article.index") }}" class="btn btn-outline-dark">See All</a>
                                    <a href="{{ route("article.edit",$article->id) }}" class="btn btn-outline-warning">Edit</a>
                                </div>
                                <form action="{{ route("article.destroy",$article->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-outline-danger">Del</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop
