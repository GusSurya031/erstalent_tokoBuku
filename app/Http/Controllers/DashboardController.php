<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Role;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index(){
        $role_id_admin = 2; //id admin 2
        $books = Book::with('category')->get();
        $users = User::whereNot('role_id', '=', $role_id_admin)->get();
        $transactions = Sale::all();
        $categories = Category::all();
        // dd($users);
        // dd($books);
        return view ('admin.dashboard', compact('books', 'users', 'transactions', 'categories'));
    }

    public function viewTransaction(){
        $sales = Sale::with('user', 'book')->get();
        return view('admin.transaction', compact('sales'));
    }
}
