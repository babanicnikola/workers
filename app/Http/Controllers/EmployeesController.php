<?php

namespace App\Http\Controllers;

use Auth;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Employee::select('*')->from('employees')->where ( 'user_id','=',Auth::user()->id)->get ();

        return view('employees.employees',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([//Validate data received
            'name' => 'required',
            'position' => 'required',
            'office' => 'required',
            'age' => 'required',
            'start_date' => 'required',
            'salary' => 'required'
        ]);
        Employee::create(['user_id' => Auth::user()->id, 'name' => $request->name, 'position' => $request->position, 'office' => $request->office, 'age' =>$request->age, 'start_date' =>$request->start_date, 'salary' =>$request->salary]);//Create new record with all data
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Employee::find($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([//Validate data received
            'id' => 'required',
            'name' => 'required',
            'position' => 'required',
            'office' => 'required',
            'age' => 'required',
            'start_date' => 'required',
            'salary' => 'required'
        ]);
        Employee::whereId($request->id)->update(request()->except(['_token', '_method']));
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Employee::findOrFail($id);
 
        $post->delete($id); 
          
        return redirect('/employees');
    }
}
