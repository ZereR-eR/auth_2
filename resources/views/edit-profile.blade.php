@extends("layouts.app")
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Update Profile</h4>
                        <hr>
                        <form action="{{ route("home.update") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <br>
                                <img height="50"  class="mb-3" src="{{ asset("storage/img/".\Illuminate\Support\Facades\Auth::user()->photo) }}" alt="">
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <button class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop
