<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckListRequest;
use App\Models\CheckList;
use App\Models\CheckListGroup;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CheckListGroup $checklist_group)
    {
        return view('admin.checklists.create',compact('checklist_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckListRequest $request,CheckListGroup $checklist_group)
    {
        $checklist_group->checklists()->create($request->validated());
        return redirect()->route('home');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckListGroup $checklist_group , CheckList $checklist)
    {
        return view("admin.checklists.edit",compact("checklist_group","checklist"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCheckListRequest $request,CheckListGroup $checklist_group, CheckList $checklist)
    {
        $checklist->update($request->validated());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckListGroup $checklist_group,CheckList $checklist)
    {
        $checklist->delete();
        return redirect()->route('home');


    }
}
