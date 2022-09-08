@extends('frontend.layout')
@section('content')
    <div id="container--main">

        @if(!is_null($info))
            <section id="wrapper--hero" class="section--page">
                <img id="profile-pic" src="
                    @if(!is_null($info->avatar))
                        {{asset('images/'.$info->avatar)}}
                    @else
                        {{asset('defaultAvatar.png')}}
                    @endif
            " alt="Abdurashid's image">
                <div>
                    <h1 id="user-name">{{$info->fullname}}</h1>
                    <p id="bio">{!! $info->desc !!}</p>
                    <p id="email">👉 {{$info->email ?? 'Email here'}}</p>
                </div>
            </section>
        @endif

        <section class="section--page">
            <div id="socials--list">
                @foreach($links as $link)
                    <a href="{{$link->url}}" target="_blank">{{$link->title}}</a>
                @endforeach
                @if(!is_null($info))
                    @if(!is_null($info->cv))
                        <a href="{{asset('cv/'. $info->cv)}}" target="_blank">Download Resume</a>
                    @endif
                @endif
            </div>
        </section>

        <section class="section--page">
            <h2>Skills & Qualifications</h2>
            <ul id="qualifications--list">
                <li>✔️ 7 Years experience with front & backend development</li>
                <li>✔️ Extensive knowledge in API & Database Design.</li>
                <li>✔️ Experienced content creator on YouTube & community leader</li>
                <li>✔️ 7 Years experience with running Adwords campaigns & SEO</li>
            </ul>
        </section>

        <section class="section--page">
            <h2>Skills</h2>
            <div id="wrapper--techstack__items">
                @foreach($skills as $skill)
                    <div class="card--techstack"><span>{{$skill->title}}</span></div>
                @endforeach
            </div>
        </section>

        <section id="work-history-wrapper" class="section--page">
            <h2>Work History</h2>
            @foreach($works as $work)
                <div class="line-break"></div>
                <div class="card--work-history">
                    <strong>🚧 {{$work->title}}</strong>
                    <p>{{$work->time}}</p>
                    <p>{!! $work->desc !!}</p>
                </div>
            @endforeach
        </section>

        <section class="section--page">
            <h2>Projects & Accomplishments</h2>
            @foreach($projects as $project)
                <div class="card--project">
                    <a href="project1.html"><span>🏆 </span>{{$project->title}}</a>
                </div>
            @endforeach
        </section>

    </div>
@endsection
