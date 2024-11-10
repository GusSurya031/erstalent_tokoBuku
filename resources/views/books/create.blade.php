<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Book</title>
</head>
<body>
    <h1>Create New Book</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <br>
        <label>Author:</label>
        <input type="text" name="author" required>
        <br>
        <label>Publisher:</label>
        <input type="text" name="publisher" required>
        <br>
        <label>Summary:</label>
        <textarea name="summary" required></textarea>
        <br>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label>Stock:</label>
        <input type="number" name="stock" required>
        <br>
        <label>Category:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        <br>
        <input type="file" accept="image/*" name="image" class="@error('image') is-invalid @enderror">
        @error('image')
            {{$message}}
        @enderror
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
