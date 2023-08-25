<style>
    .row{
        display:flex;
        justify-content: center;
        align-items: center;
    }
    a{
        text-decoration: none;
    }
    .col{
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .col .btn{
        padding:5px;
        display:flex;
        justify-content: center;
        background:#08693C;
        color:#fff;
        border-radius:4px;
        text-decoration:none;
    }
    .col .footer{
        margin-top:50px;
    }
</style>

<div class="row">
    <div class="col">  
        <p> Dear {{ $user['name'] }}, </p>
        <p> Congratulations. Your email has been verified successfully.  </p>
      
        <br>
        <hr>
        

        <small style="align-self: flex-start;margin-top:50px;">Thank You,</small>
        <small class="footer"><a href="cashdrive.co">Novus Agro</a> &copy; 2020 | +234 8139466737</small>
    </div>
</div>


