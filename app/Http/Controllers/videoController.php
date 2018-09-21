<?php

namespace App\Http\Controllers;

use App\video;
use App\courses;
use Illuminate\Http\Request;

class videoController extends Controller
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
            'course_id' => 'required',
            'Video'     => 'mimetypes:video/avi,video/mpeg,video/mp4'
        ]);
        
        $video = new Video([
          'Courses_id' => $request->get('course_id')
        ]);

        if($request->file('Video') != ''){

            $vid = $request->file('Video');

            $vidname = $vid->getClientOriginalName();

            $vid->move('video/'. $request->get('course_id'), $vidname);
            
            $video->Name = $vidname;
            $video->VideoPath = 'video/'.$video->Courses_id;
        }

        $video->save();

         return redirect('/admin-course'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videos = video::where('Courses_id', $id)->get();

        return view('admin/Video/showcontent')->with('Videos',$videos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $cour_id)
    {
        // $video = Video::find($id);

        // unlink('video/'. $video->Courses_id .'/'. $video->Name);
        
        // $video = Video::destroy($id);

        // return redirect()->action('videoController@show', ['id' => $cour_id]);
    }

    public function add_content($id)
    {
        $course = Courses::find($id);

        return view('admin/Video/addcontent')->with('course',$course);
    }
}
