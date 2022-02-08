<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ValidateLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginValidate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'emailormobile' => 'required',
            'password' => 'required|min:8',
        ],
            [
                'emailormobile.required' => 'User Id cannot be Empty',

            ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'No Data Found',
                'status' => $validator->errors(),
                'response' => 404,

            ]);
        } else {
            $email = $request->emailormobile;

            $credentialsemail = array("email" => $email, "password" => $request->password);
            $credentialsmobile = array("mobile" => $email, "password" => $request->password);

            if ((Auth::guard('api')->attempt($credentialsemail)) || (Auth::guard('api')->attempt($credentialsmobile))) {
                $etoken = Auth::guard('api')->attempt($credentialsemail);
                $mtoken = Auth::guard('api')->attempt($credentialsemail);
                if (!empty($etoken)) {
                    $token = $etoken;
                }
                if (!empty($mtoken)) {
                    $token = $mtoken;
                }
                $userType = Auth::guard('api')->user()->type;

                return response()->json([
                    'message' => 'Data Found',
                    'status' => "success",
                    'access_token' => $token,
                    'type' => $userType,
                    'response' => 200,

                ]);
            } else {
                return response()->json([
                    'message' => 'No Data Found',
                    'status' => "fail",
                    'response' => 404,

                ]);
            }

        }

    }

    public function registration(Request $request)
    {
        $type = Auth::guard('api')->user()->type;

        if ($type == "subadmin") {
            return response()->json([
                'message' => "Sorry You Don't Have permission to Create New User",
                'status' => 'fail',
                'response' => 404,

            ]);
        } else {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'type' => 'required',
                'mobile' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',

            ],
            );

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error in Validation',
                    'status' => 'fail',
                    'errors' => $validator->errors(),
                    'response' => 404,

                ]);
            } else {

                $data['password'] = Hash::make($request->password);

                $data['name'] = $request->name;
                $data['type'] = $request->type;
                $data['mobile'] = $request->mobile;
                $data['email'] = $request->email;
                $data['status'] = 'active';
                User::create($data);

                return response()->json([
                    'message' => 'Data Save',
                    'status' => 'success',
                    'response' => 201,

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
        //
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

    public function validateRequest()
    {

        $data = request()->validate([

            'emailormobile' => 'required',
            'password' => 'required|min:8|confirmed',

        ]);

        return $data;

    }
}
