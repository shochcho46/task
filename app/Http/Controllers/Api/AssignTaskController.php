<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assigntask;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssignTaskController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',
        ],
            [
                'task_id.required' => 'Task is required',
                'user_id.required' => 'User is required',
                'project_id.required' => 'Project is required',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in validation',
                'status' => $validator->errors(),
                'response' => 404,

            ]);
        } else {
            $returntype = $this->checkUserType();

            if ($returntype) {

                $user_id = $request->user_id;
                $project_id = $request->project_id;
                $task = $request->task_id;

                $insert = array();

                foreach ($task as $key => $taskvalue) {
                    $insert[$key] = array(
                        "user_id" => $user_id,
                        "task_id" => $taskvalue,
                        "project_id" => $project_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    );
                }

                Assigntask::insert($insert);

                return response()->json([
                    'message' => 'Data save',
                    'status' => 'success',
                    'response' => 201,
                    'access_token' => request()->bearerToken(),
                    'data' => $insert,

                ]);

            } else {
                return response()->json([
                    'message' => "Don't have permission",
                    'status' => 'fail',
                    'response' => 404,
                ]);
            }

        }

    }

    public function checkUserType()
    {
        $type = Auth::guard('api')->user()->type;

        if ($type == "subadmin") {

            return false;

        } elseif (($type == "admin") || $type == "superadmin") {
            return true;

        }

    }

    public function adminSingleUserTaskList($projectId, $userId)
    {
        $returntype = $this->checkUserType();

        if ($returntype) {

            $data = Assigntask::where('project_id', $projectId)->where('user_id', $userId)->orderBy('id', 'DESC')->get();

            if (count($data) == 0) {
                return response()->json([
                    'message' => 'No Data Found',
                    'status' => 'fail',
                    'response' => 404,

                ]);
            } else {
                return response()->json([
                    'message' => 'Data Found',
                    'status' => 'success',
                    'response' => 200,
                    'access_token' => request()->bearerToken(),
                    'data' => $data,

                ]);
            }

        } else {

            return response()->json([
                'message' => "Don't have permission",
                'status' => 'fail',
                'response' => 404,

            ]);

        }

    }

    public function singleUserTaskList($projectId)
    {
        $userid = Auth::guard('api')->user()->id;

        $data = Assigntask::where('project_id', $projectId)->where('user_id', $userid)->orderBy('id', 'DESC')->get();

        if (count($data) == 0) {
            return response()->json([
                'message' => 'No Data Found',
                'status' => 'fail',
                'response' => 404,

            ]);
        } else {
            return response()->json([
                'message' => 'Data Found',
                'status' => 'success',
                'response' => 200,
                'access_token' => request()->bearerToken(),
                'data' => $data,

            ]);
        }

    }

}
