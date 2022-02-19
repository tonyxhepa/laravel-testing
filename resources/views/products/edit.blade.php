<x-guest-layout>
    <div class="max-w-6xl mx-auto">
    <h1>Product Update</h1>
        <div class="m-2 p-2">
            <a class="px-4 py-3 rounded bg-green-400" href="/products">back</a>
        </div>
    <x-auth-card>
        <x-slot name="logo">
            <h1>
               Update Product
            </h1>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
            @method('PUT')
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name"  />
            </div>

            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />

                <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="$product->type" />
            </div>

            <div class="mt-4">
                <x-label for="price" :value="__('Price')" />

                <x-input id="price" class="block mt-1 w-full"
                         type="text"
                         name="price"
                         :value="$product->price"
                        />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    </div>
</x-guest-layout>
