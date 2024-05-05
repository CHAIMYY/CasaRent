

@include('partials.sidebar')

<body class="bg-gradient-to-r from-cyan-100 to-blue-200">
    

<div class="relative overflow-hidden min-h-screen ">
   
<h1 class="block mb-2 text-5xl font-bold text-white dark:text-white mt-20 ml-32 flex justify-center ">Create Category</h1>

   


    <form class="max-w-md mx-auto" method="post" action="{{ route('addCategorie') }}"> 
        @csrf
        <div class="relative">
           
            <input type="text" id="name" name="name" class="block w-full shadow-lg p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="create category" required /> 
            <button type="submit" name="addcat" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
        </div>
    </form>



    <div class="divide-y divide-gray-100 ml-80 mr-20 bg-white px-5 rounded-lg">
        @foreach ($categories as $category)
        <ul role="list" class="py-5">
            <li class="flex justify-between gap-x-6">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{$category->name}}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <form method="post" action="{{ route('deleteCategorie', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="addcat" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
                    </form>
                </div>
                
            </li>
       
       @endforeach
    </div>

</div>

  
</body>