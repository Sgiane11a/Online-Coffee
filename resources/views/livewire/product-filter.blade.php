<div>
    <ul class="flex gap-10 justify-center"> <!-- Aumenta el espacio entre los botones de las categorías -->
        @foreach ($categories as $category)
            <button wire:click="filterByCategory({{ $category->id }})"
                class="w-32 font-semibold {{ $selectedCategory == $category->id ? 'bg-raspberry-900 border-raspberry-500 border text-white p-3 rounded-xl' : 'bg-white border-gray-300 border text-black p-3 rounded-xl' }}">
                {{ $category->name }}
            </button>
        @endforeach
    </ul>

    <ul class="grid grid-cols-2 lg:grid-cols-4 justify-center gap-12 mt-4 px-12">
    @foreach ($products as $product)
        <li class="bg-white border border-gray-300 p-4 h-72 text-black rounded-sm">
            <div class="flex justify-center rounded-md">
                <div class="relative w-full h-40 lg:h-48 rounded-md overflow-hidden">
                    <img class="object-cover w-full h-full"
                         src="https://res.cloudinary.com/doirzq4zq/image/upload/{{ $product->image_public_id }}.jpg"
                         alt="{{ $product->name }}">
                </div>
            </div>

            <div class="flex justify-between p-2">
                <div class="flex-1">
                    <h2 class="text-raspberry-950 text-lg font-semibold truncate">{{ $product->name }}</h2>
                    <p class="text-red-700 font-bold truncate">S/. {{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>

</div>
