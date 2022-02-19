<x-guest-layout>
    <div class="max-w-6xl mx-auto">
    <h1>Products index</h1>
    <div class="m-2 p-2">
        @auth()
            @if(auth()->user()->is_admin)
                <a class="px-4 py-3 rounded bg-green-400" href="/products/create">Create</a>
            @endif
        @endauth
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($products as $product)
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->name }}
                                </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $product->type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $product->price }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @auth()
                                            <button class="px-4 py-2 rounded-lg bg-blue-400">Buy Product</button>
                                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                        @endauth
                                    </td>
                            </tr>
                            @empty
                                <p>No Products</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
