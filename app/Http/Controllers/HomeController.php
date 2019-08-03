<?php

namespace App\Http\Controllers;

use App\Employee;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salaries = 0;
        $numemp = 0;
        $numoff = 0;

        $results = Employee::select('salary')->from('employees')->where ( 'user_id','=',Auth::user()->id)->get ();

        foreach ($results as $salary) {
            $salaries += $salary->salary;
        }

        $numemp = Employee::select('*')->from('employees')->where('user_id','=',Auth::user()->id)->count('*');
        $numoff = Employee::select('*')->from('offices')->where('user_id','=',Auth::user()->id)->count('*');

        return view('home', compact('salaries', 'numemp', 'numoff'));
    }
}
