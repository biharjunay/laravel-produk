@extends("layouts.product-layout")
@section("router-outlet")
    <h1>Product</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->product_categories->name}}</td>
                        <td class="d-flex gap-3">
                            <button onclick="location.href='/product/{{$item->id}}/edit'" class="btn btn-warning" >Edit</button>
                            <form action="/product/{{$item->id}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
