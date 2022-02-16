<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assigntask;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $type = Auth::guard('api')->user()->type;

        if ($type == "subadmin") {
            $data = new Collection();
            $testGroupby = Assigntask::where('user_id', Auth::user()->id)->get()->groupby('project_id');

            // dd( $testGroupby);

            $testGroupby->each(function ($item, $key) use (&$data) {
                $total = $item->count();
                $done = $item->where('status', 1)->count();
                $percent = round((100 / $total) * $done, 2);

                $Task = array(
                    'id' => $item[0]->project_id,
                    'projectName' => $item[0]->project->name,
                    'done' => $percent,
                );

                $data->push($Task);

            });

            $data = $data->reverse();

            return response()->json([
                'message' => 'Data Found',
                'status' => 'success',
                'response' => 200,
                'access_token' => request()->bearerToken(),
                'data' => $data,

            ]);

        }

        if (($type == "admin") || ($type == "superadmin")) {

            $data = new Collection();

            $testGroupby = Assigntask::get()->groupby('project_id');

            $testGroupby->each(function ($item, $key) use (&$data) {
                $total = $item->count();
                $done = $item->where('status', 1)->count();
                $percent = round((100 / $total) * $done, 2);
                $Task = array(
                    'id' => $item[0]->project_id,
                    'projectName' => $item[0]->project->name,
                    'done' => $percent,
                );

                $data->push($Task);

            });

            return response()->json([
                'message' => 'Data Found',
                'status' => 'success',
                'response' => 200,
                'access_token' => request()->bearerToken(),
                'data' => $data,

            ]);

        }

    }
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

            $data = User::orderBy('id', 'desc')->where('type', 'subadmin')->get();

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
            'name' => 'required',
            'type' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',

        ], );

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
                $data['type'] = $request->type;
                $data['mobile'] = $request->mobile;
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);

                User::create($data);

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resetpassword(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ],
            [
                'password.required' => 'Password cannot be Empty',
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

                $data['password'] = Hash::make($request->password);

                $user->update($data);

                return response()->json([
                    'message' => 'Data Update',
                    'status' => 'success',
                    'response' => 201,
                    'access_token' => request()->bearerToken(),

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
}
