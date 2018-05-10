<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCode;
use DB;

class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['zipcode'] = DB::collection('postmongo')->paginate(500);
        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $newzip = new ZipCode;
            $newzip->city = $request['city'];
            $newzip->loc = [$request['longitude'], $request['latitude']];
            $newzip->pop = $request['population'];
            $newzip->state = $request['state'];
            $newzip->save();   
        } catch (Exception $e) {
            echo $e;
        }

        return redirect('zipcode');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['zipCode'] = ZipCode::find($id);
        return view('update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newzip = ZipCode::find($id);
        $newzip->city = $request['city'];
        $newzip->loc = [$request['longitude'], $request['latitude']];
        $newzip->pop = $request['population'];
        $newzip->state = $request['state'];
        $newzip->save();

        return redirect('zipcode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ZipCode::find($id)->delete();
        return redirect('zipcode');
    }
}
