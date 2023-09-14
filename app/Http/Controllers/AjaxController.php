<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }

    public function store(Request $request)
    {
        Employee::create($request->all());

        return response(['success' => 'Employee created successfully.']);
    }
}
