<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckListRequest;
use App\Models\CheckList;
use App\Models\CheckListGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
 

  
    public function create(CheckListGroup $checklist_group): View
    {
        return view('admin.checklists.create',compact('checklist_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckListRequest $request,CheckListGroup $checklist_group): RedirectResponse
    {
        $checklist_group->checklists()->create($request->validated());
        return redirect()->route('home');
    }

   

    public function edit(CheckListGroup $checklist_group , CheckList $checklist): View
    {
        return view("admin.checklists.edit",compact("checklist_group","checklist"));
    }

   
    public function update(StoreCheckListRequest $request,CheckListGroup $checklist_group, CheckList $checklist): RedirectResponse
    {
        $checklist->update($request->validated());
        return redirect()->route('home');
    }

   
    public function destroy(CheckListGroup $checklist_group,CheckList $checklist): RedirectResponse
    {
        $checklist->delete();
        return redirect()->route('home');


    }
}
