<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\consultation;
use Illuminate\Http\Request;
use App\Users;
use App\answer;
use App\consultation_reply;

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
    public function show($id)
    {
        $consultation = consultation::find($id);
        
        $user = Users::find($consultation->User_id);
        
        $answers = answer::Where('Consultation_id', $consultation->ID)->get();

        $replys = consultation_reply::all();

        return view('user/Consultations/view')->with('cons',$consultation)->with('user',$user)->with('answers', $answers)->with('replys',$replys);
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
    public function update(Request $request)
    {   $userID = \Auth::user()->id;
        $value1 = $request['value'];
        $cons_id = $request['cons'];
        $con = consultation::find($cons_id);
        $con->Question = $value1;
        $con->save();
        $output = "";
        $conses = consultation::all();
                foreach ($conses as $value) {
                    $ansers = answer::where('Consultation_id',$value['ID'])->get();
                    $count = count($ansers);
                    $output .= '

                 <div class="consultation" style="margin-bottom: 30px;">
                    <div class="col-md-12 consultation_content">
                        <img src="'.asset('images/question.png').'" class="cons_picture">
                        <p>'.$value->Question.'</p>
                    </div>
                    <div class="col-md-10" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
                    <div class="col-md-10" class="cons_ans"><span class="cons_ans col-md-2">'.$count.' Answers</span>
                        <a href="'.action('consultationController@show',$value['ID']) .'" class="col-md-2 buton2" style="float: right;">View</a>';
                    if($value->User_id == $userID){
                        $output .=' <button class="buton2 col-md-2 del"style="margin-right:10px;" id='.$value['ID'].'>Delete</button>
                                    <button class="buton2 col-md-2 edt" id="'.$value['ID'].'" name=" ">Edit</button>
                                    <input id="q" type="hidden" name="hidden" value="'.$value['Question'].'">
                        ';
                    }
                    $output.='</div>
                        </div>

                        ';}
        return $output;
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
        $userID = \Auth::user()->id;
        $output = '';
        $cons = consultation::find($id);
        if(!is_null($cons)){

                $cons->delete();
                $conses = consultation::all();
                foreach ($conses as $value) {
                    $ansers = answer::where('Consultation_id',$value['ID'])->get();
                    $count = count($ansers);
                    $output .= '

                 <div class="consultation" style="margin-bottom: 30px;">
                    <div class="col-md-12 consultation_content">
                        <img src="'.asset('images/question.png').'" class="cons_picture">
                        <p>'.$value->Question.'</p>
                    </div>
                    <div class="col-md-10" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
                    <div class="col-md-10" class="cons_ans"><span class="cons_ans col-md-2">'.$count.' Answers</span>
                        <a href="'.action('consultationController@show',$value['ID']) .'" class="col-md-2 buton2" style="float: right;">View</a>';
                    if($value->User_id == $userID){
                        $output .=' <button class="buton2 col-md-2 del" style="margin-right:10px;" id='.$value['ID'].'>Delete</button>
                                    <button class="buton2 col-md-2 edt" id="'.$value['ID'].'" name=" ">Edit</button>
                                    <input id="q" type="hidden" name="hidden" value="'.$value['Question'].'">
                        ';
                    }
                    $output.='</div>
                        </div>

                        ';

               }
               
               return $output;
        }else{
            }


               return $output;
        }

    public function allConsultation()
    {
        $consultation = consultation::all();
        $ans = array();
        foreach ($consultation as $value) {
            $ans[] = count(answer::where('Consultation_id',$value['ID'])->get());
        }

        return view('user/Consultations/consultation')->with('consult',$consultation)->with('ans',$ans);
    }

    public function allMyConsultation($id)
    {
        $mycons = consultation::where('User_id' , $id)->get();
        $ans = array();
        foreach ($mycons as $value) {
            $ans[] = count(answer::where('Consultation_id',$value['ID'])->get());
        }
       return view('user/Consultations/myconsultation')->with('consult' , $mycons)->with('ans',$ans);
    }

    public function getConsByCategory(Request $request)
    {   
        $userID = \Auth::user()->id;
        $category = $request['category'];
        $consultations = consultation::all();
        $counter = 0;
        $output = '';
        foreach ($consultations as $consultation) {

         for ($i=0; $i < sizeof($category); $i++) { 
             if($consultation['Category'] == $category[$i]){

                $counter++;
                $output .= '

                 <div class="consultation" style="margin-bottom: 30px;">
                    <div class="col-md-12 consultation_content">
                        <img src="'.asset('images/question.png').'" class="cons_picture">
                        <p>'.$consultation->Question.'</p>
                    </div>
                    <div class="col-md-10" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
                    <div class="col-md-10" class="cons_ans"><span class="cons_ans col-md-2">'.$counter.' Answers</span>
                        <a href="'.action('consultationController@show',$consultation['ID']) .'" class="col-md-2 buton2" style="float: right;">View</a>';
                    if($consultation->User_id == $userID){
                        $output .=' <button class="buton2 col-md-2 del" style="margin-right:10px;" id='.$consultation['ID'].'>Delete</button>
                                    <button class="buton2 col-md-2 edt" id="'.$consultation['ID'].'" name=" ">Edit</button>
                                    <input id="q" type="hidden" name="hidden" value="'.$consultation['Question'].'">
                        ';
                    }
                    $output.='</div>
                        </div>

                        ';
             }
         }
           
       }
       
       return $output;

    }
}
