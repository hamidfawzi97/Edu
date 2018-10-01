<?php

namespace App\Http\Controllers;

use App\comment;
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

        $output = '<div id="realReply'.$replyID.'">
            <div class = "btn-group" style="float:right;">
                <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                    <span class = "fa fa-ellipsis-h"></span>
                </button>
                <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                    <li style="cursor:pointer;"><a id="repDel'.$replyID.'" >Delete</a></li>
                    <li style="cursor:pointer;"><a id="repEdit'.$replyID.'" name=" ">Edit</a></li>
                </ul>
                <script>
                    $("#repDel'.$replyID.'").on("click", function() { 
                        var replyID = '.$replyID.';
                        var confir = confirm(\'Ary you sure you want delete this reply?\');
                        if(confir){
                            $.ajax({
                                url:"/deletereply",
                                type:"GET",
                                data:{_token : "'.csrf_token().'", reply:replyID},
                                success:function (data) {

                                    $("#comments").html(data);
                                }
                            });
                        }
                    });

                    $("#repEdit'.$replyID.'").on("click", function(){
                        var replyID = '.$replyID.';

                        $("#repText'.$replyID.'").css("display", "none");
                        

                        if($(this).attr("name") == " "){
                            $(this).attr("name","clicked");

                            $("#realReply'.$replyID.'").append("\
                                <div id=\"editing'.$replyID.'\">\
                                    <textarea class=\"form-control\" id=\"editArea'.$replyID.'\" style=\"resize:none;\"></textarea>\
                                    <button class=\"btn btn-primary\" id=\"editBtn'.$replyID.'\">Save</button>\
                                    <button class=\"btn btn-danger\" id=\"cancelBtn'.$replyID.'\">Cancel</button>\
                                </div>\
                                \
                                <script>\
                                    var replytext = $(\"#rep'.$replyID.'\").val();\
                                    $(\"#editArea'.$replyID.'\").val(replytext);\
                                    \
                                    $(\"#cancelBtn'.$replyID.'\").on(\"click\", function(){\
                                        $(\"#editing'.$replyID.'\").remove();\
                                        $(\"#repText'.$replyID.'\").css(\"display\", \"block\");\
                                        $(\"#repEdit'.$replyID.'\").attr(\"name\",\" \");\
                                    });\
                                    \
                                    $(\"#editBtn'.$replyID.'\").on(\"click\", function(){\
                                        var reply = $(\"#editArea'.$replyID.'\").val();\
                                        \
                                        $.ajax({\
                                            url:\"/editreply\",\
                                            type:\"GET\",\
                                            data:{_token : \"'.csrf_token().'\", reply:reply , replyID:'.$replyID.'},\
                                            success:function (data) {\
                                                  $(\"#comments\").html(data);\
                                                  $(\"#editing'.$replyID.'\").remove();\
                                                  $(\"#repEdit'.$replyID.'\").attr(\"name\",\" \");\
                                            }\
                                        });\
                                    });\
                                <\/script>\
                                ");
                        }
                        

                    });
                </script>
            </div>
            <a href="#">
                <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
            </a>
            <div id="repText'.$replyID.'" style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$replyText.'</div>
            <input type="hidden" id="rep'.$replyID.'" value="'.$replyText.'">
        </div>
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
    public function update(Request $request)
    {
        $replyID = $request['replyID'];
        $replyText = $request['reply'];
        $reply = comment_reply::find($replyID);
        $reply->Reply = $replyText;
        $reply->save();
        $coms = comment::all();
        $output = '';
        $replys = comment_reply::all();

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

                
                    <div id="replyDiv'.$value['ID'].'" style="margin-left:50px;">
                        <div id="viewReply'.$value['ID'].'">
            ';

            if($replys){
                foreach ($replys as $reply) {
                    if($reply['Comment_id'] == $value['ID']){
                        $output .= '<div id="realReply'.$reply["ID"].'">
                                <div class = "btn-group" style="float:right;">
                                    <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                                        <span class = "fa fa-ellipsis-h"></span>
                                    </button>
                                    <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                                        <li style="cursor:pointer;"><a id="repDel'.$reply["ID"].'" >Delete</a></li>
                                        <li style="cursor:pointer;"><a id="repEdit'.$reply["ID"].'" name=" ">Edit</a></li>
                                    </ul>
                                    <script>
                                        $("#repDel'.$reply["ID"].'").on("click", function() { 
                                            var replyID = '.$reply["ID"].';
                                            var confir = confirm(\'Ary you sure you want delete this reply?\');
                                            if(confir){
                                                $.ajax({
                                                    url:"/deletereply",
                                                    type:"GET",
                                                    data:{_token : "'.csrf_token().'", reply:replyID},
                                                    success:function (data) {

                                                        $("#comments").html(data);
                                                    }
                                                });
                                            }
                                        });

                                        $("#repEdit'.$reply["ID"].'").on("click", function(){
                                            var replyID = '.$reply["ID"].';

                                            $("#repText'.$reply["ID"].'").css("display", "none");
                                            

                                            if($(this).attr("name") == " "){
                                                $(this).attr("name","clicked");

                                                $("#realReply'.$reply["ID"].'").append("\
                                                    <div id=\"editing'.$reply["ID"].'\">\
                                                        <textarea class=\"form-control\" id=\"editArea'.$reply["ID"].'\" style=\"resize:none;\"></textarea>\
                                                        <button class=\"btn btn-primary\" id=\"editBtn'.$reply["ID"].'\">Save</button>\
                                                        <button class=\"btn btn-danger\" id=\"cancelBtn'.$reply["ID"].'\">Cancel</button>\
                                                    </div>\
                                                \
                                                    <script>\
                                                        var replytext = $(\"#rep'.$reply["ID"].'\").val();\
                                                        $(\"#editArea'.$reply["ID"].'\").val(replytext);\
                                                        \
                                                        $(\"#cancelBtn'.$reply["ID"].'\").on(\"click\", function(){\
                                                            $(\"#editing'.$reply["ID"].'\").remove();\
                                                            $(\"#repText'.$reply["ID"].'\").css(\"display\", \"block\");\
                                                            $(\"#repEdit'.$reply["ID"].'\").attr(\"name\",\" \");\
                                                        });\
                                                        \
                                                        $(\"#editBtn'.$reply["ID"].'\").on(\"click\", function(){\
                                                            var reply = $(\"#editArea'.$reply["ID"].'\").val();\
                                                            \
                                                            $.ajax({\
                                                                url:\"/editreply\",\
                                                                type:\"GET\",\
                                                                data:{_token : \"'.csrf_token().'\", reply:reply , replyID:'.$reply["ID"].'},\
                                                                success:function (data) {\
                                                                      $(\"#comments\").html(data);\
                                                                      $(\"#editing'.$reply["ID"].'\").remove();\
                                                                      $(\"#repEdit'.$reply["ID"].'\").attr(\"name\",\" \");\
                                                                }\
                                                            });\
                                                        });\
                                                    <\/script>\
                                                    ");
                                            }
                                            

                                        });
                                    </script>
                                </div>
                                <a href="#">
                                    <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                                    <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                                </a>
                                <div id="repText'.$reply["ID"].'" style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$reply["Reply"].'</div>
                                <input type="hidden" id="rep'.$reply["ID"].'" value="'.$reply["Reply"].'">
                            </div>
                        ';
                    }
                }
            }

            $output .= '
 
                        </div>

                        <button id="replyBtn'.$value['ID'].'" class="btn btn-info">Reply</button>
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
     * Remove the specified resource from storage.
     *
     * @param  \App\comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['reply'];
        $output = '';
        $reply = comment_reply::find($id);
        if(!is_null($reply)){
               $reply->delete();

               $coms = comment::all();
               $replys = comment_reply::all();

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

                        
                            <div id="replyDiv'.$value['ID'].'" style="margin-left:50px;">
                                <div id="viewReply'.$value['ID'].'">
                    ';

                    if($replys){
                        foreach ($replys as $reply) {
                            if($reply['Comment_id'] == $value['ID']){
                                $output .= '<div id="realReply'.$reply["ID"].'">
                                        <div class = "btn-group" style="float:right;">
                                            <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                                                <span class = "fa fa-ellipsis-h"></span>
                                            </button>
                                            <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                                                <li style="cursor:pointer;"><a id="repDel'.$reply["ID"].'" >Delete</a></li>
                                                <li style="cursor:pointer;"><a id="repEdit'.$reply["ID"].'" name=" ">Edit</a></li>
                                            </ul>
                                            <script>
                                                $("#repDel'.$reply["ID"].'").on("click", function() { 
                                                    var replyID = '.$reply["ID"].';
                                                    var confir = confirm(\'Ary you sure you want delete this reply?\');
                                                    if(confir){
                                                        $.ajax({
                                                            url:"/deletereply",
                                                            type:"GET",
                                                            data:{_token : "'.csrf_token().'", reply:replyID},
                                                            success:function (data) {

                                                                $("#comments").html(data);
                                                            }
                                                        });
                                                    }
                                                });

                                                $("#repEdit'.$reply["ID"].'").on("click", function(){
                                                    var replyID = '.$reply["ID"].';

                                                    $("#repText'.$reply["ID"].'").css("display", "none");
                                                    

                                                    if($(this).attr("name") == " "){
                                                        $(this).attr("name","clicked");

                                                        $("#realReply'.$reply["ID"].'").append("\
                                                            <div id=\"editing'.$reply["ID"].'\">\
                                                                <textarea class=\"form-control\" id=\"editArea'.$reply["ID"].'\" style=\"resize:none;\"></textarea>\
                                                                <button class=\"btn btn-primary\" id=\"editBtn'.$reply["ID"].'\">Save</button>\
                                                                <button class=\"btn btn-danger\" id=\"cancelBtn'.$reply["ID"].'\">Cancel</button>\
                                                            </div>\
                                                        \
                                                            <script>\
                                                                var replytext = $(\"#rep'.$reply["ID"].'\").val();\
                                                                $(\"#editArea'.$reply["ID"].'\").val(replytext);\
                                                                \
                                                                $(\"#cancelBtn'.$reply["ID"].'\").on(\"click\", function(){\
                                                                    $(\"#editing'.$reply["ID"].'\").remove();\
                                                                    $(\"#repText'.$reply["ID"].'\").css(\"display\", \"block\");\
                                                                    $(\"#repEdit'.$reply["ID"].'\").attr(\"name\",\" \");\
                                                                });\
                                                                \
                                                                $(\"#editBtn'.$reply["ID"].'\").on(\"click\", function(){\
                                                                    var reply = $(\"#editArea'.$reply["ID"].'\").val();\
                                                                    \
                                                                    $.ajax({\
                                                                        url:\"/editreply\",\
                                                                        type:\"GET\",\
                                                                        data:{_token : \"'.csrf_token().'\", reply:reply , replyID:'.$reply["ID"].'},\
                                                                        success:function (data) {\
                                                                              $(\"#comments\").html(data);\
                                                                              $(\"#editing'.$reply["ID"].'\").remove();\
                                                                              $(\"#repEdit'.$reply["ID"].'\").attr(\"name\",\" \");\
                                                                        }\
                                                                    });\
                                                                });\
                                                            <\/script>\
                                                            ");
                                                    }
                                                    

                                                });
                                            </script>
                                        </div>
                                        <a href="#">
                                            <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                                            <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                                        </a>
                                        <div id="repText'.$reply["ID"].'" style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$reply["Reply"].'</div>
                                        <input type="hidden" id="rep'.$reply["ID"].'" value="'.$reply["Reply"].'">
                                    </div>
                                ';
                            }
                        }
                    }

                    $output .= '
         
                                </div>

                                <button id="replyBtn'.$value['ID'].'" class="btn btn-info">Reply</button>
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
        }else{
           $coms = comment::all();
           $replys = comment_reply::all();

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

                    
                        <div id="replyDiv'.$value['ID'].'" style="margin-left:50px;">
                            <div id="viewReply'.$value['ID'].'">
                ';

                if($replys){
                    foreach ($replys as $reply) {
                        if($reply['Comment_id'] == $value['ID']){
                            $output .= '<div id="realReply'.$reply["ID"].'">
                                    <div class = "btn-group" style="float:right;">
                                        <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="border:none">
                                            <span class = "fa fa-ellipsis-h"></span>
                                        </button>
                                        <ul class = "dropdown-menu" role = "menu" style="min-width: 93px;">
                                            <li style="cursor:pointer;"><a id="repDel'.$reply["ID"].'" >Delete</a></li>
                                            <li style="cursor:pointer;"><a id="repEdit'.$reply["ID"].'" name=" ">Edit</a></li>
                                        </ul>
                                        <script>
                                            $("#repDel'.$reply["ID"].'").on("click", function() { 
                                                var replyID = '.$reply["ID"].';
                                                var confir = confirm(\'Ary you sure you want delete this reply?\');
                                                if(confir){
                                                    $.ajax({
                                                        url:"/deletereply",
                                                        type:"GET",
                                                        data:{_token : "'.csrf_token().'", reply:replyID},
                                                        success:function (data) {

                                                            $("#comments").html(data);
                                                        }
                                                    });
                                                }
                                            });

                                            $("#repEdit'.$reply["ID"].'").on("click", function(){
                                                var replyID = '.$reply["ID"].';

                                                $("#repText'.$reply["ID"].'").css("display", "none");
                                                

                                                if($(this).attr("name") == " "){
                                                    $(this).attr("name","clicked");

                                                    $("#realReply'.$reply["ID"].'").append("\
                                                        <div id=\"editing'.$reply["ID"].'\">\
                                                            <textarea class=\"form-control\" id=\"editArea'.$reply["ID"].'\" style=\"resize:none;\"></textarea>\
                                                            <button class=\"btn btn-primary\" id=\"editBtn'.$reply["ID"].'\">Save</button>\
                                                            <button class=\"btn btn-danger\" id=\"cancelBtn'.$reply["ID"].'\">Cancel</button>\
                                                        </div>\
                                                    \
                                                        <script>\
                                                            var replytext = $(\"#rep'.$reply["ID"].'\").val();\
                                                            $(\"#editArea'.$reply["ID"].'\").val(replytext);\
                                                            \
                                                            $(\"#cancelBtn'.$reply["ID"].'\").on(\"click\", function(){\
                                                                $(\"#editing'.$reply["ID"].'\").remove();\
                                                                $(\"#repText'.$reply["ID"].'\").css(\"display\", \"block\");\
                                                                $(\"#repEdit'.$reply["ID"].'\").attr(\"name\",\" \");\
                                                            });\
                                                            \
                                                            $(\"#editBtn'.$reply["ID"].'\").on(\"click\", function(){\
                                                                var reply = $(\"#editArea'.$reply["ID"].'\").val();\
                                                                \
                                                                $.ajax({\
                                                                    url:\"/editreply\",\
                                                                    type:\"GET\",\
                                                                    data:{_token : \"'.csrf_token().'\", reply:reply , replyID:'.$reply["ID"].'},\
                                                                    success:function (data) {\
                                                                          $(\"#comments\").html(data);\
                                                                          $(\"#editing'.$reply["ID"].'\").remove();\
                                                                          $(\"#repEdit'.$reply["ID"].'\").attr(\"name\",\" \");\
                                                                    }\
                                                                });\
                                                            });\
                                                        <\/script>\
                                                        ");
                                                }
                                                

                                            });
                                        </script>
                                    </div>
                                    <a href="#">
                                        <img src="'.asset('images/1.jpg').'" alt="Profile Picture" title="Profile Picture" style="width:60px; height:60px; border-radius:50%;" />
                                        <b style="margin:5px 0 10px 5px; position:absolute; color:black;">Mary</b>
                                    </a>
                                    <div id="repText'.$reply["ID"].'" style="margin:-28px 0 20px 75px; width:88%; overflow-wrap:break-word; color:black; white-space:pre;">'.$reply["Reply"].'</div>
                                    <input type="hidden" id="rep'.$reply["ID"].'" value="'.$reply["Reply"].'">
                                </div>
                            ';
                        }
                    }
                }

                $output .= '
     
                            </div>

                            <button id="replyBtn'.$value['ID'].'" class="btn btn-info">Reply</button>
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
    }
}
