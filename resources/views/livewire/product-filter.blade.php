<div>
    <ul class="flex gap-10 justify-center">
        <!-- Botón para mostrar todos los productos -->
        <button onclick="filterByCategory(0)" 
        class="w-32 font-semibold {{ request('category') == 0 || !request('category') ? 'bg-grape-350 border-raspberry-500 border text-white p-3 rounded-xl' : 'bg-white border-gray-300 border text-black p-3 rounded-xl' }}"
        id="filter-all">
    Todos
</button>


        <!-- Botones para las categorías -->
        @foreach ($categories as $category)
            <button onclick="filterByCategory({{ $category->id }})" 
                    class="w-32 font-semibold bg-white border-gray-300 border text-black p-3 rounded-xl hover:bg-raspberry-400 transition-colors"
                    id="filter-{{ $category->id }}">
                {{ $category->name }}
            </button>
        @endforeach
    </ul>

    <ul class="grid grid-cols-2 lg:grid-cols-4 justify-center gap-12 mt-4 px-12" id="product-list">
        @foreach ($products as $product)
            <li class="bg-white border border-gray-300 p-4 h-72 text-black rounded-sm"
                data-category="{{ $product->category_id }}">
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
<script>
    function filterByCategory(categoryId) {
    const allProducts = document.querySelectorAll('#product-list li');
    
    // Iterar sobre todos los productos
    allProducts.forEach(product => {
        const productCategory = parseInt(product.getAttribute('data-category'));

        if (categoryId === 0 || productCategory === categoryId) {
            product.style.display = 'block'; // Mostrar producto
        } else {
            product.style.display = 'none'; // Ocultar producto
        }
    });

    // Actualizar clases activas en los botones
    document.querySelectorAll('ul.flex button').forEach(button => {
        button.classList.remove('bg-grape-350', 'border-raspberry-500', 'text-white');
        button.classList.add('bg-white', 'border-gray-300', 'text-black');
    });

    const activeButton = categoryId === 0 
        ? document.getElementById('filter-all') 
        : document.getElementById(`filter-${categoryId}`);

    activeButton.classList.add('bg-grape-350', 'border-raspberry-500', 'text-white');
    activeButton.classList.remove('bg-white', 'border-gray-300', 'text-black');
}


</script>