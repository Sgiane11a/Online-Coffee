<!-- resources/views/contacto.blade.php -->
@extends('layouts.home')

@section('main')
    <div class="container mx-auto p-6 max-w-2xl bg-gray-50 rounded-lg shadow-xl">
        <header class="text-center mb-8">
            <h1 class="text-5xl font-extrabold text-[#8C5D9A]">Contáctanos</h1>
            <p class="text-xl text-gray-600 mt-2">Estamos aquí para ayudarte. Envíanos un mensaje y nos pondremos en contacto contigo lo antes posible.</p>
        </header>

        <div id="contact-form" class="bg-white shadow-lg p-6 rounded-lg border border-gray-200 space-y-6">
            <form id="form" method="POST" action="#" onsubmit="return simulateMessageSent(event)">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold text-[#333333]">Nombre</label>
                    <input type="text" id="name" name="name" class="border-2 border-[#8C5D9A] rounded-lg p-4 w-full focus:outline-none focus:ring-2 focus:ring-[#8C5D9A]" required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-lg font-semibold text-[#333333]">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="border-2 border-[#8C5D9A] rounded-lg p-4 w-full focus:outline-none focus:ring-2 focus:ring-[#8C5D9A]" required>
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-lg font-semibold text-[#333333]">Mensaje</label>
                    <textarea id="message" name="message" rows="6" class="border-2 border-[#8C5D9A] rounded-lg p-4 w-full focus:outline-none focus:ring-2 focus:ring-[#8C5D9A]" required></textarea>
                </div>

                <button type="submit" class="w-full border-2 border-[#8C5D9A] text-[#8C5D9A] p-3 rounded-lg text-lg font-semibold hover:bg-[#8C5D9A] hover:text-white transition duration-200 ease-in-out focus:outline-none focus:ring-4 focus:ring-[#8C5D9A]">
                    Enviar mensaje
                </button>
            </form>
        </div>

        <!-- Mensaje de confirmación -->
        <div id="confirmation-message" class="hidden text-center mt-6 p-4 bg-[#E8C6E8] text-[#8C5D9A] rounded-lg">
            <p class="text-xl font-semibold">¡Mensaje enviado con éxito!</p>
            <p>Nos pondremos en contacto contigo lo antes posible.</p>
        </div>
    </div>

    <script>
        function simulateMessageSent(event) {
            event.preventDefault(); // Evita que el formulario se envíe de manera real

            // Oculta el formulario
            document.getElementById('contact-form').style.display = 'none';

            // Muestra el mensaje de confirmación
            document.getElementById('confirmation-message').classList.remove('hidden');

            return false; // Evita el envío real del formulario
        }
    </script>
@endsection
