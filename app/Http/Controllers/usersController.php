<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin/Adminstration/user')->with('users',$users);
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
        $user = new User();
        $user->name = $request['username'];
        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = $request['role'];

        $user->save();

        return redirect('/admin-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin/Adminstration/edituser')->with('user',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request['user']);
        $user->delete();
        $output = '';
        $users = User::all();
        foreach ($users as $usr) {
            $output .=' 
                      <tr>
                        <td style="text-align: center;"><input type="checkbox" class="check" ></td>
                        <td style="text-align: center;">'.$usr->name.'</td>
                        <td style="text-align: center;">'.$usr->first_name.'</td>
                        <td style="text-align: center;">'.$usr->last_name.'</td>';
                        if($usr->role == 2){
                        $output .='<td style="text-align: center;">Consultant</td>';
                        }
                        if($usr->role == 1){
                        $output.= '<td style="text-align: center;">User</td>';
                        }
                        $output.='<td style="text-align: center;">'.$usr->email.'</td>
                        <td style="text-align: center;"><a href = "#" id="'.$usr->id.'" class="ti-trash delete" title="Delete"></a>
                            <a class="ti-pencil" title="Edit" href="'. action("coursesController@edit",$usr->id) .'"></td>
                      </tr>

                      ';
        }
        return $output;
    }
}
