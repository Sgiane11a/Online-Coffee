<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-section gap-4">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-fuchsia-500 shadow-2xl overflow-hidden sm:rounded-lg border-4 border-fuchsia-700">
        {{ $slot }}
    </div>
</div>
