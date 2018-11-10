<?php

namespace App\Http\Controllers;

use App\consultation_reply;
use Illuminate\Http\Request;
use App\answer;
class consultationReplyController extends Controller
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
        $reply = new consultation_reply();
        $reply->Answer_id = $request['answer_id'];
        $reply->Reply     = $request['reply'];
        $reply->ReplyFrom = $userID;
        $reply->save();
        $output = '';
        $ansss = answer::find($request['answer_id']);
        $anss = answer::where('Consultation_id', $ansss->Consultation_id)->get();
        $replys = consultation_reply::all();
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
                                <button class="buton col-md-2 addreply" id="'.$value["ID"].'" name=" ">Add Reply</button>
                            </div>';
                foreach ($replys as  $reply) {
                    if($value['ID'] == $reply['Answer_id']){
                    $output .=' 
                            <div class="col-md-9 col-md-offset-1 consultation" style="margin-bottom: 30px;">
                            <div class="btn-group" style="float:right;margin-top: 10px;">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                <span class="fa fa-ellipsis-h"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                <li style="cursor:pointer;"><a id="'.$reply['ID'].'" class="delete_r">Delete</a></li>
                                  <li style="cursor:pointer;"><a id="'.$reply['ID'].'" class="edit_r" name=" ">Edit</a></li>
                              </ul>
                          </div>
                          <div class="col-md-10 consultation_content">
                            <p>'.$reply['Reply'].'</p>
                          </div>
                          <input type="hidden" class="hidans_r" value="'.$reply['Reply'].'">
                          <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                        </div>
                    ';
                    }
                }
            }

            return $output;
        }else{
            return $output;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consultation_reply  $consultation_reply
     * @return \Illuminate\Http\Response
     */
    public function show(consultation_reply $consultation_reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consultation_reply  $consultation_reply
     * @return \Illuminate\Http\Response
     */
    public function edit(consultation_reply $consultation_reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consultation_reply  $consultation_reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $reply = consultation_reply::find($request['id']);
        $reply->Reply = $request['reply'];
        $reply->save();
        $output = '';
        $ansss = answer::find($reply->Answer_id);
        $anss = answer::where('Consultation_id', $ansss->Consultation_id)->get();
        $replys = consultation_reply::all();
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
                                <button class="buton col-md-2 addreply" id="'.$value["ID"].'" name=" ">Add Reply</button>
                            </div>';
                foreach ($replys as  $reply) {
                    if($value['ID'] == $reply['Answer_id']){
                    $output .=' 
                            <div class="col-md-9 col-md-offset-1 consultation" style="margin-bottom: 30px;">
                            <div class="btn-group" style="float:right;margin-top: 10px;">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                <span class="fa fa-ellipsis-h"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                <li style="cursor:pointer;"><a id="'.$reply['ID'].'" class="delete_r">Delete</a></li>
                                  <li style="cursor:pointer;"><a id="'.$reply['ID'].'" class="edit_r" name=" ">Edit</a></li>
                              </ul>
                          </div>
                          <div class="col-md-10 consultation_content">
                            <p>'.$reply['Reply'].'</p>
                          </div>
                          <input type="hidden" class="hidans_r" value="'.$reply['Reply'].'">
                          <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                        </div>
                    ';
                    }
                }
            }

            return $output;
        }else{
            return $output;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consultation_reply  $consultation_reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $reply = consultation_reply::find($request['reply']);
        $ans = $reply->Answer_id;
        $output = '';
        $reply->delete();
        $ansss = answer::find($ans);
        $anss = answer::where('Consultation_id', $ansss->Consultation_id)->get();
        $replys = consultation_reply::all();
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
                                <button class="buton col-md-2 addreply" id="'.$value["ID"].'" name=" ">Add Reply</button>
                            </div>';
                foreach ($replys as  $reply) {
                    if($value['ID'] == $reply['Answer_id']){
                    $output .=' 
                            <div class="col-md-9 col-md-offset-1 consultation" style="margin-bottom: 30px;">
                            <div class="btn-group" style="float:right;margin-top: 10px;">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                <span class="fa fa-ellipsis-h"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                <li style="cursor:pointer;"><a id="'.$reply['ID'].'" class="delete_r">Delete</a></li>
                                  <li style="cursor:pointer;"><a id="'.$reply['ID'].'" class="edit_r" name=" ">Edit</a></li>
                              </ul>
                          </div>
                          <div class="col-md-10 consultation_content">
                            <p>'.$reply['Reply'].'</p>
                          </div>
                          <input type="hidden" class="hidans_r" value="'.$reply['Reply'].'">
                          <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                        </div>
                    ';
                    }
                }
            }

            return $output;
        }else{
            return $output;
        }

    }
}
