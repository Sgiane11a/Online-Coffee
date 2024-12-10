{{--RESERVA USUARIO--}} 

<x-app-layout>


{{--Encabezado--}} 
<section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
    <div class="absolute inset-0 bg-black opacity-0"></div> <!-- Filtro oscuro encima del fondo -->
    <div class="relative z-10 flex flex-col sm:flex-row items-center justify-between px-6 py-9 max-w-5xl mx-auto">
        
        <!-- Contenedor del Título -->
        <div class="flex-1 text-center mb-4 sm:mb-0">
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-white titulo0">Reserva</h1>
        </div>

        <!-- Descripción y botón -->
        <div class="text-center sm:text-left sm:w-96 sm:pl-12">
            <p class="text-black text-base sm:text-lg md:text-xl">Reserva herramientas y espacios para complementar tus estudios con un solo clic.</p>
            <div class="mt-4">
                <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
            </div>
        </div>
        
    </div>
</section>

{{--Encabezado --}} 


<form action="{{ route('buscar.reservas') }}" method="POST" class="max-w-lg mx-auto p-6 border-2 border-gray-300 rounded-lg bg-white shadow-lg mt-8">
    @csrf
    <div class="space-y-4">
        <h2 class="text-2xl font-semibold mb-4 text-center">Busca tu Reserva</h2>

        <div>
            <label for="tipo_reserva" class="block text-gray-700 font-semibold">Tipo de reserva:</label>
            <select name="tipo_reserva" id="tipo_reserva" class="w-full p-2 border border-gray-300 rounded-md">
                <option value="">Seleccione</option>
                <option value="computadora">Computadora</option>
                <option value="laptop">Laptop</option>
                <option value="cubiculo">Cubículo</option>
            </select>
        </div>

        <div>
            <label for="fecha_reserva" class="block text-gray-700 font-semibold">Fecha:</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div>
            <label for="hora_reserva" class="block text-gray-700 font-semibold">Hora:</label>
            <input type="time" name="hora_reserva" id="hora_reserva" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <button type="submit" class="w-full py-2 bg-purple-700 text-white font-bold rounded-md hover:bg-purple-600 transition-colors">Buscar</button>
    </div>
</form>
 {{-----}}
 @if(isset($equiposDisponibles) && $equiposDisponibles->isNotEmpty())
    <h3 class="text-xl font-semibold mb-4">Equipos Disponibles</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($equiposDisponibles as $equipo)
            <div class="border p-4 rounded-lg shadow-lg bg-white">
                <img src="{{ $equipo->image_public_id }}" alt="{{ $equipo->nombre }}" class="w-full h-40 object-cover mb-4 rounded-lg">
                <h4 class="text-lg font-semibold">{{ $equipo->nombre }}</h4>
                <p class="text-gray-600">{{ $equipo->descripcion }}</p>
                <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="reservable_id" value="{{ $equipo->id }}">
                    <input type="hidden" name="reservable_type" value="App\Models\Equipo">
                    <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                    <button type="submit" class="w-full py-2 bg-purple-700 text-white font-bold rounded-md hover:bg-purple-600 transition-colors">Reservar</button>
                </form>
            </div>
        @endforeach
    </div>
@endif
{{--cubiiculos disponibles--}}
        
@if(isset($cubiculosDisponibles) && $cubiculosDisponibles->isNotEmpty())
    <div class="reservas-title-container">
        <h2 class="reservas-title">Cubículos Disponibles</h2>
    </div>
    <div class="cubiculos-container">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cubiculosDisponibles as $cubiculo)
                <div class="cubiculo-card">
                    <img src="{{ $cubiculo->image_public_id }}" alt="{{ $cubiculo->nombre }}" class="cubiculo-image">
                    <div class="cubiculo-content">
                        <h4 class="cubiculo-title">{{ $cubiculo->nombre }}</h4>
                        <p class="cubiculo-description">{{ $cubiculo->descripcion }}</p>
                        <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="reservable_id" value="{{ $cubiculo->id }}">
                            <input type="hidden" name="reservable_type" value="App\Models\Cubiculo">
                            <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                            <button type="submit" class="cubiculo-button">Reservar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif


<section>
    @if(isset($reservas) && $reservas->isNotEmpty())
        <div class="reservas-title-container">
            <h2 class="reservas-title">Mis Reservas</h2>
        </div>
        <div class="reservas-container">
            <div class="overflow-x-auto">
                <table class="reservas-table">
                    <thead>
                        <tr>
                            <th>Tipo de Reserva</th>
                            <th>Nombre del Elemento</th>
                            <th>Fecha de Reserva</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->reservable_type == 'App\Models\Equipo' ? 'Equipo' : 'Cubículo' }}</td>
                                <td>{{ $reserva->reservable->nombre }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('H:i') }}</td>
                                <td>{{ $reserva->due_date ? \Carbon\Carbon::parse($reserva->due_date)->format('H:i') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('reservations.edit', $reserva->id) }}" class="edit-btn">Modificar</a>
                                    <form action="{{ route('reservations.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p class="text-center text-gray-600">No tienes reservas en este momento.</p>
    @endif
</section>

</section>

    
</x-app-layout>


    
    





<style>
    

    /* stylo*/
    .descripcion0 {
    margin-top: 10px;
    color: #000000;
    max-width: 500px; /* Reducir el ancho máximo */
    padding-right: 5px; /* Controla la cantidad de espacio a la derecha */
    padding: 30px;
}



