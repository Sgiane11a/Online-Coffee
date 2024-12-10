{{--RESERVA USUARIO--}} 

<x-app-layout>


{{--Encabezado--}} 
<section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
    <div class="absolute inset-0"></div> <!-- Filtro oscuro encima del fondo -->

    <div class="relative z-10 flex flex-row items-center justify-between px- py-9 max-w-5xl mx-auto  ">
        <div class="grid grid-cols-4 items-center">
                <!-- Espacio vacío a la izquierda -->
                <div></div>
                <!-- Contenedor del Título -->
                <div class="text-center">
                    <h1 class="sm:text-7xl titulo0">Reserva</h1>
                </div>
            
                <!-- Contenedor de la Descripción -->
                <div class=" text-center relative w-96" style="left: 15rem; top: -2rem;">
                    <p class="text-BLACK descripcion0">
                        Reserva herramientas y espacios para complementar tus estudios con un solo clic.
                    </p>
                    <div class="mt-4">
                        <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
                    </div>    
                </div>
            </div>
            
</section>
{{--Encabezado --}} 


    <form action="{{ route('buscar.reservas') }}" method="POST">
        @csrf
        <label for="tipo_reserva">Tipo de reserva:</label>
        <select name="tipo_reserva" id="tipo_reserva">
            <option value="">Seleccione</option>
            <option value="computadora">Computadora</option>
            <option value="laptop">Laptop</option>
            <option value="cubiculo">Cubículo</option>
        </select>
        
        <label for="fecha_reserva">Fecha:</label>
        <input type="date" name="fecha_reserva" id="fecha_reserva" required>
            
        <label for="hora_reserva">Hora:</label>
        <input type="time" name="hora_reserva" id="hora_reserva" required>

        <button type="submit">Buscar</button>
    </form>
        
    @if(isset($equiposDisponibles) && $equiposDisponibles->isNotEmpty())
        <h3>Equipos Disponibles</h3>
    @foreach($equiposDisponibles as $equipo)
        <div>
            <img src="{{ $equipo->image_public_id }}" alt="{{ $equipo->nombre }}">
            <h4>{{ $equipo->nombre }}</h4>
            <p>{{ $equipo->descripcion }}</p>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="reservable_id" value="{{ $equipo->id }}">
                <input type="hidden" name="reservable_type" value="App\Models\Equipo">
                <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                <button type="submit">Reservar</button>
            </form>
        </div>
    @endforeach
    @endif
        
    @if(isset($cubiculosDisponibles) && $cubiculosDisponibles->isNotEmpty())
        <h3>Cubículos Disponibles</h3>
    @foreach($cubiculosDisponibles as $cubiculo)
        <div>
            <img src="{{ $cubiculo->image_public_id }}" alt="{{ $cubiculo->nombre }}">
            <h4>{{ $cubiculo->nombre }}</h4>
            <p>{{ $cubiculo->descripcion }}</p>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="reservable_id" value="{{ $cubiculo->id }}">
                <input type="hidden" name="reservable_type" value="App\Models\Cubiculo">
                <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                <button type="submit">Reservar</button>
            </form>
        </div>
    @endforeach
    @endif


    <section>
        @if(isset($reservas) && $reservas->isNotEmpty())
        <h2>Mis Reservas</h2>
        <table>
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
                    <td>
                        @if($reserva->reservable_type == 'App\Models\Equipo')
                            Equipo
                        @elseif($reserva->reservable_type == 'App\Models\Cubiculo')
                            Cubículo
                        @endif
                    </td>
                    <td>{{ $reserva->reservable->nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('H:i') }}</td>
                    <td>
                        @if($reserva->due_date)
                            {{ \Carbon\Carbon::parse($reserva->due_date)->format('H:i') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('reservations.edit', $reserva->id) }}">Modificar</a>
                        <form action="{{ route('reservations.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <center><p>No tienes reservas en este momento.</p></center>
        @endif
    </section>

</x-app-layout>


    
    





<style>


/* Contenedor general del formulario */
form {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 2px solid #000000;
    border-radius: 10px;
    background-color: #ffffff;
    font-family: Arial, sans-serif;
}


/* Labels */
form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

/* Inputs y select */
form select,
form input[type="date"],
form input[type="time"] {
    width: calc(100% - 10px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Botón buscar */
form button {
    width: 100%;
    padding: 10px;
    background-color: #B4198B;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #7B1FA2;
}










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

</style>