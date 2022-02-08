<?php

namespace App\Http\Controllers;

use App\Models\Assigntask;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blacklist');
        $this->middleware('admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assingTask = Assigntask::groupBy('project_id')->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        $task = Task::all();
        $user = User::where('type', 'subadmin')->get();
        return view('layouts.admin.assigntask.create', compact('project', 'task', 'user', ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = array();
        $data = $this->validateRequest();
        foreach ($data['task_id'] as $key => $taskvalue) {
            $insert[$key] = array(
                "user_id" => $data['user_id'],
                "task_id" => $taskvalue,
                "project_id" => $data['project_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            );
        }
        Assigntask::insert($insert);
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function show(Assigntask $assignTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function edit(Assigntask $assignTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assigntask $assignTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigntask $assingtask)
    {
        $assingtask->delete();
        return back()->with('success', 'Data Deleted');
    }

    public function validateRequest()
    {

        $data = request()->validate([

            'task_id' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',

        ]);

        return $data;

    }
}
