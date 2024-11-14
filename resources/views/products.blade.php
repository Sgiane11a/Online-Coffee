@extends('layouts.index')

@section('content')
    <main class="px-4 py-8">
        <section class="flex flex-col gap-16">
            <h1 class="text-8xl text-center font-extrabold title">Productos</h1>
            <ul class="flex gap-6 justify-center">
                <x-product-button url="/snaksSalado" text="Snaks Salados" variant='default' />
                <x-product-button url="/bebidas" text="Bebidas" variant='default' />
                <x-product-button url="/snaksDulce" text="Snaks Dulces" variant='selected' />
            </ul>

            <ul class="grid grid-cols-2 lg:grid-cols-4 justify-center gap-4">
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte1" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte2" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte3" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte4" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte5" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte6" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte7" precio="$10" />
                <x-product-card
                    image="https://img.freepik.com/fotos-premium/cibercafes-centros-internet-primeras-redes-sociales-concepto-cibercafe-historia-popularidad-primeras-redes-sociales-evolucion-centro-internet_918839-31851.jpg"
                    text="Latte8" precio="$10" />
            </ul>
        </section>
    </main>
@endsection
