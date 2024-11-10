<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $book->title }}" required>
        <label>Author:</label>
        <input type="text" name="author" value="{{ $book->author }}" required>
        <label>Publisher:</label>
        <input type="text" name="publisher" value="{{ $book->publisher }}" required>
        <label>Summary:</label>
        <textarea name="summary" required>{{ $book->summary }}</textarea>
        <label>Price:</label>
        <input type="number" name="price" value="{{ $book->price }}" step="0.01" required>
        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $book->stock }}" required>
        <label>Category:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        <img src="{{$book->image_url}}" alt="{{$book->title}}" width="100px">
        <button type="submit">Update</button>
    </form>
</body>
</html>
