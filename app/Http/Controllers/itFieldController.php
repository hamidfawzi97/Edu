<?php

namespace App\Http\Controllers;

use App\itfield;
use Illuminate\Http\Request;

class itFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itField = itfield::all();

        return view('admin/IT_Fields/index', compact('itField'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/IT_Fields/addfield');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'fieldname' => 'required',
            'features'  => 'required'
        ]);

        $it = new itfield([
            'Category' => $request->get('fieldname'),
            'Feutures' => $request->get('features')
        ]);
        
        $it->save();

        return redirect()->route('it_fields.index')->with('success', 'IT Field Added !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\itfield  $itfield
     * @return \Illuminate\Http\Response
     */
    public function show(itfield $itfield)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\itfield  $itfield
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $it = itfield::find($id);

        return view('admin/IT_Fields/editfield', compact('it'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\itfield  $itfield
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'fieldname' => 'required',
            'features'  => 'required'
        ]);

        $it = itfield::where('ID', $id)->update([
            'Category' => $request->get('fieldname'),
            'Feutures' => $request->get('features')
        ]);

        return redirect()->route('it_fields.index')->with('success', 'IT Field Edited !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\itfield  $itfield
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $it = itfield::Where('ID',$id)->delete();
        
        return redirect()->route('it_fields.index')->with('success', 'Deleted Successfully !!');
    }
}
