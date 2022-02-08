<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blacklist');
        $this->middleware('subadmin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {

        if ((Auth::user()->type == "admin") || (Auth::user()->type == "superadmin")) {
            $data = Image::where('project_id', $project_id)->orderBy('id', 'DESC')->get();
        } elseif (Auth::user()->type == "subadmin") {
            $data = Image::where('project_id', $project_id)->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }

        return view('layouts.admin.image.list', compact('project_id', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        return view('layouts.admin.image.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedata = array();
        $data = $this->validateRequest();
        $images = $request->file('location');
        foreach ($images as $key => $value) {

            $extension = $value->extension();
            $filename = time() . rand(10, 1000) . '.' . $extension;
            $path = $value->storeAs('workpic', $filename, 'public');
            $fullpathurl = 'storage/' . $path;

            $storedata[$key] = array(
                "user_id" => $data['user_id'],
                "pic_name" => $filename,
                "project_id" => $data['project_id'],
                "location" => $fullpathurl,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            );

        }

        Image::insert($storedata);
        return redirect()->route('image.index', $data['project_id'])->with('update', 'Data Update');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    public function showAllImage($project_id)
    {

        $data = Image::where('project_id', $project_id)->orderBy('id', 'DESC')->get();

        $date = $data->groupBy(function ($test) {
            return Carbon::parse($test->created_at)->format('Y-m-d');
        });
        $dataFilter = $date->keys();

        return view('layouts.admin.image.show', compact('project_id', 'data', 'dataFilter'));
    }

    public function getPicBydate(Request $request)
    {
        $project_id = $request->projectId;
        $postdate = $request->date;

        $filterdata = Image::where('project_id', $project_id)->orderBy('id', 'DESC')->get();

        $date = $filterdata->groupBy(function ($test) {
            return Carbon::parse($test->created_at)->format('Y-m-d');
        });
        $dataFilter = $date->keys();

        if ($postdate == "all") {

            $data = Image::where('project_id', $project_id)->orderBy('id', 'DESC')->get();

        } else {
            $data = Image::where('project_id', $project_id)->whereDate('created_at', $postdate)->orderBy('id', 'DESC')->get();

        }

        return view('layouts.admin.image.show', compact('project_id', 'data', 'dataFilter'));
    }

    public function singelUserImage($projectid, $userid)
    {

        $project_id = $projectid;
        $userid = $userid;

        $filterdata = Image::where('project_id', $project_id)->orderBy('id', 'DESC')->get();

        $date = $filterdata->groupBy(function ($test) {
            return Carbon::parse($test->created_at)->format('Y-m-d');
        });
        $dataFilter = $date->keys();

        $data = Image::where('project_id', $project_id)->where('user_id', $userid)->orderBy('id', 'DESC')->get();

        return view('layouts.admin.image.singleusershow', compact('project_id', 'data', 'dataFilter', 'userid'));

    }

    public function userGetPicBydate(Request $request)
    {
        $project_id = $request->projectId;
        $userid = $request->userId;
        $postdate = $request->date;

        $filterdata = Image::where('project_id', $project_id)->where('user_id', $userid)->orderBy('id', 'DESC')->get();

        $date = $filterdata->groupBy(function ($test) {
            return Carbon::parse($test->created_at)->format('Y-m-d');
        });
        $dataFilter = $date->keys();

        if ($postdate == "all") {

            $data = Image::where('project_id', $project_id)->where('user_id', $userid)->orderBy('id', 'DESC')->get();

        } else {
            $data = Image::where('project_id', $project_id)->where('user_id', $userid)->whereDate('created_at', $postdate)->orderBy('id', 'DESC')->get();

        }

        return view('layouts.admin.image.singleusershow', compact('project_id', 'data', 'dataFilter', 'userid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        unlink('storage/workpic/' . $image->pic_name . '');
        $image->delete();
        return back()->with('fail', 'Data delete success full');
    }

    public function validateRequest()
    {

        if (request()->hasFile('location')) {

            $data = request()->validate([
                'location.*' => 'max:600000|dimensions:max_width=1920,max_height=1080',
                'user_id' => 'required',
                'project_id' => 'required',
            ]);
        }

        return $data;
    }

}
