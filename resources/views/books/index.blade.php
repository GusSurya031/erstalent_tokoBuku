<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>
    <h1>Book List</h1>
    <a href="{{ route('books.create') }}">Add New Book</a>
    <ul>
        @foreach ($books as $book)
            <li>
                {{ $book->title }} - {{ $book->author }}
                <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
