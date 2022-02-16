<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Auth::guard('api')->user()->type;

        if ($type == "subadmin") {
            return response()->json([
                'message' => "Don't have permission",
                'status' => 'fail',
                'response' => 404,
            ]);
        }

        if (($type == "admin") || ($type == "superadmin")) {

            $data = Task::orderBy('id', 'desc')->get();

            if (empty($data)) {
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
        $validator = Validator::make($request->all(), [
            'detail' => 'required',
        ],
            [
                'detail.required' => 'Task name cannot be Empty',
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

                $data['detail'] = $request->detail;

                Task::create($data);

                return response()->json([
                    'message' => 'Data save',
                    'status' => 'success',
                    'response' => 201,
                    'access_token' => request()->bearerToken(),
                    'data' => $data,

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'detail' => 'required',
        ],
            [
                'detail.required' => 'Task name cannot be Empty',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in validation',
                'status' => $validator->errors(),
                'response' => 404,
                'response' => $request->all(),

            ]);
        } else {
            $returntype = $this->checkUserType();

            if ($returntype) {

                $data['detail'] = $request->detail;

                $task->update($data);

                return response()->json([
                    'message' => 'Data Update',
                    'status' => 'success',
                    'response' => 201,
                    'access_token' => request()->bearerToken(),
                    'data' => $data,

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $returntype = $this->checkUserType();

        if ($returntype) {

            if ($task->assigntasks()->count()) {

                return response()->json([
                    'message' => 'Data can not be deleted',
                    'status' => 'fail',
                    'response' => 404,

                ]);

            } else {
                $task->delete();
                return response()->json([
                    'message' => 'Data Deleted',
                    'status' => 'success',
                    'response' => 200,
                    'access_token' => request()->bearerToken(),

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

    public function checkUserType()
    {
        $type = Auth::guard('api')->user()->type;

        if ($type == "subadmin") {

            return false;

        } elseif (($type == "admin") || $type == "superadmin") {
            return true;

        }

    }
}
