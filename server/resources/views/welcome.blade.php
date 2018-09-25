<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SHF - StayHomeForever</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <section class="content" id="opening">
                <div class="title m-b-md">
                    <a href="/home">SHF - Stay Home Forever</a>
                </div>

                <div>
                    <div class="row text-center">
                        <div class="col-md-2"><a href="/docs/eng" style="color: #636b6f; font-weight: 600;">How To Use</a></div>
                        <div class="col-md-2"><a href="/docs/jap" style="color: #636b6f; font-weight: 600;">使い方</a></div>
                        <div class="col-md-2"><a href="#campaign" style="color: #636b6f; font-weight: 600;">CAMPAIGN</a></div>
                        <div class="col-md-3"><a href="#news" style="color: #636b6f; font-weight: 600;">NEWS</a></div>
                        <div class="col-md-3"><a href="#donation" style="color: #636b6f; font-weight: 600;">DONATE</a></div>
                    </div>
                </div>
                <p>A service helps you buy stuffs without moving your ass!</p>
                <p>Finding Translator [From English or Vietnamese to Japanese]. Contact <strong>danganhvu1998@gmail.com</strong> if you want to help</p>
            </section>
        </div>
        <section class="content" id="donation">
            <h2><b><a href="/home">DONATE</a></b></h2><br>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="95VX9JHHCMSWS">
                <input type="hidden" name="on0" value="Buy me a cup of coffee!">Buy me a cup of coffee!
                <br>
                <select name="os0">
                    <option value="A small cup of coffee">A small cup of coffee ¥100 JPY</option>
                    <option value="Big coffee cup">Big coffee cup ¥400 JPY</option>
                    <option value="A bottle of coffee">A bottle of coffee ¥1,000 JPY</option>
                    <option value="A tank of coffee">A tank of coffee ¥10,000 JPY</option>
                </select> <br><br>
                <input type="hidden" name="currency_code" value="JPY">
                <input type="image" src="https://www.paypalobjects.com/en_US/JP/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        </section> <br><br><br>
        <section class="content" id="campaign">
            <h2><b><a href="/home">CAMPAIGN</a></b></h2>
            <p>
                <b style="color: #636b6f; font-weight: 600;">
                    25-Sep-2018 -> 31-Oct-2018 「Dormy Kawaguchi」:
                </b> 
                Guarantee every order before 11h30AM every Saturday and Sunday will be deliverd before 12h30PM.
            </p>
            <p>
                <b style="color: #636b6f; font-weight: 600;">
                    25-Sep-2018 -> 31-Oct-2018 「Dormy Kawaguchi」:
                </b> 
                Randomly discount 50% (up to 150¥) for 3 orders every week
            </p>
        </section><br><br><br>
        <section class="content" id="news">
            <h2><b><a href="/home">NEW</a></b></h2>
            <p>
                <b style="color: #636b6f; font-weight: 600;">
                        25-Sep-2018:
                </b> 
                Upgraded to HTTPS! Haura! Now you can login/register with confident!
            </p>
            <p>
                <b style="color: #636b6f; font-weight: 600;">
                        24-Sep-2018:
                </b> 
                Add 「Kitazono women's dormitory」 and 「Toyo University - International House (IH)」 MORE FRIENDS MORE FUN!
            </p>
        </section><br><br><br>
    </body>
</html>
