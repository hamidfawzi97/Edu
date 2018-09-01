<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $com = new comment();
       $com->Comment = $request['comment'];
       $com->save();
       $output = '';
       $coms = comment::all();
       foreach ($coms as $value) {
          $output .= '

          <div class="commentsDiv" style="padding:10px;">
                    <a href="#">
                        <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                        <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                    </a>
                    <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$value["Comment"].'</div>
                </div>


                ';

       }
       
       return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
