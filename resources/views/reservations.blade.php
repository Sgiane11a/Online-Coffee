
    <!-- RESERVACIONES VIEW DE USUARIO -->

    @extends('layouts.home')

    @section('main')
    <div class="container-imagen">
    {{--Encabezado(Logo)--}}
    <section class="relative text-left bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
        <div class="absolute inset-0 "></div> <!-- Filtro oscuro encima del fondo -->
        <div class="relative z-10 flex flex-col gap-4 px-4 py-8 max-w-3xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl text-grape-350  font-extrabold leading-tight titulo0">Reservas</h1>
            <p class="text-lg sm:text-xl text-BLACK max-w-lg mx-auto">Reserva herramientas y espacios para complementar tus estudios con un solo clic.</p>   
        </div>
    </section>
    
        <!-- Formulario -->
    <div class="reserva-container">

        <div class="formulario-container">
            <h2 class="text-grape-350 font-extrabold subtitulo">Nueva Reserva</h2>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="campo">
                    <label for="reservable_type">Tipo de Producto:</label>
                    <select id="reservable_type" name="reservable_type" class="input" required>
                        <option value="App\Models\Equipos">Computadoras</option>
                        <option value="App\Models\Laptop">Laptops</option>
                        <option value="App\Models\Cubiculos">Cubículos</option>
                    </select>
                </div>
                <div class="campo">
                    <label>Fecha:</label>
                    <div class="fecha-container">
                        <select id="mes" class="input">
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                        <input type="number" id="dia" class="input" min="1" max="31" value="22">
                        <input type="number" id="anio" class="input" min="2024" value="2025">
                    </div>
                </div>
                <div class="campo">
                    <label>Hora:</label>
                    <div class="hora-container">
                        <input type="time" id="hora-desde" class="input" name="reserved_at" required>
                        <input type="time" id="hora-hasta" class="input" name="due_date" required>
                    </div>
                </div>

                <p class="nota">Recuerda: La reserva de cualquier categoría solo es de máximo 2 horas.</p>
                <center><button type="submit" class="boton">Reservar</button></center>
                
            </form>
        </div>
    </div>
    
    @endsection
    
    
    