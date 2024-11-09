<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Book</title>
</head>
<body>
    <h1>Create New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Author:</label>
        <input type="text" name="author" required>
        <label>Publisher:</label>
        <input type="text" name="publisher" required>
        <label>Summary:</label>
        <textarea name="summary" required></textarea>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>
        <label>Stock:</label>
        <input type="number" name="stock" required>
        <label>Category:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        <button type="submit">Save</button>
    </form>
</body>
</html>
