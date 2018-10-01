<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\consultation;
use Illuminate\Http\Request;

class consultationController extends Controller
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
        $user = Auth::user();
        $cons = new Consultation();
        $cons->Question = $request->get('question');
        $cons->Category = $request->get('category');
        $cons->User_id  = $user->id;
        $cons->save();
        return redirect('consultation');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(consultation $consultation)
    {
        
        return view('user/Consultations/view')->with('cons',$consultation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['cons'];
        $user = Auth::user();
        $output = '';
        $cons = consultation::find($id);
        if(!is_null($cons)){
                $cons->delete();

                $conses = consultation::all();
                foreach ($conses as $value) {
                    $output .= '

                 <div class="consultations col-md-12">
                    <div class="row">
                        <div class="consultation col-md-10 col-md-offset-1">   
                            <div class="cons_picture col-md-3">
                                <img class="cons_img" src="' .asset('images/photo-3.jpg'). '"></div>
                            <div class="question col-md-10"><p>'.$value->Question.'</p></div>
                        </div>
                        @if('.$value->User_id == $user->ID.')
                    <button id="'. $value->ID .'" class="col-md-2 btn btn-danger delete">Delete</button>
                    @endif
                    <button id="'. $value->ID .'" class="col-md-2 btn btn-success answer">answer</button>
                </div>

                        ';


               }
               
               return $output;
        }else{
            $conses = consultation::all();
                foreach ($conses as $value) {
                   $output .= '

                 <div class="consultations col-md-12">
                    <div class="row">
                        <div class="consultation col-md-10 col-md-offset-1">   
                            <div class="cons_picture col-md-3">
                                <img class="cons_img" src="' .asset('images/photo-3.jpg'). '"></div>
                            <div class="question col-md-10"><p>'.$value->Question.'</p></div>
                        </div>
                     @if('.$value->User_id == $user->ID.')
                    <button id="'. $value->ID .'" class="col-md-2 btn btn-danger delete">Delete</button>
                    @endif
                    <button id="'. $value->ID .'" class="col-md-2 btn btn-success answer">answer</button>
                </div>

                        ';

               }

               return $output;
        }
    }

    public function allConsultation()
    {
        $consultation = consultation::all();

        return view('user/Consultations/consultation')->with('consult',$consultation);
    }

    public function allMyConsultation($id)
    {
        $mycons = consultation::where('User_id' , $id)->get();
    
       return view('user/Consultations/myconsultation')->with('consult' , $mycons);
    }

    public function getConsByCategory(Request $request)
    {
        $category = $request['category'];
        $consultations = consultation::all();
        $counter = 0;
        $output = '';
        foreach ($consultations as $consultation) {

         for ($i=0; $i < sizeof($category); $i++) { 
             if($consultation['Category'] == $category[$i]){

                $counter++;
                $output .='
                           <div class="consultation" style="margin-bottom: 30px;">
                    <div class="col-md-12 consultation_content">
                        <img src="'. asset('images/question.png').'" class="cons_picture">
                        <p>'.$consultation["Question"].'</p>
                    </div>
                    <div class="col-md-10" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
                    <div class="col-md-10" class="cons_ans"><span class="cons_ans">10 Answers</span>
                        <a href="'. action('consultationController@show',$consultation) .'" class="col-md-2 buton2" style="float: right;">View</a>
                    </div>
                </div>
                    ';
             }
         }
           
       }
       

       return $output;

    }
}
