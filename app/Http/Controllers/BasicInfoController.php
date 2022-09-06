<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;

class BasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = BasicInfo::first();
        return view('admin.info.index', compact('info'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'sometimes',
            'email' => 'sometimes',
            'desc' => 'sometimes'
        ]);
        $count = BasicInfo::count();
        if ($count == 0) {
            BasicInfo::create($data);
        } else {
            $info = BasicInfo::first();
            $info->fullname = $data['fullname'];
            $info->email = $data['email'];
            $info->desc = $data['desc'];
            $info->save();
        }
        return redirect()->route('admin.info.index')->with('success', 'Saved!');
    }

    public function avatarStore(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:5048'
        ]);
        $image = $request->image;
        $newImageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('images'), $newImageName);

        $count = BasicInfo::count();
        if ($count == 0) {
            BasicInfo::create([
                'image' => $newImageName
            ]);
        } else {
            $info = BasicInfo::first();
            if (!is_null($info->avatar)){
                unlink(public_path('images/'. $info->avatar));
            }
            $info->avatar = $newImageName;
            $info->save();
        }
        return redirect()->route('admin.info.index')->with('success', 'Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BasicInfo $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function show(BasicInfo $basicInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BasicInfo $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicInfo $basicInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BasicInfo $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicInfo $basicInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BasicInfo $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicInfo $basicInfo)
    {
        //
    }
}
