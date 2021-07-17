<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentCollection;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(): DepartmentCollection
    {
        return new DepartmentCollection(Department::paginate());
    }
}
