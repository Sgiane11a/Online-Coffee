<div id="mobile-menu" class="md:hidden">
    <ul class="flex flex-col items-center bg-white shadow-md hidden">
        <x-header-link url="{{route('products')}}" text="Productos" />
        <x-header-link url="/reservas" text="Reservas" />
        <x-header-link url="/biblioteca" text="Biblioteca" />
        <x-header-link url="/foro" text="Comunidad" />
    </ul>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu').querySelector('ul');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>