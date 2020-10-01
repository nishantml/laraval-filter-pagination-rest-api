<?php

namespace App\Http\Controllers;

use App\Filters\TodoFilters;
use App\Todo;
use App\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(TodoFilters $filters)
    {
        return Todo::with('assigned_user')->filter($filters)->paginate(5);
    }

    public function users_todo()
    {
        return User::with('todo')->paginate(5);
    }

    public function store(Request $request)
    {
        return Todo::create($request->all());
    }
}
