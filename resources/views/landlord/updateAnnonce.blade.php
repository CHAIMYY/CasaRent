@include('partials.sidebar')
<form action="{{ route('annonce.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $annonce->title }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="5" required>{{ $annonce->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control" value="{{ $annonce->location }}" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $annonce->price }}" required>
    </div>

    <div class="form-group">
        <label for="categories_id">Category</label>
        <select name="categories_id" id="categories_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $annonce->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
