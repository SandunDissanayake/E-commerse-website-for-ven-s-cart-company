<?php
require('navbar.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
        body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(1, 30, 34);
    font-family: sans-serif;
}
.container{
    max-width: 950px;
}
.card{
    border-radius: 1rem;
    box-shadow: 0px -10px 0px rgb(151, 248, 6);
}
@media(max-width:767px){
    .card{
        margin: 1rem 0.7rem 1rem;
        max-width: 80vw;
    }
}
img{
    width: 6.2rem;
    border-radius: 5rem;
    margin: 1.3rem auto 1rem auto;
}
.col-md-4{
    padding:0  0.5rem;
}
.card-title{
    font-size: 1rem;
    margin-bottom: 0;
    font-weight: bold;
    font-family: 'IM Fell French Canon SC';
}
.card-text{
    text-align: center;
    padding: 1rem 2rem;
    font-size: 0.8rem;
    color: rgb(82, 81, 81);
    line-height: 1.4rem;
}
.footer{
    border-top: none;
    text-align: center;
    line-height: 1.2rem;
    padding: 2rem 0 1.4rem 0;
    font-family: 'Varela Round';
}
#name{
    font-size: 0.8rem;
    font-weight: bold;
}
#position{
    font-size: 0.7rem;
}
a{
    color: rgb(151, 248, 6);
    font-weight: bold;
}
a:hover{
    color: rgb(151, 248, 6);
}
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card d-flex mx-auto">
                    <div class="card-image">
                        <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/3TlwnLF.jpg">
                    </div>
                    <div class="card-text">
                        <div class="card-title">Lorem Ipsum!</div>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                        Maecenas nec odio et ante tincidunt tempus
                        Duis leo. Donec sodales sagittis magna
                    </div>
                    <div class="footer">
                        <span id="name">Micheal Smith<br></span>
                        <span id="position">CEO of <a href="#">Google.com</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card d-flex mx-auto">
                    <div class="card-image">
                        <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/Uz4FjGZ.jpg">
                    </div>
                    <div class="card-text">
                        <div class="card-title">Lorem Ipsum!</div>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                        Maecenas nec odio et ante tincidunt tempus
                        Duis leo. Donec sodales sagittis magna
                    </div>
                    <div class="footer">
                        <span id="name">Angellia Miller<br></span>
                        <span id="position">CEO of <a href="#">Facebook.com</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card d-flex mx-auto ">
                    <div class="card-image">
                        <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/udGH5tO.jpg">
                    </div>
                    <div class="card-text">
                        <div class="card-title">Lorem Ipsum!</div>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                        Maecenas nec odio et ante tincidunt tempus
                        Duis leo. Donec sodales sagittis magna
                    </div>
                    <div class="footer">
                        <span id="name">Christina Williams<br></span>
                        <span id="position">UX Designer at <a href="#">Youtube.com</a></span>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="col-md-4">
                <div class="card d-flex mx-auto">
                    <div class="card-image">
                        <img class="img-fluid d-flex mx-auto" src="images/vens.png">
                    </div>
                    <div class="card-text">
                        <div class="card-title">Lorem Ipsum!</div>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                        Maecenas nec odio et ante tincidunt tempus
                        Duis leo. Donec sodales sagittis magna
                    </div>
                    <div class="footer">
                        <span id="name">Angellia Miller<br></span>
                        <span id="position">CEO of <a href="#">Facebook.com</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card d-flex mx-auto">
                    <div class="card-image">
                        <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/Uz4FjGZ.jpg">
                    </div>
                    <div class="card-text">
                        <div class="card-title">Lorem Ipsum!</div>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                        Maecenas nec odio et ante tincidunt tempus
                        Duis leo. Donec sodales sagittis magna
                    </div>
                    <div class="footer">
                        <span id="name">Angellia Miller<br></span>
                        <span id="position">CEO of <a href="#">Facebook.com</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card d-flex mx-auto">
                    <div class="card-image">
                        <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/Uz4FjGZ.jpg">
                    </div>
                    <div class="card-text">
                        <div class="card-title">Lorem Ipsum!</div>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                        Maecenas nec odio et ante tincidunt tempus
                        Duis leo. Donec sodales sagittis magna
                    </div>
                    <div class="footer">
                        <span id="name">Angellia Miller<br></span>
                        <span id="position">CEO of <a href="#">Facebook.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>