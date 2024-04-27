@include('partials.sidebar')
<body class="bg-gradient-to-r from-violet-100 to-blue-200">
  


{{-- <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
    <img src="{{ asset('images/pexels-francesco-ungaro-1878715.jpg') }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"> --}}
    {{-- <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
      <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-yellow-200 to-red-400 opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
      <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-blue-600 to-purple-700 opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div> --}}




    <form class="max-w-sm mx-auto mt-32" method="POST" action="{{route('addAnnonce')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">title</label>
        <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
      </div>
      <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea type="text" id="description" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required ></textarea>
      </div>
      <div class="mb-5">
        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
        <input type="text" id="location" name="location" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
      </div>
      <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input type="number" id="price" name="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
      </div>
      <div class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
        <input type="file" id="image" name="image" accept="image/*" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    
   
    <div class="form-group">
      <label for="categories_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
      <select name="categories_id" id="categories_id" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          @foreach($categories as $category)
              <option value="{{ $category->id }}" >{{ $category->name }}</option>
          @endforeach
      </select>
  </div>
            {{-- <div class="mb-5">
        <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
        <input type="number" id="categorie_id" name="categories_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
    
      </div> --}}

      <button type="submit" class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
    </form>
    


{{-- </div> --}}


</body>







<!-- component -->
{{-- <main class="w-screen h-screen flex justify-center items-center dark:bg-purple-100">
  <div class="max-w-7xl dark:bg-white dark:text-white">
    <form class=" w-full p-4 rounded shadow-md" action="/submit-comment" method="post">
      <h2 class="text-xl mb-4 tracking-wider font-lighter text-gray-900 dark:text-gray-200 md:text-sm ">Leave a Comment</h2>
      <p class="text-gray-600 mb-4 md:text-sm">Your email address will not be published. Required fields are marked *</p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="mb-4 col-span-1 md:col-span-3">
          <textarea
        id="comment"
        name="comment"
        class="w-full px-3 py-2 dark:bg-white rounded-sm border-gray-300 dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed resize-none md:text-sm"
        placeholder="Type Comment...*"
        rows="5"

        required
      ></textarea>
        </div>

        <div class="mb-4">
          <input
        type="text"
        id="name"
        name="name"
        class="w-full px-3 py-2 dark:bg-gray-900 rounded-sm border-gray-300 dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed"
        placeholder="Name*"
        required
      />
        </div>
        <div class="mb-4">
          <input
        type="email"
        id="email"
        name="email"
        class="w-full px-3 py-2 dark:bg-gray-900 rounded-sm border-gray-300 dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed"
        placeholder="Email*"
        required
      />
        </div>
        <div class="mb-4">
          <input
        type="text"
        id="website"
        name="website"
        class="w-full px-3 py-2 dark:bg-gray-900 rounded-sm border-gray-300 dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed"
        placeholder="Website"
      />
        </div>
      </div>
      <div class="flex justify-end">
        <button
        type="submit"
        class="py-4 px-6 bg-blue-950 text-white rounded-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800"
      >
        Post Comment →
      </button>
      </div>
    </form>
  </div>
</main> --}}