```php
<x-app-layout>
    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">

                <div class="p-8">

                    <!-- Header -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                                Product Inventory
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Manage your product inventory easily
                            </p>
                        </div>

                        <a href="{{ route('product.create') }}"
                           class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm shadow transition">
                            +
                            Add Product
                        </a>
                    </div>


                    <!-- Flash Message -->
                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 bg-green-100 text-green-700 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif


                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">

                            <thead class="border-b border-gray-200 dark:border-gray-700">
                                <tr class="text-left text-gray-500 dark:text-gray-400 text-xs uppercase">
                                    <th class="py-3 px-4">#</th>
                                    <th class="py-3 px-4">Name</th>
                                    <th class="py-3 px-4">Quantity</th>
                                    <th class="py-3 px-4">Price</th>
                                    <th class="py-3 px-4">Owner</th>
                                    <th class="py-3 px-4 text-center">Actions</th>
                                </tr>
                            </thead>


                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">

                                @forelse ($products as $product)

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                                        <td class="py-4 px-4 text-gray-400">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="py-4 px-4 font-medium text-gray-800 dark:text-gray-100">
                                            {{ $product->name }}
                                        </td>

                                        <td class="py-4 px-4">
                                            <span class="px-2 py-1 text-xs rounded
                                                {{ $product->quantity > 10
                                                    ? 'bg-green-100 text-green-700'
                                                    : 'bg-red-100 text-red-700' }}">
                                                {{ $product->quantity }}
                                            </span>
                                        </td>

                                        <td class="py-4 px-4 font-mono text-gray-700 dark:text-gray-200">
                                            Rp {{ number_format($product->price,0,',','.') }}
                                        </td>

                                        <td class="py-4 px-4 text-gray-500">
                                            {{ $product->user->name ?? '-' }}
                                        </td>


                                        <td class="py-4 px-4 text-center">

                                            <div class="flex justify-center gap-3">

                                                <a href="{{ route('product.show',$product->id) }}"
                                                   class="text-blue-500 hover:underline text-sm">
                                                   View
                                                </a>

                                                <a href="{{ route('product.edit',$product) }}"
                                                   class="text-yellow-500 hover:underline text-sm">
                                                   Edit
                                                </a>

                                                <form action="{{ route('product.delete',$product->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Delete this product?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="text-red-500 hover:underline text-sm">
                                                        Delete
                                                    </button>
                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center py-12 text-gray-400">
                                            No products found
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
```
