@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SHF CAMPAIGN</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>25-Sep-2018 -> 31-Oct-2018 「Dormy Kawaguchi」: Randomly discount 50% (up to 150¥) for 3 orders every week </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <ul> From Admin : 
        <li>Testing time will end at <b class="text-primary">23:59 31/October/2018</b>. Before that, you have infinity point. Feel free to use! In testing time, guarantee that every order before 11h30AM every Saturday and Sunday will be deliverd before 12h30PM.</li>
        <li>The point you gain in testing time will not lose after that. For example, if you gain <b>10</b> points and use <b>3</b>, you will have extra <b>7</b> points. Gain 3 use 7, you got no extra! After testing time, first 4 people will have <b>10 + extra point</b>. Other will have <b>3 + extra point</b>. New registers have nothing</li> 
        <li>If you find any bugs, or any ideas to improve SHF, please fell free to inform me at <b class="text-danger">danganhvu1998@gmail.com</b>. Thank you!(Of course, extra point!)</li>
        <li>It is recommend that your avata picture contains your front door</li>
        <li>Trouble? Please read: <a href="/docs/eng">English</a> or <a href="/docs/jap">日本語(not yet)</a></li>
        <li class="text-center"><iframe src="https://giphy.com/embed/XhHeQfSQXOtkk" width="250" height="250" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></li>
    </ul>
</div>
@endsection
