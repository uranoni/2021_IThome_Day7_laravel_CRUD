<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Point;
use App\Models\Skill;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $user = Auth::user();
            // $skills = Skill::query()->where('user_id', '!=', $user->id)->get();
            $skills = DB::table('skills')->where('skills.user_id', '!=', $user->id)
                ->leftJoin('points', 'skills.id', '=', 'points.skill_id')
                ->get();
            // dd($skills);
            $my_id = $user->id;
            return view('point.index', ['skills' => $skills, 'my_id' => $my_id]);
        }
        return view('user.login');
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
        //
        $data  = $request->all();
        $user = Auth::user();
        $result = Point::query()
            ->where('user_id', intval($data['user_id']))
            ->where('judge_user_id', $user->id)
            ->where('skill_id', intval($data['skill_id']))->get()->first();
        // dd(intval($data['skill_id']));
        if (empty($result)) {
            $newpointdata = new Point;
            $newpointdata->user_id = $data['user_id'];
            $newpointdata->judge_user_id = $user->id;
            $newpointdata->skill_id = $data['skill_id'];
            $newpoint = $newpointdata->save();
            // dd($newpoint);
            return $newpoint;
            // return 'no';
        }

        return $result;
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
    public function edit($id)
    {
        //
        return view('point.edit', ['id' => $id]);
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
        $skill_id = $request->id;
        $skill_point = $request->point;

        $skill = Point::find($skill_id);
        $skill['point'] = $skill_point;
        $skill->save();
        return $skill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
