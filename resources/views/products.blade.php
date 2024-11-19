@extends('layouts.home')

@section('main')
    <main class="px-4 py-8">
        <section class="flex flex-col gap-16">
            <h1 class="text-8xl text-center font-extrabold title">Productos</h1>
            @livewire('product-filter')
        </section>
    </main>
@endsection
