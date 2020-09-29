<?php

namespace App\Http\Controllers;

use App\Filters\TodoFilters;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(TodoFilters $filters)
    {
        return Todo::filter($filters)->paginate(5);
    }

    public function store(Request $request)
    {
        return Todo::create($request->all());
    }
}
