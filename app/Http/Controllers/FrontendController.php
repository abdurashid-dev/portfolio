<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use App\Models\Link;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $info = BasicInfo::first();
        $links = Link::orderByDesc('created_at')->get();
        $skills = Skill::orderByDesc('created_at')->get();
        $works = Work::orderByDesc('created_at')->get();
        $projects = Project::orderByDesc('created_at')->get();
        return view('frontend.index', compact('info', 'links', 'skills', 'works', 'projects'));
    }
}
