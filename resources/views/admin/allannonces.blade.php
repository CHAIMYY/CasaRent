@include('partials.sidebar')

{{-- <div class="relative overflow-hidden min-h-screen ">
    <img src="{{ asset('images/pexels-anni-roenkae-2156881.jpg') }}" alt="" class="absolute inset-0 -z-10 h-screen  w-full object-cover object-right bg-cover  md:object-center">
    --}}
<body class="bg-purple-100">
  

   
      <dl class="grid grid-cols-2 gap-x-8 gap-y-16 lg:grid-cols-3 md:grid-cols-1 ml-72 mt-32 mb-20">
       
        <div class="container mx-auto">
          <div class="w-72 bg-white max-w-xs mx-auto rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-purple-400 flex items-center justify-between">
              <p class="mr-0 text-white text-lg pl-5">Advertisements</p>
            </div>
            <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">
              <p>TOTAL</p>
            </div>
            <p class="py-4 text-3xl ml-5">{{$totalAnnonce}}</p>
            <!-- <hr > -->
          </div>
        </div>
      
        <div class="container mx-auto">
          <div class="w-72 bg-white max-w-xs mx-auto rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-red-400 flex items-center justify-between">
              <p class="mr-0 text-white text-lg pl-5">Categories</p>
            </div>
            <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">
              <p>TOTAL</p>
            </div>
            <p class="py-4 text-3xl ml-5">{{$categories}}</p>
            <!-- <hr > -->
          </div>
        </div>
    
      </dl>



      <form class="max-w-md mx-auto shadow-xl" action="{{route('viewAll')}}" method="GET"> 
        @csrf
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    


@foreach ($annonces as $annonce)
    


      <ul role="list" class="divide-y divide-gray-100 ml-80  mr-20 bg-white px-5 rounded-lg mb-5 shadow-xl">
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <img class="h-24 w-24 flex-none  bg-gray-50" src="{{asset('images/' . $annonce->image) }}" alt="">
            <div class="min-w-0 flex-auto">
              <p class="text-xl font-semibold leading-6 text-gray-900">{{$annonce->title}}</p>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$annonce->location}}</p>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$annonce->description}}</p>
            </div>
          </div>
          <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-sm text-blue-700">By {{$annonce->user->name}}</p>
           
            <form class="mt-1 text-xs leading-5 text-red-500"  action="{{ route('deleteAd' , $annonce->id) }}" method="post">
              @csrf
              @method('delete')
    
              <button type="submit" class="mt-1 text-xs leading-5 text-white bg-red-600 px-5 py-3 rounded-lg hover:bg-red-700 ">delete</button>
          </form>
       
        </div>
      </li>
    </ul>

   @endforeach

</div>

</body>
