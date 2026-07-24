<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();

        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("skills.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newSkill = new Skill();
        $newSkill->name = $data['name'];

        $newSkill->save();

        return redirect()->route('skills.index',$newSkill);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        /* return view('skills.show', compact('skill')); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $data = $request->all();
        $skill->name = $data['name'];

        $skill->update();

        return redirect()->route('skills.index',$skill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill -> delete();
        return redirect()->route('skills.index');
    }
}
