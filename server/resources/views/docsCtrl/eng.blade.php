@extends('layouts.app')

@section('content')
    <h3>WELCOME to SHF - Chào Đồng Bào</h3>
    <p>I think we was all in situation like this. It is 1PM, you are so hungry, weather is crazy bad: hot, raining, snow, etc. You don't want to go out, but you have to :(. Don't worry, I'm here to help :D</p>
    <p>So how SHF can solve it? Its idea is very simple, one person will go out and buy all stuffs others need, and he(she) will gain some point. And then he(she) can use the point to make request for other to buy his(her) stuffs.</p>
    
    <h3>so How To Use</h3>
    <p>First: Register!</p>
    <p class="text-primary">This is how the thing done: First you add something to your buy list. Then go to <b>My Stuffs</b> to confirm that you really want to buy it. After that, other from the same building can see your order. They will take it of they want, go to the market, buy your stuffs and bring it home. After finish, they can mark order as finished. After that, you can see who and which room is now having your stuffs and go to take it. Of course you have to pay money according to bills. Finally, don't forget to <b>CONFIRM THAT YOU DO RECEIVE YOUR ORDER OR NOT</b></p>
    <p>If you want to go to supermaket, go to <b>Let's Go Out</b> and take some others' order with you. After finish it, you will gain point. The more you take, the more you get!</p>
    <p>After that, you now can buy and request, <b>but nobody can see it!</b> You have to fill other information like <strong>room number</strong> or <strong>a picture in front of your door (and with you, it's even better!)</strong> and you are ready to go!</p>
    <p>Now you are in the system. You can find stuffs you want to buy or create a new one(but make sure make it clear enough that everyone can understand)</p>
    <p>If you want to buy more than 5 stuffs, you HAVE TO GO BY YOURSELF, and don't forget to take some others' order with you and gain some points. (Limit amount might change in the future)</p>
    <p>One point will help you to buy one stuff. 10 points 10 stuffs.</p>
    <p><b class="text-danger">We just connect people, WE WILL TAKE NO RESPONSE ABOUT MONEY</b></p>
    <p>More features is in developing</p>
    <p>And finally, <strong class="text-danger">PLAY FAIR</strong></p>
    <h3>Some simple rule</h3>
    <p>An order remains untaken for two day will be deleted. An order has been taken for 1 hours but not yet finished will be come untaken order and anyone can retake it. An order that Taker confirms finished, but Buyer not confirm it will be consider as SUCCESSED-ORDER</p>

    <hr>
    <ul> From Admin : 
        <li>Testing time will end at <b class="text-primary">23:59 31/October/2018</b>. Before that, you have infinity point. Feel free to use! In testing time, guarantee that every order before 11h30AM every Saturday and Sunday will be deliverd before 12h30PM.</li>
        <li>The point you gain in testing time will not lose after that. For example, if you gain <b>10</b> points and use <b>3</b>, you will have extra <b>7</b> points. Gain 3 use 7, you got no extra! After testing time, first 4 people will have <b>10 + extra point</b>. Other will have <b>3 + extra point</b>. New registers have nothing</li> 
        <li>If you find any bugs, or any ideas to improve SHF, please fell free to inform me at <b class="text-danger">danganhvu1998@gmail.com</b>. Thank you!(Of course, extra point!)</li>
        <li>It is recommend that your avata picture contains your front door</li>
        <li>Trouble? Please read: <a href="/docs/eng">English</a> or <a href="/docs/jap">日本語(not yet)</a></li>
    </ul>
@endsection