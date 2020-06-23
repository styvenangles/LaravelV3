<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skilluserid;
use App\Skilluser;
use App\Skill;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        
        return view('/admin')->with('skills', $skills);
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
          'skill'=>'required'
        ]);
    
        $skillid = $request->get('skill');
        $skillinfo = Skill::find($skillid);
        $userids = Skilluser::all()->get('user_id');
        $users = Skilluser::all()->where('skill_id', '=', $skillid)->count('user_id');
        $lvlavg = Skilluser::all()->where('skill_id', '=', $skillid)->avg('level');
        
        return view('/admin/info')->with('users', $users)->with('lvlavg', $lvlavg)->with('skillinfo', $skillinfo)->with('userids', $userids);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bien)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        //
    }
}