/* Título dentro del encabezado */
.titulo0 {
    position: relative;
    background: #ffffff;
    padding: 25px 50px;
    border-radius: 8px;
    display: inline-block;

    font-weight: bolder;
    color: #B4198B;
    margin-bottom: 100px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}

.titulo0::before {
    content: '';
    position: absolute;
    top: 10px;
    left: -15px;
    width: 100%;
    height: 100%;
    background: #B4198B;
    z-index: -1;
    border-radius: 8px;
    transform: translate(-5%, 5%);
}

.cate{
    margin-bottom: 10px;
}




form {
    background-color: #ffffff;
}

form button {
    background-color: #B4198B;
}

form button:hover {
    background-color: #7B1FA2;
}

.descripcion0 {
    margin-top: 10px;
    color: #000000;
    max-width: 500px;
    padding-right: 5px;
    padding: 30px;
}

.titulo0 {
    background: #ffffff;
    padding: 25px 50px;
    border-radius: 8px;
    font-weight: bolder;
    color: #B4198B;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}


































/* Contenedor principal para la tabla */
.reservas-container {
    max-width: 1200px; /* Ancho máximo de la tabla */
    margin: 0 auto; /* Centramos el contenedor */
    padding: 0 16px; /* Espacio adicional a los lados */
    box-sizing: border-box;
}

/* Contenedor general de la tabla */
.reservas-table {
    width: 100%; /* La tabla ocupa todo el ancho del contenedor */
    border-collapse: collapse;
    margin: 30px 0;
    font-size: 16px;
    text-align: left;
    background-color: #ffffff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

/* Encabezado de la tabla */
.reservas-table thead tr {
    background-color: #B4198B;
    color: #ffffff;
    font-weight: bold;
}

.reservas-table thead th {
    padding: 12px 15px;
    text-align: center;
}

/* Filas del cuerpo de la tabla */
.reservas-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.reservas-table tbody tr:nth-of-type(even) {
    background-color: #f9f9f9;
}

.reservas-table tbody tr:hover {
    background-color: #f1f1f1;
}

.reservas-table tbody td {
    padding: 12px 15px;
    text-align: center;
    color: #555555;
}

/* Botones de acción */
.edit-btn {
    color: #4CAF50;
    font-weight: bold;
    text-decoration: none;
    margin-right: 10px;
    transition: color 0.3s ease;
}

.edit-btn:hover {
    color: #2e7d32;
}

.delete-btn {
    color: #F44336;
    font-weight: bold;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.3s ease;
}

.delete-btn:hover {
    color: #c62828;
}


/* Contenedor para el título */
.reservas-title-container {
    max-width: 500px;
    margin: 30px auto 10px; /* Incrementado el margen superior a 30px para más separación del formulario */
    padding: 10px 16px;
    background-color: #B4198B; /* Color de fondo */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
    text-align: center;
}

/* Título dentro del contenedor */
.reservas-title {
    color: #ffffff; /* Color del texto */
    font-size: 1.5rem; /* Tamaño del texto */
    font-weight: bold;
    margin: 0; /* Sin márgenes adicionales */
}

/* Contenedor del formulario */
form {
    background-color: #ffffff;
    margin-bottom: 40px; /* Separación del formulario con las siguientes secciones */
}


















/* Contenedor principal de las tarjetas */
.cubiculos-container {
    max-width: 1200px; /* Ancho máximo para mantenerlas centradas */
    margin: 0 auto; /* Centrar el contenedor */
    padding: 0 16px; /* Agregar espacio a los lados (izquierda y derecha) */
    box-sizing: border-box; /* Incluye padding en el cálculo del ancho */
}

/* Tarjeta individual de los cubículos */
.cubiculo-card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cubiculo-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
}

/* Imagen de cubículo */
.cubiculo-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

/* Contenido del cubículo */
.cubiculo-content {
    padding: 16px;
    text-align: center;
}

/* Título del cubículo */
.cubiculo-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
}

/* Descripción del cubículo */
.cubiculo-description {
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 16px;
    line-height: 1.5;
}

/* Botón para reservar cubículo */
.cubiculo-button {
    width: 100%;
    padding: 10px 0;
    background-color: #B4198B;
    color: #ffffff;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.cubiculo-button:hover {
    background-color: #7B1FA2;
}





















/*cubiculos disponibles*/

/* Contenedor de la tarjeta de cubículo */
.cubiculo-card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cubiculo-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
}

/* Imagen de cubículo */
.cubiculo-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

/* Contenido del cubículo */
.cubiculo-content {
    padding: 16px;
    text-align: center;
}

/* Título del cubículo */
.cubiculo-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
}

/* Descripción del cubículo */
.cubiculo-description {
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 16px;
    line-height: 1.5;
}

/* Botón para reservar cubículo */
.cubiculo-button {
    width: 100%;
    padding: 10px 0;
    background-color: #B4198B;
    color: #ffffff;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.cubiculo-button:hover {
    background-color: #7B1FA2;
}
































/* Contenedor para el título */
.reservas-title-container {
    max-width: 300px;
    margin: 30px auto 10px; /* Incrementado el margen superior a 30px para más separación del formulario */
    padding: 10px 16px;
    background-color: #B4198B; /* Color de fondo */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
    text-align: center;
}

/* Título dentro del contenedor */
.reservas-title {
    color: #ffffff; /* Color del texto */
    font-size: 1.5rem; /* Tamaño del texto */
    font-weight: bold;
    margin: 0; /* Sin márgenes adicionales */
}


</style>