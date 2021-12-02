<table class="table table-bordered table-hover text-white">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Control</th>
        <th>Created_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Models\Category::all() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>
                <a href="{{ route("category.edit",$category->id) }}" class="btn btn-warning text-white">Edit</a>
                <form action="{{ route("category.destroy",$category->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method("delete")
                    <button class="btn btn-danger">Del</button>
                </form>
            </td>
            <td>{{ $category->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
