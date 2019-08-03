<?php

namespace App\Http\Controllers;

use App\office;
use Auth;
use Illuminate\Http\Request;

class officesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = office::select('*')->from('offices')->where('user_id','=',Auth::user()->id)->get();

        return view('offices.offices',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city',
            'street'
        ]);
        office::create(['user_id' => Auth::user()->id, 'name' => $request->name,  'city' =>$request->city, 'street' =>$request->street]);

        return redirect('/offices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = office::find($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, office $office)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'city',
            'street'
        ]);
        office::whereId($request->id)->update(request()->except(['_token', '_method']));

        return redirect('/offices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = office::findOrFail($id);
        $post->delete($id); 
          
        return redirect('/offices');
    }
}
