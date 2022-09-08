<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Abdurashid</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('frontend/main.css')}}">
</head>
<body>
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
            {{--            <a href="https://twitter.com/dennisivy11" target="_blank">Twitter</a>--}}
            {{--            <a href="https://www.linkedin.com/in/dennis-ivanov/" target="_blank">Linkedin</a>--}}
            {{--            <a href="https://github.com/divanov11" target="_blank">Github</a>--}}
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

        <div class="card--project">
            <a href="project1.html"><span>🏆 </span>Built a Laboratory management system for forensics lab</a>
        </div>

        <div class="card--project">
            <a href="project1.html"><span>🏆 </span>Documentation website - Lead team to re-build docs for agora.io</a>
        </div>

        <div class="card--project">
            <a href="project1.html"><span>🏆 </span>Ecommerce platform using paypal and stripe API for payment
                integration</a>
        </div>

        <div class="card--project">
            <a href="project1.html"><span>🏆 </span>Social Network - open source project</a>
        </div>

    </section>


</div>

</body>
</html>
