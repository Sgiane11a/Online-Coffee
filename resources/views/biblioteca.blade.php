@extends('layouts.home')

@section('main')
<div>
{{-- Encabezado (Logo) --}}
<section class="relative text-left bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/BIBLIOTECA.png') }}');">
    <div class="absolute inset-0 "></div> <!-- Filtro oscuro encima del fondo -->
    <div class="relative z-10 flex flex-col gap-4 px-4 py-8 max-w-3xl mx-auto text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl text-grape-350  font-extrabold leading-tight titulo0">Biblioteca</h1>
        <p class="text-lg sm:text-xl text-BLACK max-w-lg mx-auto">Accede a una amplia colección de libros y recursos para enriquecer tu aprendizaje, ¡todo al alcance de tu mano!</p>
        <div class="mt-4">
            <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
        </div>    
    </div>
</section>

{{-- Sección de Barra de Búsqueda --}}
<section class="search-section">
    <form action="{{ route('biblioteca.index') }}" method="GET" class="filters" id="search-form">
        <div class="search-bar">
            <input type="text" name="search" id="search-input" placeholder="Buscar libros..." value="{{ request('search') }}" >
            <button type="submit" class="btn-search">🔍</button>
        </div>
    </form>
</section>


{{-- Sección Principal (Filtros y Libros) --}}
<div class="biblioteca-container">
    {{-- Sección de Filtros --}}
    <section class="filters-books-section">
    <form action="{{ route('biblioteca.index') }}" method="GET" class="filters" id="filter-form" onsubmit="return false;">
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
                <div class="filter-group">
                    <h4>Carreras:</h4>
                    <div class="carreras-grid">
                    <label><input type="checkbox" name="carrera[]" value="Diseño y Desarrollo de Software" {{ in_array('Diseño y Desarrollo de Software', (array) request('carrera', [])) ? 'checked' : '' }} >C-24</label>
    <label><input type="checkbox" name="carrera[]" value="Administración de Redes y Comunicaciones" {{ in_array('Administración de Redes y Comunicaciones', (array) request('carrera', [])) ? 'checked' : '' }} > C-20</label>
    <label><input type="checkbox" name="carrera[]" value="Diseño y Desarrollo de Simuladores y Videojuegos" {{ in_array('Diseño y Desarrollo de Simuladores y Videojuegos', (array) request('carrera', [])) ? 'checked' : '' }} >C-26</label>
    <label><input type="checkbox" name="carrera[]" value="Modelado y Animación Digital" {{ in_array('Modelado y Animación Digital', (array) request('carrera', [])) ? 'checked' : '' }} >F</label>
    <label><input type="checkbox" name="carrera[]" value="Big Data y Ciencia de Datos" {{ in_array('Big Data y Ciencia de Datos', (array) request('carrera', [])) ? 'checked' : '' }} > C-28</label>
    <label><input type="checkbox" name="carrera[]" value="Diseño Industrial" {{ in_array('Diseño Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >F</label>
    <label><input type="checkbox" name="carrera[]" value="Producción y Gestión Industrial" {{ in_array('Producción y Gestión Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >C-12</label>
    <label><input type="checkbox" name="carrera[]" value="Operaciones Mineras" {{ in_array('Operaciones Mineras', (array) request('carrera', [])) ? 'checked' : '' }} >C-11</label>
    <label><input type="checkbox" name="carrera[]" value="Procesos Químicos y Metalúrgicos" {{ in_array('Procesos Químicos y Metalúrgicos', (array) request('carrera', [])) ? 'checked' : '' }} >C-1</label>
    <label><input type="checkbox" name="carrera[]" value="Electricidad Industrial" {{ in_array('Electricidad Industrial', (array) request('carrera', [])) ? 'checked' : '' }} > C-23</label>
    <label><input type="checkbox" name="carrera[]" value="Electrónica y Automatización Industrial" {{ in_array('Electrónica y Automatización Industrial', (array) request('carrera', [])) ? 'checked' : '' }} > C-5</label>
    <label><input type="checkbox" name="carrera[]" value="Mecatrónica Industrial" {{ in_array('Mecatrónica Industrial', (array) request('carrera', [])) ? 'checked' : '' }} > C-16</label>
    <label><input type="checkbox" name="carrera[]" value="Gestión y Mantenimiento de Maquinaria Industrial" {{ in_array('Gestión y Mantenimiento de Maquinaria Industrial', (array) request('carrera', [])) ? 'checked' : '' }} >C-22</label>
    <label><input type="checkbox" name="carrera[]" value="Gestión de Mantenimiento de Maquinaria Pesada" {{ in_array('Gestión de Mantenimiento de Maquinaria Pesada', (array) request('carrera', [])) ? 'checked' : '' }} > C-21</label>
    <label><input type="checkbox" name="carrera[]" value="Aviación y Mecánica Aeronáutica" {{ in_array('Aviación y Mecánica Aeronáutica', (array) request('carrera', [])) ? 'checked' : '' }} >C-14</label>
                    </div>
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
    <section class="results-section">
    <div class="results-container" id="results-container">
        @forelse ($books as $book)
            <a href="{{ route('book.show', $book->id) }}" class="book-card"> <!-- Enlace a la página de detalles del libro -->
                <img src="https://res.cloudinary.com/doirzq4zq/image/upload/{{ $book->image_public_id }}" alt="{{ $book->title }}" class="book-thumbnail">
                <h4>{{ $book->title }}</h4>
                <p class="description">{{ $book->description }}</p> <!-- Descripción sin limitación de caracteres -->
            </a>
        @empty
            <p>No se encontraron libros con los filtros aplicados.</p>
        @endforelse
    </div>
</section>



</section>

</div>


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
});

</script>

@endsection
