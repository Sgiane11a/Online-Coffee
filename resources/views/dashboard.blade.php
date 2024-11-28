<x-app-layout>
    @vite(['resources/js/coffee.js', 'resources/js/slider.js'])
    <main class="">
        {{--Encabezado(Logo)--}}
        <section class="relative text-center bg-cover bg-center h-screen" style="background-image: url('{{asset('images/ILogo.png')}}');">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="relative z-10 flex justify-end items-center h-full text-white py-24 px-4">
                <div class="text-left w-full md:w-1/2 pl-2">
                    <h1 class="text-4xl md:text-6xl font-bold">Donde las ideas cobran vida y se transforman en realidad.</h1>
                    <p class="mt-4 text-lg md:text-xl">Descubre un entorno para combinar la productividad con el confort, donde cada detalle
                       está pensado para inspirar tu creatividad, facilitar tu aprendizaje y fomentar la colaboración.</p>
                </div>
            </div>
        </section>       

        {{--Taza animada--}}     
        <section class="flex justify-center items-center border-b-2 border-blueberry-100 py-12 bg-black relative overflow-hidden">
            <!-- Video de fondo -->
            <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                <source src="{{ asset('videos/tazafondo.mp4') }}" type="video/mp4">
                Tu navegador no soporta el formato de video.
            </video>
        
            <!-- Contenido opacado -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute left-0 top-1/4 transform -translate-y-1/4 flex flex-col items-start px-4 w-1/2">
                <p class="font-extrabold text-3xl break-normal text-left mt-2 fa2">"Una taza de café, millones de ideas. Juntos, somos imparables”</p>
                <p class="font-extrabold text-2xl break-normal text-left mt-2 fa2">"Desde una taza, nacen las mejores conexiones entre mentes creativas."</p>
                <p class="font-extrabold text-1xl break-normal text-left mt-2 fa2">"El café une, inspira y acompaña: el aliado perfecto para cada proyecto."</p>
            </div>
            
            <!-- Contenedor derecho -->
            <div class="absolute right-0 top-1/4 transform -translate-y-1/4 flex flex-col items-end px-4 w-1/2">
                <p class="font-extrabold text-2xl break-normal text-left mt-2 fa2">"Café y comunidad: ingredientes esenciales para aprender y crecer."</p>
                <p class="font-extrabold text-1xl break-normal text-right mt-2 fa2">"Cada día, millones de estudiantes comparten un café mientras trabajan en sus sueños."</p>
                <p class="font-extrabold text-2xl break-normal text-right mt-2 fa2">"¿Sabías que un café caliente puede aumentar la sensación de conexión entre las personas?"</p>
            </div>
        
            <!-- Ultimo texto-->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-center">
                <p class="font-extrabold text-3xl break-normal mt-2 fa2">En el 85% de los proyectos colaborativos, las mejores ideas surgen con una taza de café en la mano.</p>
            </div>
        
            <canvas aria-label="Modelo 3D de un café" class="aspect-auto z-10" id="coffee"></canvas>
        </section>

        {{--Carrusel--}}
        <section class="flex justify-center border-b-2 border-blueberry-100">
            <div id="welcome-slide" class="splide" aria-labelledby="carousel-heading">
                <div class="splide__arrows z-30 absolute flex justify-between items-center h-full w-full p-2">
                    <button class="splide__arrow splide__arrow--prev">
                        <svg class="h-16 text-grape-350 bg-raspberry-100 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M2 12A10 10 0 0 1 12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12m16-1h-8l3.5-3.5l-1.42-1.42L6.16 12l5.92 5.92l1.42-1.42L10 13h8z"/></svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <svg class="h-16 text-grape-350 bg-raspberry-100 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M22 12a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2a10 10 0 0 1 10 10M6 13h8l-3.5 3.5l1.42 1.42L17.84 12l-5.92-5.92L10.5 7.5L14 11H6z"/></svg>
                    </button>
                </div>

                <div class="splide__track">
                    <ul class="splide__list">
                        <x-welcome-slide image="https://www.ledyilighting.com/wp-content/uploads/2024/06/Funky-Coffee-Shop-Lighting.jpg" />
                        <x-welcome-slide image="https://www1.tecsup.edu.pe/sites/default/files/imagenes-webdrupal/105_Listado_Cover_1.png" />
                        <x-welcome-slide image="https://img.freepik.com/fotos-premium/persona-jugando-estacion-cibercafe_151355-54053.jpg" />
                        <x-welcome-slide image="https://img.freepik.com/foto-gratis/hombre-que-usa-tableta-digital-mientras-que-tiene-croissant-cafeteria_1170-636.jpg" />
                        <x-welcome-slide image="https://media.istockphoto.com/id/1147292486/es/foto/los-colegas-modernos-que-trabajan-desde-caf%C3%A9.jpg?s=612x612&w=0&k=20&c=GPlrkrzeIl2YBrVpP-hE6Ocm2nj_DCeO5ICD4BG1Igw=" />
                        <x-welcome-slide image="https://www.soypositivo.com/wp-content/uploads/2023/04/g-1-1024x576.jpg" />
                    </ul>
                </div>
            </div>
        </section>

        {{--Información--}}
        <section class="flex justify-center items-center gap-8 py-20 px-32 h-auto">
            <div class="grid grid-cols-2 gap-8 w-full">
                <div class="grid gap-4">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/Oyz5TP" alt="1">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/URCU4x" alt="3">
                </div>
                <div class="grid gap-4">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/uUh8eE" alt="4">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/BjFuqZ" alt="5">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/S4i8rX" alt="2">
                </div>
            </div>
            <aside class="flex flex-col justify-center items-center gap-6 mt-8">
                <h1 class="text-2xl font-bold">Nuestros servicios</h1>
                <p class="text-center text-blue-600">Online Coffee pone a disposición de sus usuarios una amplia 
                    gama de servicios, con instalaciones pensadas para diferentes necesidades: un área de videojuegos, 
                    un espacio de estudio, computadoras disponibles para uso, y, por supuesto, su tradicional y acogedora 
                    cafetería, ideal para disfrutar mientras trabajas o te relajas.</p> 
            </aside>
        </section> 

        {{--Carrusel reservas--}}
        <section id="reservas" class="py-16 bg-white-100">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8">Reservas</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="flex flex-col items-center">
                        <div class="w-80 h-48 bg-gray-200 overflow-hidden flex justify-center items-center">
                            <img src="https://t3.ftcdn.net/jpg/10/03/87/98/360_F_1003879853_1LuE2aDBzNKOaI9onpURaWdS70E6lFQL.jpg" 
                                 alt="Reserva 1" 
                                 class="object-cover w-full h-full rounded-lg shadow-lg">
                        </div>
                        <p class="mt-4 text-center text-lg font-medium text-gray-700">Laptos</p>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <div class="w-80 h-48 bg-gray-200 overflow-hidden flex justify-center items-center">
                            <img src="https://www.shutterstock.com/image-photo/workplace-professional-gamers-cafe-room-600nw-1900460707.jpg" 
                                 alt="Reserva 2" 
                                 class="object-cover w-full h-full rounded-lg shadow-lg">
                        </div>
                        <p class="mt-4 text-center text-lg font-medium text-gray-700">Computadoras</p>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <div class="w-80 h-48 bg-gray-200 overflow-hidden flex justify-center items-center">
                            <img src="https://i.pinimg.com/236x/f9/f6/5b/f9f65bf158bd4def6bb5810ac0804f3b.jpg" 
                                 alt="Reserva 3" 
                                 class="object-cover w-full h-full rounded-lg shadow-lg">
                        </div>
                        <p class="mt-4 text-center text-lg font-medium text-gray-700">Cubículos de estudios</p>
                    </div>
                </div>
            </div>
        </section>
    
        {{--Libros info--}}

        <section class="relative text-center bg-cover bg-center h-screen" style="background-image: url('{{asset('images/biblio.jpg')}}');">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="relative z-10 flex justify-center items-center h-full text-white px-4">
                <div class="text-center w-full md:w-1/2 pl-2">
                    <h1 class="text-4xl md:text-6xl font-bold">"Descubre mundos, crea el tuyo."</h1>
                    <p class="mt-4 text-lg md:text-xl">En nuestra biblioteca, cada libro es una puerta a un nuevo universo, 
                        una fuente de inspiración y conocimiento. Aquí encontrarás el espacio perfecto para sumergirte en historias 
                        cautivadoras, aprender algo nuevo cada día y construir las ideas que transformarán tu futuro. ¡Haz de la lectura tu mejor aventura!</p>   
                </div>
            </div>
        </section> 

        {{--Productos lista--}}

        <section class="py-16 px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold text-center mb-8">Algunos de nuestros productos</h2>
                <ul class="space-y-4">
                    <li class="bg-gray p-4 shadow rounded-lg flex items-center justify-between">
                        <span>Frapp de Cookies & Cream</span>
                        <span>S/. 16.00</span>
                    </li>
                    <li class="bg-gray p-4 shadow rounded-lg flex items-center justify-between">
                        <span>Pie de manzana</span>
                        <span>S/. 5.00</span>
                    </li>
                    <li class="bg-gray p-4 shadow rounded-lg flex items-center justify-between">
                        <span>Cappucchino</span>
                        <span>S/. 7.00</span>
                    </li>
                </ul>
            </div>
        </section>        
    </main>
          
</x-app-layout>
