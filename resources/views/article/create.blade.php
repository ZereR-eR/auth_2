@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h4>Create Article</h4>
                        <hr>
                        <form action="{{ route("article.store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" autofocus value="{{ old("title") }}">
                                @error("title") <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-select @error('title') is-invalid @enderror">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old("category_id" ? "selected" : "") }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old("description") }}</textarea>
                                @error("description") <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <button class="btn btn-primary">Create Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
