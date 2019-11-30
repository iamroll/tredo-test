<?php

namespace App\Http\Controllers;

use App\Model\EmployeeDepartment;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('main.main');
    }
}
