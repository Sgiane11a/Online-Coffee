@extends('layouts.home')

@section('main')

 {{--Encabezado(Logo)--}}
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



<div class="biblioteca-container">
    <!-- Barra de Búsqueda y Filtros -->
    <div class="filters">
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Buscar libros..." oninput="filterBooks()">
            <button class="btn-search">🔍</button>
        </div>
        <div class="filter-section">
            <h3>Filtros</h3>
            <div class="filter-group">
                <h4>Generales:</h4>
                <label><input type="checkbox" name="general" value="Calculo/Estadistica"> Cálculo / Estadística</label>
                <label><input type="checkbox" name="general" value="Física"> Física</label>
                <label><input type="checkbox" name="general" value="Electricidad"> Electricidad</label>
                <label><input type="checkbox" name="general" value="Expresión Oral"> Expresión Oral</label>
            </div>
            <div class="filter-group">
                <h4>Carreras:</h4>
                <label><input type="checkbox" name="carrera" value="C-24"> C-24</label>
                <label><input type="checkbox" name="carrera" value="C-5"> C-5</label>
                <label><input type="checkbox" name="carrera" value="C-20"> C-20</label>
                <label><input type="checkbox" name="carrera" value="C-12"> C-12</label>
            </div>
            <div class="filter-group">
                <h4>Idioma:</h4>
                <label><input type="radio" name="idioma" value="Español"> Español</label>
                <label><input type="radio" name="idioma" value="Inglés"> Inglés</label>
            </div>
            <div class="filter-group">
                <h4>Fecha de publicación:</h4>
                <input type="range" id="publication-range" min="1980" max="2024" value="2024" step="1" oninput="updateRangeValue()">
                <span id="range-value">2024</span>
            </div>
        </div>
    </div>

    <!-- Resultados de búsqueda 
    <div class="results-container">
        <div class="book-card">
            <img src="default-thumbnail.jpg" alt="Thumbnail" class="book-thumbnail">
            <h4>Calculo de una Variación</h4>
            <p>El autor continúa aplicando los mejores elementos de la reforma en las matemáticas...</p>
            <span class="rating">⭐⭐⭐⭐</span>
        </div>
        Se pueden agregar más cards aquí siguiendo el mismo formato 
        <div class="book-card">
            <img src="default-thumbnail.jpg" alt="Thumbnail" class="book-thumbnail">
            <h4>Calculo de una Variación</h4>
            <p>El autor continúa aplicando los mejores elementos de la reforma en las matemáticas...</p>
            <span class="rating">⭐⭐⭐⭐</span>
        </div>
        Más cards aquí 
    </div>-->
    
</div>

@endsection
