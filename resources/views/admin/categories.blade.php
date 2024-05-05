
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Document</title>
</head>

<body>
    @include('partials.sidebar')

     <div class="p-4 xl:ml-80">
        <nav class="block w-full max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1">
          <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">
            <div class="flex items-center">
              <div class="mr-auto md:mr-4 md:w-56">
              </div>
                     <div class="p-2 md:block text-left">
                      <h2 class="text-sm font-semibold text-gray-800"></h2>
                      <p class="text-xs text-gray-500"></p>
                  </div>
              </button>
              </a>
            </div>
          </div>
        </nav> 


  <main >
   
  
  <div class=" p-5 m-5 rounded-lg">
    <div class=" text-black font-bold text-2xl">
        <h1 class="uppercase">CATEGORIES</h1>
    </div>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="btn"
        class="relative block text-white bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        add new Category
    </button>


    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-[50%] max-h-full">


            <div class="relative bg-white rounded-lg shadow dark:bg-blue-700">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create Category
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>


                <form class="max-w-md mx-auto" method="post" action="{{ route('addCategorie') }}">                    
                @csrf
            <div class="relative">
               
                <input type="text" id="name" name="name" class="block w-full shadow-lg p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="create category" required /> 
                <button type="submit" name="addcat" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
            </div>
        </form>
    
            </div>
        </div>
    </div> 
                     @if(session('success'))
                        <div id="alert-border-3" class="flex items-center p-4  my-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ms-3 text-sm font-medium">
                                    {{ session('success') }}
                                </div>
                        </div>
                    @endif


                 </div>
                
            </div>


        </main>
      
   
 
  </body>
  </html>

  



      
     <body class="min-h-screen bg-blue-400">
    <div class="divide-y divide-gray-100 ml-80 mr-20 bg-white px-5 rounded-lg">
        @foreach ($categories as $category)
            <ul role="list" class="py-5">
                <li class="flex justify-between gap-x-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{$category->name}}</p>
                        </div>
                    </div>
                    <div class="hidden sm:flex">
                        <form method="post" action="{{ route('deleteCategorie', $category->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="addcat" class="px-2.5 py-2 bg-red-500 text-white w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-red-500">
                                <i class="fa-solid fa-trash text-[14px]"></i>
                            </button>
                        </form>
                     

                      <div x-data="{ open : false }">
                        <a href="#" @click="open = true" class="">
                        <button type="submit"
                                                            class="px-2.5 py-2 bg-green-500 update  transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-green-500/80 text-white">
                                                        <i class="fa-solid fa-arrows-rotate text-[14px]"></i>
                                                    </button>
                        </button>
                        </a>

  <div class="bg-gray-100 fixed z-10 flex justify-center items-center inset-0 overflow-y-auto" x-show="open" x-cloak style="background-color: #6970ff50;">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md" style="width: 50%; height: fit-content">
        <button @click="open = false" style="margin-right: 10px;">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
        </button>
            <form id="updateForm-{{ $category->id }}" class="max-w-sm mx-auto mt-20" method="post" action="{{ route('updateCategorie') }}">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update category</label>
                    <input type="text" id="category" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                </div>
                <!-- Include a hidden input field to pass the category ID -->
                <input type="hidden" name="categorieID" value="{{ $category->id }}">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>

    </div>
                      
                        




                    </div>


                    </div>
                </li>
            </ul>
            

        @endforeach
    </div>

    <script>
        function toggleUpdateForm(categoryId) {
            const form = document.getElementById('updateForm-' + categoryId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>

    
    </html>
    
    
      
    