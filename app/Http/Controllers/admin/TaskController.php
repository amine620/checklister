<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\CheckList;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   
    public function index()
    {
       
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
    public function store(StoreTaskRequest $request,CheckList $checklist)
    {
        $position=$checklist->tasks()->max('position')+1;
        $checklist->tasks()->create($request->validated()+['position'=>$position]);
        return redirect()->route('admin.checklist_groups.checklists.edit',[$checklist->check_list_group_id,$checklist]);
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
    public function edit(CheckList $checklist,Task $task)
    {
        return view('admin.tasks.edit',compact('checklist','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, CheckList $checklist,Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('admin.checklist_groups.checklists.edit',[$checklist->check_list_group_id,$checklist]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckList $checklist,Task $task)
    {
        $checklist->tasks()->where('position','>',$task->position)->update(['position'=>\DB::raw('position-1')]);
        $task->delete();
        // return back();
        return redirect()->route('admin.checklist_groups.checklists.edit',[$checklist->check_list_group_id,$checklist]);
     }
}
