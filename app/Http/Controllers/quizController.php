<?php

namespace App\Http\Controllers;

use App\quiz;
use Illuminate\Http\Request;

class quizController extends Controller
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

        $id = $request->get('videoID');

        $questions_num = $request->get('questions_num');

        for($i=1; $i<=$questions_num; $i++){

            $this->validate($request, [
                "question".$i => 'required',
                "firstAns".$i => 'required',
                "secondAns".$i => 'required',
                "correctAns".$i => 'required',
            ]);

            $quiz = new quiz();

            $quiz->Video_id = $id;
            $quiz->question = $request->get('question'.$i);
            $quiz->ch1      = $request->get('firstAns'.$i);
            $quiz->ch2      = $request->get('secondAns'.$i);
            $quiz->ch3      = $request->get('thirdAns'.$i);
            $quiz->ch4      = $request->get('fourthAns'.$i);
            $quiz->answer   = $request->get('correctAns'.$i);

            $quiz->save();
        }

        return redirect('/admin-course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizes = quiz::where('Video_id', $id)->get();

        return view('admin/Quiz/show')->with('quizes',$quizes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            "question" => 'required',
            "ch1" => 'required',
            "ch2" => 'required',
            "answer" => 'required',
        ]);

        $quiz = quiz::find($request->get('id'));

        $quiz->question = $request->get('question');
        $quiz->ch1      = $request->get('ch1');
        $quiz->ch2      = $request->get('ch2');
        $quiz->ch3      = $request->get('ch3');
        $quiz->ch4      = $request->get('ch4');
        $quiz->answer   = $request->get('answer');

        $quiz->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');

        $quiz = quiz::find($id);
        
        $quiz->delete();
    }

    public function add_quiz($id)
    {

        return view('admin/Quiz/addquiz')->with('videoID',$id);
    }
}
