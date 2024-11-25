<div class="min-h-screen flex flex-col items-center justify-center bg-white-100">
    <!-- Contenedor principal del formulario con imagen de fondo -->
    <div class="w-full sm:max-w-md px-6 py-8 bg-cover bg-center rounded-lg shadow-raspberry-500 shadow-2xl overflow-hidden sm:rounded-lg border-4 border-raspberry-700" 
        style="background-image: url('/images/Clogin.png'); opacity: 0.9;">
        <!-- Logo dentro del formulario -->
        <div class="flex justify-center mb-6">
            <div class="w-30 h-auto">
                {{ $logo }}
            </div>
        </div>
        <!-- Espacio para los componentes del formulario -->
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
