<?php

namespace App\Http\Controllers;

use App\comment_reply;
use Illuminate\Http\Request;

class commentReplyController extends Controller
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

        $commentID = $request->get('commentID');
        $replyText = $request->get('reply');

        $reply = new comment_reply();

        $reply->Reply = $replyText;
        $reply->Comment_id = $commentID;
        $reply->User_id = $userID;
        

        $reply->save();

        $replyID = $reply->ID;

        $output = '
            <div class = "btn-group" style="float:right;">
                <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                    <span class = "fa fa-ellipsis-h"></span>
                </button>
                <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                    <li style="cursor:pointer;"><a id="rep'.$replyID.'" class="delete">Delete</a></li>
                    <li style="cursor:pointer;"><a id="rep'.$replyID.'" class="edit" name=" " >Edit</a></li>
                </ul>
            </div>
            <a href="#">
                <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
            </a>
            <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$replyText.'</div>
            <input type="hidden" class="com" value="'.$replyText.'">
        ';
        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function show(comment_reply $comment_reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function edit(comment_reply $comment_reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment_reply $comment_reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment_reply $comment_reply)
    {
        //
    }
}
