<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returntype = $this->checkUserType();

        if ($returntype) {

            $data = Project::orderBy('id', 'desc')->get();

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

        } else {
            return response()->json([
                'message' => "Don't have permission",
                'status' => 'fail',
                'response' => 404,
            ]);
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
            'name' => 'required',
        ],
            [
                'name.required' => 'Project name cannot be Empty',
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

                $data['name'] = $request->name;

                Project::create($data);

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
    public function edit(Project $project)
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
    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ],
            [
                'name.required' => 'Project name cannot be Empty',
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

                $data['name'] = $request->name;

                $project->update($data);

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
    public function destroy(Project $project)
    {
        $returntype = $this->checkUserType();

        if ($returntype) {

            if (($project->assigntasks()->count()) || ($project->images()->count())) {

                return response()->json([
                    'message' => 'Data can not be deleted',
                    'status' => 'fail',
                    'response' => 404,

                ]);

            } else {
                $project->delete();
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
