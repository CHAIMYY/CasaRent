@include('partials.sidebar')



    
    <div class="relative overflow-hidden min-h-screen ">
        <img src="{{ asset('images/pexels-anni-roenkae-2156881.jpg') }}" alt="" class="absolute inset-0 -z-10 h-screen  w-full object-cover object-right bg-cover  md:object-center">
        
<div class="mt-28 ml-36">


    <form class="max-w-md mx-auto" action="{{ route('users.search') }}" method="GET"> 
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search users" required /> <!-- 2. Update input name -->
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    </div>
   <div class="mt-20 grid gap-2 "> 

@foreach ($users as $user)


@if ($user->banned)
<ul role="list" class="divide-y divide-gray-100 ml-80  mr-20 bg-white px-5 rounded-lg">
    <li class="flex justify-between gap-x-6 py-5">
      <div class="flex min-w-0 gap-x-4">
        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$user->photo}}" alt="">
        <div class="min-w-0 flex-auto">
          <p class="text-sm font-semibold leading-6 text-gray-900">{{$user->name}}</p>
          <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$user->email}}</p>
        </div>
      </div>
      <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
        <p class="text-base font-mono font-bold leading-6 text-blue-700">{{$user->role}}</p>
        <p class="mt-1 text-xs leading-5 text-gray-500">{{$user->created_at}} </p>
        @if($user->role != 'admin')
        <form class="mt-1 text-xs leading-5 text-red-500"  action="{{ route('unban.user', ['userId' => $user->id]) }}" method="post">
          @csrf
          @method('PUT')

          <button type="submit" class="mt-1 text-xs leading-5 text-red-500">Banned</button>
      </form>
      @endif
    </div>
  </li>
</ul>
      @else

      <ul role="list" class="divide-y divide-gray-100 ml-80  mr-20 bg-white px-5 rounded-lg">
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$user->photo}}" alt="">
            <div class="min-w-0 flex-auto">
              <p class="text-sm font-semibold leading-6 text-gray-900">{{$user->name}}</p>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$user->email}}</p>
            </div>
          </div>
          <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-base font-mono font-bold leading-6 text-blue-700">{{$user->role}}</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">{{$user->created_at}} </p>
            @if($user->role != 'admin')
            <form class="mt-1 text-xs leading-5 text-red-500"  action="{{ route('ban.user', ['userId' => $user->id]) }}" method="post">
              @csrf
              @method('PUT')
    
              <button type="submit" class="mt-1 text-xs leading-5 text-green-500">UnBan</button>
          </form>
          @endif

       
      </div>
    </li>
  </ul>
  @endif
@endforeach






    </div> 


