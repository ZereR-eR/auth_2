@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <h4>Create Category</h4>
                        <hr>
                        <form action="{{ route("category.store") }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-8">
                                    <input type="text" name="title" class="form-control" autofocus>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary">Create Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h4>Category List</h4>
                        @include("category.list")
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
