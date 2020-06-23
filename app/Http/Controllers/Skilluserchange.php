<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skilluser;
use App\Skilluserid;
use App\Skill;
use App\User;

class Skilluserchange extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillsuser = Skilluser::all();
        
        /*return view('skills.index', compact ('skills'));*/
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
        $request->validate([
          'skill'=>'required',
          'id'=>'required',
          'level'=>'required'
        ]);
        
        $skill = new Skilluser([
          'skill_id' => $request->get('skill'),
          'user_id' => $request->get('id'),
          'level' => $request->get('level')
        ]);
        
        $skill->save();
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $skills = Skill::all();
        $data = ['user' => $user, 'skills' => $skills];
        $user->skills = $user->skills()->get();
        return view('/skillsusers')->with('user', $user)->with('skills', $skills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = Skilluser::find($id);
        
        return view('skillsuser.edit', compact('skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $request->validate([
          'skill'=>'required',
          'user_id'=>'required',
          'level'=>'required'
        ]);
        
        $skill = Skilluser::find($id);
        $skill->skill_id = $request->get('skill');
        $skill->user_id  = $request->get('user_id');
        $skill->level = $request->get('level');
        $skill->save();
        
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $request->validate([
          'user_id'=>'required'
        ]);
        
        $userid = $request->get('user_id'); 
        $useridexpected = Skilluserid::find($userid);
        
        $removeskilluser = Skilluser::find($id);
        $removeskilluser->where("user_id", "=", $userid)->where("skill_id", "=", $id)->delete();
        
        return redirect('/home');
    }
}
