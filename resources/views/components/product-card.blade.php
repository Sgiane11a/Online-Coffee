<li class="bg-white p-2 text-black rounded-sm">
<img class="rounded-md" 
    src="https://res.cloudinary.com/doirzq4zq/image/upload/{{ $products->image_public_id }}.jpg" 
     alt="{{ $text }}">

    <div class="flex justify-between p-2">
        <div class="">
            <h2 class="text-raspberry-900 font-semibold">{{ $text }}</h2>
            <p class="text-red-700 font-bold">{{ $precio }}</p>
        </div>
        <!--<svg class="my-auto mx-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48"><defs><mask id="IconifyId19312e3a1dbb5da893"><g fill="none"><path fill="#fff" d="M39 32H13L8 12h36z"/><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M3 6h3.5L8 12m0 0l5 20h26l5-20z"/><circle cx="13" cy="39" r="3" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/><circle cx="39" cy="39" r="3" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/><path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M22 22h8m-4 4v-8"/></g></mask></defs><path fill="#4f46e5" d="M0 0h48v48H0z" mask="url(#IconifyId19312e3a1dbb5da893)"/></svg>-->
    </div>
</li>
