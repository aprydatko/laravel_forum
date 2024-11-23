<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\StoreRequest;
use App\Http\Requests\Section\UpdateRequest;
use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\Branch\SectionWithBranchesResource;
use App\Http\Resources\Section\SectionResource;
use App\Models\Branch;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::with('branches')->get();

        $sections = SectionWithBranchesResource::collection($sections)->resolve();

        return inertia('Section/Index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Section/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Section::firstOrCreate($data);
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $section = SectionResource::make($section)->resolve();
        return inertia('Section/Edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Section $section)
    {
        $data = $request->validated();
        $section->update($data);

        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->back();
    }

    public function branchIndex(Section $section)
    {
        return BranchResource::collection($section->branches)->resolve();
    }

    public function branchIndexExcept(Section $section, Branch $branch)
    {
        $branches = $section->branches()->where('id', '!=', $branch->id)->get();
        return BranchResource::collection($branches)->resolve();
    }
}
