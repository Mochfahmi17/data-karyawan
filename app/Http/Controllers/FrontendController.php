<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()
    {
        $allSalary = Employee::get();
        return Inertia::render("Dashboard/Home", [
            'allSalary' => $allSalary
        ]);
    }
}
