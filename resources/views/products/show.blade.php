<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ $product->name }}</span>
                        <div>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="300" class="mb-3">
                        
                        <p><strong>Price:</strong> {{ $product->price }}</p>
                        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
