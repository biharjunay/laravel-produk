@extends("layouts.product-layout")

@section("router-outlet")
    <h1>{{ $product->exists ? "Edit Produk" : "Tambah Produk" }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    <form class="form-group"
          action="{{ $product->exists ? route('product.update', $product) : route('product.store') }}"
          method="POST">
        @csrf
        @if($product->exists)
            @method('PUT')
        @endif

        <label for="name">Nama Produk</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>

        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description', $product->description) }}</textarea>

        <label for="category_id">Category</label>
        <select name="category_id" id="category" class="form-select" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-3">{{ $product->exists ? 'Update' : 'Submit' }}</button>
    </form>
@endsection
