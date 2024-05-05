@extends('layout')
@include('partials.navbar')
<div class="bg-gray-100">
   
    <div class="flex flex-row flex-wrap">
        <div class="relative isolate px-6 pt-14 lg:px-8 ">
          
            <div class="mx-auto lg:max-w-2xl lg:py-56">
            
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">The premier destination for
                        renting your dream home.</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Discover the ultimate platform for finding your
                        ideal rental home, offering unparalleled convenience and an extensive selection to suit your
                        needs.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">

                        <a href=" {{ route('register') }}"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                            started</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
          
        </div>

        <div class="relative isolate px-6 pt-14 lg:px-8 lg:basis-1/2 mt-20">
            <div class="row align-items-center ">

                <div class="col-lg-6">
                    <img src="{{ asset('images/banner.png') }} " alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
    <div class="md:h-64">

        <video class="absolute inset-0 -z-10 lg:h-full w-full object-cover object-right md:object-center brightness-50"
            autoplay loop muted>
            <source src="{{ asset('images/7348049-uhd_3840_2160_25fps.mp4') }}" type="video/mp4">

        </video>
    </div>
 
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Unlock the key to flexible living with
                our rental options tailored just for you!</h2>
            <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure
                qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
        </div>
        <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <div
                class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                <a href="#">Open roles <span aria-hidden="true">&rarr;</span></a>
                <a href="#">Internship program <span aria-hidden="true">&rarr;</span></a>
                <a href="#">Our values <span aria-hidden="true">&rarr;</span></a>
                <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-300">Offices worldwide</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-white">12</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-300">Full-time colleagues</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-white">300+</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-300">Hours per week</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-white">40</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-300">Paid time off</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-white">Unlimited</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

<div class="relative isolate overflow-hidden bg-white py-24 sm:py-32">
   
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">Work with us</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure
                qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
        </div>
        <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <div
                class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-black sm:grid-cols-2 md:flex lg:gap-x-10">
                <a href="#">Open roles <span aria-hidden="true">&rarr;</span></a>
                <a href="#">Internship program <span aria-hidden="true">&rarr;</span></a>
                <a href="#">Our values <span aria-hidden="true">&rarr;</span></a>
                <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-600">Offices worldwide</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-black">12</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-600">Full-time colleagues</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-black">300+</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-600">Hours per week</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-black">40</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="text-base leading-7 text-gray-600">Paid time off</dt>
                    <dd class="text-2xl font-bold leading-9 tracking-tight text-black">Unlimited</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

@include('partials.footer')
