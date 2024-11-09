<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Category Name:</label>
        <input type="text" name="category_name" value="{{ $category->category_name }}" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
