<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use App\Models\Link;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Work;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        SEOMeta::setTitle('Abdurashid Abdumominov');
        SEOMeta::setDescription('Abdurashid Abdumominovning rasmiy sayti');
        SEOMeta::setCanonical('https://abdurashid.com');

        OpenGraph::setDescription('Abdurashid Abdumominovning rasmiy sayti');
        OpenGraph::setTitle('Abdurashid Abdumominov');
        OpenGraph::setUrl('https://abdurashid.com');
        OpenGraph::addProperty('type', 'articles');
//        OpenGraph::addImage(asset('frontend/img/logo.png'));

        JsonLd::setTitle('Abdurashid Abdumominov');
        JsonLd::setDescription('Abdurashid Abdumominovning rasmiy sayti');

        $info = BasicInfo::first();
        $links = Link::orderByDesc('created_at')->get();
        $skills = Skill::orderByDesc('created_at')->get();
        $works = Work::orderByDesc('created_at')->get();
        $projects = Project::orderByDesc('created_at')->get();
        return view('frontend.index', compact('info', 'links', 'skills', 'works', 'projects'));
    }

    public function project(Project $project): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        SEOMeta::setTitle('Abdurashid Abdumominov');
        SEOMeta::setDescription('Abdurashid Abdumominovning rasmiy sayti');
        SEOMeta::setCanonical(app('url'));

        OpenGraph::setDescription('Abdurashid Abdumominovning rasmiy sayti');
        OpenGraph::setTitle('Abdurashid Abdumominov');
        OpenGraph::setUrl(app('url'));
        OpenGraph::addProperty('type', 'articles');
//        OpenGraph::addImage(asset('frontend/img/logo.png'));

        JsonLd::setTitle('Abdurashid Abdumominov');
        JsonLd::setDescription('Abdurashid Abdumominovning rasmiy sayti');
        return view('frontend.project', compact('project'));
    }
}
