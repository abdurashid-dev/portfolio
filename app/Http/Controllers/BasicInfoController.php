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
                'avatar' => $newImageName
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

    public function cvStore(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,jpg,jpeg,png,docx'
        ]);
        $cv = $request->cv;
        $newCvName = time() . '-' . $cv->getClientOriginalName();
        $cv->move(public_path('cv'), $newCvName);

        $count = BasicInfo::count();
        if ($count == 0) {
            BasicInfo::create([
                'cv' => $newCvName
            ]);
        } else {
            $info = BasicInfo::first();
            if (!is_null($info->cv)){
                unlink(public_path('cv/'. $info->cv));
            }
            $info->cv = $newCvName;
            $info->save();
        }
        return redirect()->route('admin.info.index')->with('success', 'Saved!');
    }
}
