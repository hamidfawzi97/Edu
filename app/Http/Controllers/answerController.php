<?php

namespace App\Http\Controllers;

use App\answer;
use Illuminate\Http\Request;

class answerController extends Controller
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
       $userID = \Auth::user()->id;

       $ans = new answer();
       $ans->Consultation_id = $request['cons_id'];
       $ans->Consulter_id = $userID;
       $ans->Answer = $request['answer'];
       $ans->save();
       $output = '';
       $anss = answer::where('Consultation_id', $request['cons_id'])->get();

       foreach ($anss as $value) {
           $output .= ' <div class="col-md-10 consultation" style="margin-bottom: 30px;">
                            <div class="btn-group" style="float:right;margin-top: 10px;">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                    <span class="fa fa-ellipsis-h"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                    <li style="cursor:pointer;"><a id="'.$value["ID"].'" class="delete">Delete</a></li>
                                    <li style="cursor:pointer;"><a id="'.$value["ID"].'" class="edit" name=" ">Edit</a></li>
                                </ul>
                            </div>
                            <div class="col-md-10 consultation_content">
                                <p>'.$value["Answer"].'</p>
                            </div>
                            <input type="hidden" class="hidans" value="'.$value["Answer"].'">
                            <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                        </div>';
       }

       return $output;
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ans = answer::find($request['id']);
        $ans->Answer = $request['answer'];
        $cons_id = $ans->Consultation_id;
        $ans->save();

        $output = '';
        $anss = answer::where('Consultation_id', $cons_id)->get();

        foreach ($anss as $value) {
            $output .= ' <div class="col-md-10 consultation" style="margin-bottom: 30px;">
                            <div class="btn-group" style="float:right;margin-top: 10px;">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                    <span class="fa fa-ellipsis-h"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                    <li style="cursor:pointer;"><a id="'.$value["ID"].'" class="delete">Delete</a></li>
                                    <li style="cursor:pointer;"><a id="'.$value["ID"].'" class="edit" name=" ">Edit</a></li>
                                </ul>
                            </div>
                            <div class="col-md-10 consultation_content">
                                <p>'.$value["Answer"].'</p>
                            </div>
                            <input type="hidden" class="hidans" value="'.$value["Answer"].'">
                            <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                        </div>';
        }

        return $output;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ans = answer::find($request['answer']);
        $cons_id = $ans->Consultation_id;
        $output = '';
        $ans->delete();
        $anss = answer::where('Consultation_id', $cons_id)->get();

        if($anss->count()){
            
            foreach ($anss as $value) {
                $output .= '<div class="col-md-10 consultation" style="margin-bottom: 30px;">
                                <div class="btn-group" style="float:right;margin-top: 10px;">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                        <li style="cursor:pointer;"><a id="'.$value["ID"].'" class="delete">Delete</a></li>
                                        <li style="cursor:pointer;"><a id="'.$value["ID"].'" class="edit" name=" ">Edit</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-10 consultation_content">
                                    <p>'.$value["Answer"].'</p>
                                </div>
                                <input type="hidden" class="hidans" value="'.$value["Answer"].'">
                                <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                            </div>';
            }

            return $output;
        }else{
            return $output;
        }
    }
}
