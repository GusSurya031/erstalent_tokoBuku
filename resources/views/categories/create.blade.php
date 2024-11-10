<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Category</title>
</head>
<body>
    <h1>Create New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label>Category Name:</label>
        <input type="text" name="category_name" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
