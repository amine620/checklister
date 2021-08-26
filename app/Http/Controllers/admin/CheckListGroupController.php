<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckListGroupRequest;
use App\Models\CheckListGroup;
use Illuminate\Http\Request;

class CheckListGroupController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checklist_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckListGroupRequest $request)
    {
        CheckListGroup::create($request->validated());
        return redirect()->route('home');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  CheckListGroup $checklist_group
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckListGroup $checklist_group)
    {
        return view('admin.checklist_groups.edit',compact('checklist_group'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CheckListGroup $checklist_group
     * @return \Illuminate\Http\Response
     */
    public function update(CheckListGroup $checklist_group,StoreCheckListGroupRequest $request)
    {
        $checklist_group->update($request->validated());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CheckListGroup $checklist_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckListGroup $checklist_group)
    {
        $checklist_group->delete();
        return redirect()->route('home');

    }
}
