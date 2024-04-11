@include('partials.sidebar')

<div class="relative overflow-hidden min-h-screen ">
    <img src="{{ asset('images/pexels-anni-roenkae-2156881.jpg') }}" alt="" class="absolute inset-0 -z-10 h-screen  w-full object-cover object-right bg-cover  md:object-center">
   
<div class="bg-gray-400 py-24 sm:py-32 ml-72 mr-10 mt-32 rounded-xl">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-gray-800">Total Annonces</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $totalannonces }}</dd>
        </div>
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-gray-800">Total Categories</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $totalcategories }}</dd>
        </div>
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-gray-800">Total Users</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $totalusers }}</dd>
        </div>
    
      </dl>
    </div>
  </div>
</div>


