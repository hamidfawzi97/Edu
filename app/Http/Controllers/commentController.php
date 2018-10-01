<?php

namespace App\Http\Controllers;

use App\comment;
use App\comment_reply;
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

       $userID = \Auth::user()->id;

       $com = new comment();
       $com->Comment = $request['comment'];
       $com->save();
       $output = '';
       $coms = comment::all();
       $replys = comment_reply::all();


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

                
                    <div id="replyDiv'.$value['ID'].'" style="margin-left:50px;">
                        <div id="viewReply'.$value['ID'].'">
            ';

            if($replys){
                foreach ($replys as $reply) {
                    if($reply['Comment_id'] == $value['ID']){
                        $output .= '
                                <div class = "btn-group" style="float:right;">
                                    <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                                        <span class = "fa fa-ellipsis-h"></span>
                                    </button>
                                    <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                                        <li style="cursor:pointer;"><a id="rep'.$reply["ID"].'" class="delete">Delete</a></li>
                                        <li style="cursor:pointer;"><a id="rep'.$reply["ID"].'" class="edit" name=" " >Edit</a></li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                                    <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                                </a>
                                <div style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$reply["Reply"].'</div>
                                <input type="hidden" class="com" value="'.$reply["Reply"].'">
                        ';
                    }
                }
            }

            $output .= '
 
                        </div>

                        <button id="replyBtn'.$value['ID'].'" class="btn btn-default">Reply</button>
                        <script>
                            $(document).ready(function(){
                                $("#replyBtn'.$value['ID'].'").on("click", function(){

                                    $("#replyBtn'.$value['ID'].'").css("display", "none");

                                    $("#replyDiv'.$value['ID'].'").append("\
                                        <div id=\"replyForm'.$value['ID'].'\">\
                                            <form method=\"POST\" action=\"\">\
                                                \
                                                <textarea class=\"form-control\" id=\"replyText'.$value['ID'].'\" style=\"resize:none;\" name=\"replyText'.$value['ID'].'\" required=\"\"></textarea>\
                                                <input id=\"submit'.$value['ID'].'\" type=\"submit\" class=\"btn btn-success\" value=\"Reply\"/>\
                                                <button id=\"cancel'.$value['ID'].'\" class=\"btn btn-danger\">Cancel</button>\
                                            </form>\
                                        </div>\
                                        <script>\
                                            $(\"#cancel'.$value['ID'].'\").on(\"click\", function(){\
                                                $(\"#replyForm'.$value['ID'].'\").remove();\
                                                $(\"#replyBtn'.$value['ID'].'\").css(\"display\", \"block\");\
                                            });\
    \
                                            $(\"#submit'.$value['ID'].'\").on(\"click\", function(e){\
                                                e.preventDefault();\
                                                var reply = $(\"#replyText'.$value['ID'].'\").val();\
                                                var commentID = '.$value['ID'].';\
    \
                                                $.ajax({\
                                                    url:\"/addreply\",\
                                                    type:\"POST\",\
                                                    data:{_token : \"'. csrf_token() .'\", reply:reply, commentID:commentID},\
                                                    success:function (data) {\
                                                          $(\"#viewReply'.$value['ID'].'\").append(data);\
                                                          $(\"#replyForm'.$value['ID'].'\").remove();\
                                                          $(\"#replyBtn'.$value['ID'].'\").css(\"display\", \"block\");\
                                                    }\
                                                });\
                                            });\
                                        <\/script>\
                                    ");
                                });    
                            });
                        </script>
                    </div>
                </div>';


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
