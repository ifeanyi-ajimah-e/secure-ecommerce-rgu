<style>
       .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }
    .col{
        margin: 0 auto;
        text-align: center;
    }
</style>

<div class="col">


<p> Dear {{ $user['name'] }},  </p>
<p> Please click the button below to verify your email address. </p>
<a class="" href="{{config('api.domain')}}/verify-email/{{$user['email']}}/{{$verificationToken}}" target="_blank" role="button"> <button class="button"> Verify Email Address </button> </a>

<br>
<hr>
<p style="margin: 0 5px">
    If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser:  <br> <br>
   <a href="{{config('api.domain')}}/verify-email/{{$user['email']}}/{{$verificationToken}}">  {{config('api.domain')}}/verify-email/{{$user['email']}}/{{$verificationToken}}  </a>
</p>
<br>
<small style="align-self: flex-start;margin-top:50px;">Thank You,</small>
<small class="footer"><a href="cashdrive.co">Novus Agro</a> &copy; 2020 | +234 8139466737</small>

</div>



