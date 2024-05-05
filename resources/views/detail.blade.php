@extends('layout')
@include('partials.navbar')

<div class="bg-white">
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">{{ $annonce->title}}</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>
       
        </ol>
      </nav>
  
  
  
<div class="max-w-2xl mx-auto mt-20">


    <img src="{{asset('images/' . $annonce->image) }}" src="/docs/images/examples/image-1@2x.jpg" >
</div>


      <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $annonce->title }}</h1>
        </div>
  
       
        <div class="mt-4 lg:row-span-3 lg:mt-0">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl tracking-tight text-gray-900"> {{ $annonce->price }} MAD per month</p>
  
       
   
          <form class="mt-10">
           
            <div>
              <h2 class="text-xl font-medium text-gray-900 pb-5"></h2>
  
          
            </div>
  
        <div class="grid grid-rows-3 grid-flow-col gap-2">
         
        <img class="h-20 w-20 flex-none rounded-full bg-gray-50 row-span-3" src="/images/{{ $annonce->user->photo }}" alt="">
        
            <h2 class="text-xl font-bold text-gray-600 col-span-5">{{ $annonce->user->name }}</h2>
            <h3 class="text-sm font-medium text-gray-600 col-span-5">{{ $annonce->user->email }}</h3>
            
        </div>
        
           
          </form>
        </div>
  
        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        
          <div>
            <h3 class="sr-only">Description</h3>
  
            <div class="space-y-6">
              <p class="text-base text-gray-900">{{ $annonce->location }}</p>
            </div>
          </div>
  
        
  
          <div class="mt-10">
            <h2 class="text-sm font-medium text-gray-900">Details</h2>
  
            <div class="mt-4 space-y-6">
              <p class="text-sm text-gray-600">{{ $annonce->description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  
  @include('partials.footer')
  