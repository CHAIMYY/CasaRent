@extends('layout')

<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="{{route('landing')}}" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <div class="relative">
      
        </div>
       <a href="{{route('landing')}}" class="text-sm font-semibold leading-6 text-gray-900">about us</a>
         <a href="{{route('home')}}" class="text-sm font-semibold leading-6 text-gray-900">home</a>
      </div>
      
      
    
      @if(auth()->check())

       <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      <a href="/chatify"  >
        <div class="mr-5">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".55" fill="#263238" d="M19.005 3.175H4.674C3.642 3.175 3 3.789 3 4.821V21.02l3.544-3.514h12.461c1.033 0 2.064-1.06 2.064-2.093V4.821c-.001-1.032-1.032-1.646-2.064-1.646zm-4.989 9.869H7.041V11.1h6.975v1.944zm3-4H7.041V7.1h9.975v1.944z"></path></svg>
        </a>
       </div>
        <a href="{{route('logout')}}" class="text-sm font-semibold leading-6 text-gray-900">Log out <span aria-hidden="true">&rarr;</span></a>
      </div>
     
     @else
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        
        <a href="{{route('login')}}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">log in</a>
    </div>
     @endif
    </nav>
  
  </header>
