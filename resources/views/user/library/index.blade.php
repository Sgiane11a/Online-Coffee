<x-app-layout>
{{-- Encabezado (Logo) --}}
        <section class="relative text-left bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/BIBLIOTECA.png') }}');">
            <div class="absolute inset-0 "></div> <!-- Filtro oscuro encima del fondo -->
            <div class="relative z-10 flex flex-col gap-4 px-4 py-8 max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl md:text-6xl text-grape-350 font-extrabold leading-tight titulo0">Biblioteca</h1>
                <p class="text-lg sm:text-xl text-BLACK max-w-lg mx-auto">Accede a una amplia colección de libros y recursos para enriquecer tu aprendizaje, ¡todo al alcance de tu mano!</p>
                <div class="mt-4">
                    <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
                </div>    
            </div>
        </section>

        {{-- Sección de Barra de Búsqueda --}}
        <section class="search-section">
            <form action="{{ route('user.library.index') }}" method="GET" class="filters" id="search-form">
                <div class="search-bar">
                    <input type="text" name="search" id="search-input" placeholder="Buscar libros..." value="{{ request('search') }}">
                    <button type="submit" class="btn-search">🔍</button>
                </div>
            </form>
        </section>
    <div class="biblioteca-container flex gap-6">
        {{-- Sección de Filtros --}}
        <section class="filters-books-section flex-1">
            <form action="{{ route('user.library.index') }}" method="GET" class="filters" id="filter-form" onsubmit="return false;">
                <div class="filter-container">
                    <h3>Filtros</h3>

                    {{-- Filtro de Generales --}}
                    <div class="filter-group">
                        <h4>Generales:</h4>
                        <label><input type="checkbox" name="general[]" value="Cálculo" {{ in_array('Cálculo', request('general', [])) ? 'checked' : '' }} > Cálculo</label>
                        <label><input type="checkbox" name="general[]" value="Física" {{ in_array('Física', request('general', [])) ? 'checked' : '' }} > Física</label>
                        <label><input type="checkbox" name="general[]" value="Electricidad" {{ in_array('Electricidad', request('general', [])) ? 'checked' : '' }} > Electricidad</label>
                        <label><input type="checkbox" name="general[]" value="Expresión Oral" {{ in_array('Expresión Oral', request('general', [])) ? 'checked' : '' }} > Expresión Oral</label>
                    </div>

                    {{-- Filtro de Carreras --}}
                    <h4 class="text-lg font-semibold text-purple-700 mb-4">Carreras:</h4>
                    <div class="flex flex-col gap-3">
                    <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Diseño y Desarrollo de Software" 
                                {{ in_array('Diseño y Desarrollo de Software', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Diseño y Desarrollo de Software
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Administración de Redes y Comunicaciones" 
                                {{ in_array('Administración de Redes y Comunicaciones', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Administración de Redes y Comunicaciones
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Diseño y Desarrollo de Simuladores y Videojuegos" 
                                {{ in_array('Diseño y Desarrollo de Simuladores y Videojuegos', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Diseño y Desarrollo de Simuladores y Videojuegos
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Modelado y Animación Digital" 
                                {{ in_array('Modelado y Animación Digital', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Modelado y Animación Digital
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Big Data y Ciencia de Datos" 
                                {{ in_array('Big Data y Ciencia de Datos', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Big Data y Ciencia de Datos
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Diseño Industrial" 
                                {{ in_array('Diseño Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Diseño Industrial
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Producción y Gestión Industrial" 
                                {{ in_array('Producción y Gestión Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Producción y Gestión Industrial
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Operaciones Mineras" 
                                {{ in_array('Operaciones Mineras', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Operaciones Mineras
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Procesos Químicos y Metalúrgicos" 
                                {{ in_array('Procesos Químicos y Metalúrgicos', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Procesos Químicos y Metalúrgicos
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Electricidad Industrial" 
                                {{ in_array('Electricidad Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Electricidad Industrial
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Electrónica y Automatización Industrial" 
                                {{ in_array('Electrónica y Automatización Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Electrónica y Automatización Industrial
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Mecatrónica Industrial" 
                                {{ in_array('Mecatrónica Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Mecatrónica Industrial
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Gestión y Mantenimiento de Maquinaria Industrial" 
                                {{ in_array('Gestión y Mantenimiento de Maquinaria Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Gestión y Mantenimiento de Maquinaria Industrial
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Gestión de Mantenimiento de Maquinaria Pesada" 
                                {{ in_array('Gestión de Mantenimiento de Maquinaria Pesada', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Gestión de Mantenimiento de Maquinaria Pesada
                        </label>
                        <label class="text-gray-700">
                            <input type="checkbox" name="carrera[]" value="Aviación y Mecánica Aeronáutica" 
                                {{ in_array('Aviación y Mecánica Aeronáutica', (array) request('carrera', [])) ? 'checked' : '' }} >
                            Aviación y Mecánica Aeronáutica
                        </label>
                    </div>

                    {{-- Filtro de Idioma --}}
                    <div class="filter-group">
                        <h4>Idioma:</h4>
                        <label><input type="radio" name="idioma" value="Español" {{ request('idioma') == 'Español' ? 'checked' : '' }} > Español</label>
                        <label><input type="radio" name="idioma" value="Inglés" {{ request('idioma') == 'Inglés' ? 'checked' : '' }} > Inglés</label>
                    </div>

                    {{-- Filtro de Fecha --}}
                    <div class="filter-group">
                        <h4>Fecha de publicación:</h4>
                        <input type="range" name="publication_year" id="publication-range" min="1980" max="2024" value="{{ request('publication_year', 2024) }}" oninput="updateRangeValue()">
                        <span id="range-value">{{ request('publication_year', 2024) }} </span>
                    </div>

                    {{-- Botón de Aplicar Filtros --}}
                    <button type="button" id="filter-button">Aplicar Filtros</button>
                </div>
            </form>
        </section>

        {{-- Sección de Resultados de Libros --}}
        <section class="results-section flex-1 overflow-auto">
            <div class="results-container">
                @forelse ($books as $book)
                    <a href="{{ route('book.show', $book->id) }}" class="book-card">
                        <img src="https://res.cloudinary.com/doirzq4zq/image/upload/{{ $book->image_public_id }}" alt="{{ $book->title }}" class="book-thumbnail">
                        <h4>{{ $book->title }}</h4>
                        <p class="description">{{ $book->description }}</p>
                    </a>
                @empty
                    <p>No se encontraron libros con los filtros aplicados.</p>
                @endforelse
            </div>
            <div class="pagination-container">
                <button id="prevPage" class="pagination-btn">Anterior</button>
                <button id="nextPage" class="pagination-btn">Siguiente</button>
            </div>
        </section>
    </div>
    

<script>
   $(document).ready(function() {
    // Detecta el cambio en los filtros y envía el formulario automáticamente
    $('#filter-form input').on('change', function() {
        $('#filter-form').submit();  // Enviar el formulario al detectar un cambio en cualquier filtro
    });

    // Detecta el envío del formulario de filtros y envíalo por AJAX
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();  // Evita la recarga de la página

        // Recoger todos los datos del formulario
        var formData = $(this).serialize();

        // Hacer la petición AJAX
        $.ajax({
            url: '{{ route('user.library.index') }}',
            method: 'GET',
            data: formData,
            success: function(response) {
                // Limpiar los resultados anteriores
                $('#results-container').html('');

                // Agregar los resultados de los libros
                if (response.books.length > 0) {
                    response.books.forEach(function(book) {
                        $('#results-container').append(
                            '<a href="{{ url('book') }}/' + book.id + '" class="book-card">' +
                                '<img src="https://res.cloudinary.com/doirzq4zq/image/upload/' + book.image_public_id + '" alt="' + book.title + '" class="book-thumbnail">' +
                                '<h4>' + book.title + '</h4>' +
                                '<p class="description">' + book.description + '</p>' +
                            '</a>'
                        );
                    });
                } else {
                    $('#results-container').html('<p>No se encontraron libros con los filtros aplicados.</p>');
                }
            },
            error: function(error) {
                console.log("Error al obtener los libros:", error);
            }
        });
    });

    // Detecta el envío del formulario de búsqueda y envíalo por AJAX
    $('#search-form').on('submit', function(e) {
        e.preventDefault();  // Evita la recarga de la página

        // Recoger todos los datos del formulario
        var searchData = $(this).serialize();

        // Hacer la petición AJAX para la búsqueda
        $.ajax({
            url: '{{ route('user.library.index') }}', // La misma ruta que para los filtros
            method: 'GET',
            data: searchData,
            success: function(response) {
                // Limpiar los resultados anteriores
                $('#results-container').html('');

                // Agregar los resultados de los libros
                if (response.books.length > 0) {
                    response.books.forEach(function(book) {
                        $('#results-container').append(
                            '<a href="{{ url('book') }}/' + book.id + '" class="book-card">' +
                                '<img src="https://res.cloudinary.com/doirzq4zq/image/upload/' + book.image_public_id + '" alt="' + book.title + '" class="book-thumbnail">' +
                                '<h4>' + book.title + '</h4>' +
                                '<p class="description">' + book.description + '</p>' +
                            '</a>'
                        );
                    });
                } else {
                    $('#results-container').html('<p>No se encontraron libros con los filtros aplicados.</p>');
                }
            },
            error: function(error) {
                console.log("Error al obtener los libros:", error);
            }
        });
    });

    // Función para actualizar el valor del rango de publicación
    function updateRangeValue() {
        var value = $('#publication-range').val();
        $('#range-value').text(value);  // Mostrar el valor actual del rango
    }

    // Llama a updateRangeValue cuando se cambia el rango
    $('#publication-range').on('input', function() {
        updateRangeValue();
    });
    document.addEventListener('DOMContentLoaded', function() {
        const descriptions = document.querySelectorAll('.description');
        
        descriptions.forEach(function(description) {
            const paragraphs = description.innerHTML.split('</p>'); // Dividir por párrafos
            
            if (paragraphs.length > 3) {
                // Solo mostrar los primeros tres párrafos
                const limitedDescription = paragraphs.slice(0, 3).join('</p>') + '</p>';
                description.innerHTML = limitedDescription; // Actualizar el contenido del parrafo
            }
        });
    });
    
    let currentPage = 1;
const booksPerPage = 6; // Número de libros por página
const books = document.querySelectorAll('.book-card'); // Selecciona todas las tarjetas de libros
const totalPages = Math.ceil(books.length / booksPerPage); // Calcula el número total de páginas

// Función para mostrar los libros en la página actual
function showBooksForPage(page) {
    const startIndex = (page - 1) * booksPerPage;
    const endIndex = page * booksPerPage;

    books.forEach((book, index) => {
        if (index >= startIndex && index < endIndex) {
            book.style.display = 'block'; // Muestra el libro
        } else {
            book.style.display = 'none'; // Oculta el libro
        }
    });
}

// Manejadores de eventos para los botones de paginación
document.getElementById('prevPage').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        showBooksForPage(currentPage);
    }
});

document.getElementById('nextPage').addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++;
        showBooksForPage(currentPage);
    }
});

// Inicializa mostrando la primera página
showBooksForPage(currentPage);

});

</script>

</x-app-layout>    
