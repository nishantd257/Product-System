<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Edit Product</span>
                        <div>
                            <a href="{{ route('products.index') }}" data-bs-toggle="tooltip" title="Back" class="btn btn-light btn-sm" aria-label="Back">
                                <i class="fas fa-reply"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Product Name -->
                            <div class="flex flex-col space-y-2">
                                <label for="name" class="text-gray-700 select-none font-medium">Product Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name', $product->name) }}"
                                    placeholder="Enter product name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Product Price -->
                            <div class="flex flex-col space-y-2 mt-4">
                                <label for="price" class="text-gray-700 select-none font-medium">Product Price</label>
                                <input id="price" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                                    placeholder="Enter product price" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                @error('price')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Product Quantity -->
                            <div class="flex flex-col space-y-2 mt-4">
                                <label for="quantity" class="text-gray-700 select-none font-medium">Product Quantity</label>
                                <input id="quantity" type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                                    placeholder="Enter product quantity" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                @error('quantity')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Product Description -->
                            <div class="flex flex-col space-y-2 mt-4">
                                <label for="description" class="text-gray-700 select-none font-medium">Product Description</label>
                                <textarea name="description" id="description" placeholder="Enter product description"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Product Image -->
                            <div class="flex flex-col space-y-2 mt-4">
                                <label for="image" class="text-gray-700 select-none font-medium">Product Image</label>

                                <!-- Display the old image if it exists -->
                                @if ($product->image)
                                <div class="mb-2">
                                    <img src="{{asset('/images/'.$product->image)}}" alt="Current Product Image" class="rounded-lg" style="max-width: 200px;">
                                </div>
                                @endif

                                <input id="image" type="file" name="image" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center mt-16 mb-16">
                                <button type="submit" class="btn btn-primary text-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
