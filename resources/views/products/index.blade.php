<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Product List</span>
                        <div>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="100">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info me-2">View</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($products->isEmpty())
                            <p class="text-center">No products available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
