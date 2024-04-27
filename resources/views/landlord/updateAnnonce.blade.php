@include('partials.sidebar')

<body class="bg-gradient-to-r from-violet-100 to-blue-200">


    {{-- <h1 class="ml-72 mt-20 text-2xl text-gray-900 dark:text-white">Update -></h1> --}}

<form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto mt-20">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" name="title" id="title" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $annonce->title }}" required>
    </div>

    <div class="form-group">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea name="description" id="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>{{ $annonce->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
        <input type="text" name="location" id="location" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $annonce->location }}" required>
    </div>

    <div class="form-group">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input type="number" name="price" id="price" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $annonce->price }}" required>
    </div>

    <div class="form-group">
        <label for="categories_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
        <select name="categories_id" id="categories_id" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $annonce->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
        <input type="file" name="image" id="image" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <button type="submit" class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</form>
</body>