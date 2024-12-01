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
                        <x-cld-image class="object-cover w-full h-full"
                            public-id="{{ $product->image_public_id }}"></x-cld-image>
                    </div>
                </div>

                <div class="flex justify-between p-2">
                    <div class="flex-1">
                        <h2 class="text-raspberry-950 text-lg font-semibold truncate">{{ $product->name }}</h2> <!-- truncate agrega puntos suspensivos si el texto es largo -->
                        <p class="text-red-700 font-bold truncate">S/. {{ number_format($product->price, 2) }}</p> <!-- truncate también en el precio -->
                    </div>

                    <!-- Comentar la parte del carrito -->
                    <!--
                    <svg class="my-auto mx-0 h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                        <defs>
                            <mask id="IconifyId19312e3a1dbb5da893">
                                <g fill="none">
                                    <path fill="#fff" d="M39 32H13L8 12h36z" />
                                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M3 6h3.5L8 12m0 0l5 20h26l5-20z" />
                                    <circle cx="13" cy="39" r="3" stroke="#fff" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="4" />
                                    <circle cx="39" cy="39" r="3" stroke="#fff" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="4" />
                                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M22 22h8m-4 4v-8" />
                                </g>
                            </mask>
                        </defs>
                        <path fill="#312e81" d="M0 0h48v48H0z" mask="url(#IconifyId19312e3a1dbb5da893)" />
                    </svg>
                    -->
                </div>
            </li>
        @endforeach
    </ul>
</div>
