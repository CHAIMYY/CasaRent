@extends('layout')
@include('partials.navbar')

<div class="bg-white">
    
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>

  
<form class="flex items-center max-w-lg mx-auto mb-20" method="GET" action="{{ route('home') }}">
  @csrf   
  <label for="voice-search" class="sr-only">Search</label>
  <div class="relative w-full">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        
      </div>
      <input type="text" id="voice-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900  shadow-lg text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search houses, apartements, villas..." required />
     

  </div>
 
  <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 shadow-xl text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
      </svg>Search
  </button>
</form>




<form action="{{ route('home') }}" method="GET">
    @csrf
    
    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <button type="submit" name="category_id" value="" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">All categories</button>
        @foreach($categories as $category)
            <button type="submit" name="category_id" value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }} class="text-gray-900 border border-white bg-gray-200 hover:border-gray-200 hover:text-white hover:bg-blue-400 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">{{ $category->name }}</button>
        @endforeach
    </div>

</form>


  
      <div class="grid grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      
    
    @foreach ($annonces as $annonce)
              
       <!-- Or any other usage you have for categories -->

        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        
              <a href="#">
                <img class="rounded-t-lg object-fill h-48 w-full" src="{{asset('images/' . $annonce->image) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." />
            </a>
          <div class="p-5">
              <a href="#">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white pb-5">{{ $annonce->title }}</h5>
              </a>
            
              {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"></p> --}}
              {{-- col-span-2 --}}
              <div class="grid grid-cols-1 gap-2">
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400  rounded drop-shadow-md px-5 py-0.5 ">location :{{ $annonce->location }} </p>
              <p class="mb-3 font-normal text-green-700 dark:text-green-400  rounded drop-shadow-md px-5 py-0.5 ">Price : {{ $annonce->price }}</p>
              <p class="mb-3 font-normal text-red-700 dark:text-red-400  rounded drop-shadow-md px-5 py-0.5">contact : 0645982736</p>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400  px-5 py-0.5">April 14</p>
              </div>
              <a href="{{ route('details', ['id' => $annonce->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            
          </div>
      </div>  
        @endforeach
 

      {{-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="images/pexels-jean-van-der-meulen-1457842.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="{{route('details')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                 <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div> --}}
        

     
        
          

        {{-- <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
          </a> --}}
        {{-- <a href="{{route('details')}}">see more details</a> --}}
        {{-- <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
        </a> --}}
        {{-- <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
        </a> --}}
  
        <!-- More products... -->
      </div>
    </div>
  </div>

  






























  <!-- component -->
{{-- <div
class="flex flex-col space-y-8  min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-gray-300">
<div class="block rounded-lg bg-white w-72 mt-32">
<div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init data-te-ripple-color="light">
    <img class="rounded-lg  sm:m-h-64 md:h-64 w-full" src="https://a0.muscache.com/im/pictures/prohost-api/Hosting-51701996/original/ac2eabbe-da86-4646-a7d7-f6fe48c083b8.jpeg?im_w=720"
                                alt="" />
    <a href="#!">
        <div
            class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
        </div>
    </a>
</div>

<div class="p-2">
    <div class="flex justify-between">
        <h5 class="mb-2 text-sm font-bold leading-tight text-neutral-800 dark:text-neutral-50">
            Location Name
        </h5>
        <h5 class="mb-2 text-sm font-bold leading-tight text-neutral-800 dark:text-neutral-50 flex">
            5.0 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 ml-1">
                <path fill-rule="evenodd"
                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                    clip-rule="evenodd" />
            </svg>

        </h5>
    </div>
    <p class="mb-1 text-sm text-neutral-600 dark:text-neutral-200">
        Added X weeks ago
    </p>

    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
        Date Range - Owner
    </p>
    <h5 class="mb-2 text-sm font-bold leading-tight text-neutral-800 dark:text-neutral-50">
        Price per night
    </h5>
</div> 
</div>
</div>
--}}
  @include('partials.footer')


  
  

  