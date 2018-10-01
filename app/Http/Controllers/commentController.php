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
                    <div class = "btn-group" style="float:right;">
                     <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                            <span class = "fa fa-ellipsis-h"></span>
                            </button>
                         <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="delete">Delete</a></li>
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="edit" name=" " >Edit</a></li>
                         </ul>
                     </div>
                    <a href="#">
                        <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                        <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                    </a>
                    <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$value["Comment"].'</div>
                    <input type="hidden" class="com" value="'.$value["Comment"].'">
                    
                    
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
    public function update(Request $request)
    {
        $com_id = $request['id'];
        $com_val = $request['comment'];
        $com = comment::find($com_id);
        $com->Comment = $com_val;
        $com->save();
        $coms = comment::all();
        $output = '';
        foreach ($coms as $value) {
                $output .= '

                        <div class="commentsDiv" style="padding:10px;">
                    <div class = "btn-group" style="float:right;">
                     <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                            <span class = "fa fa-ellipsis-h"></span>
                            </button>
                         <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="delete">Delete</a></li>
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="edit" name=" ">Edit</a></li>
                         </ul>
                     </div>
                    <a href="#">
                        <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                        <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                    </a>
                    <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$value["Comment"].'</div>
                    <input type="hidden" class="com" value="'.$value["Comment"].'">
                    
                    
                </div>

                        ';

               }
               
        return $output;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {       
        $id = $request['comment'];
        $output = '';
        $comm = comment::find($id);
        if(!is_null($comm)){
                $comm->delete();

                $coms = comment::all();
                foreach ($coms as $value) {
                   $output .= '

                  <div class="commentsDiv" style="padding:10px;">
                    <div class = "btn-group" style="float:right;">
                     <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                            <span class = "fa fa-ellipsis-h"></span>
                            </button>
                         <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="delete">Delete</a></li>
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="edit" name=" ">Edit</a></li>
                         </ul>
                     </div>
                    <a href="#">
                        <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                        <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                    </a>
                    <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$value["Comment"].'</div>
                    <input type="hidden" class="com" value="'.$value["Comment"].'">
                    
                    
                </div>


                        ';

               }
               
               return $output;
        }else{
            $coms = comment::all();
                foreach ($coms as $value) {
                   $output .= '

                 <div class="commentsDiv" style="padding:10px;">
                    <div class = "btn-group" style="float:right;">
                     <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                            <span class = "fa fa-ellipsis-h"></span>
                            </button>
                         <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="delete">Delete</a></li>
                            <li style="cursor:pointer;"><a id="'.$value['ID'].'" class="edit" name=" ">Edit</a></li>
                         </ul>
                     </div>
                    <a href="#">
                        <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                        <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                    </a>
                    <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$value["Comment"].'</div>
                    <input type="hidden" class="com" value="'.$value["Comment"].'">
                    
                    
                </div>


                        ';

               }

               return $output;
        }

    }
}
