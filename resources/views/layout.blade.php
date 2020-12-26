<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">              
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>      
        
        <div class="collapse navbar-collapse pr-4" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href={{url('/')}}>Home</a>
            </li>          
            @if(!Session::has('user')) 
            <li class="nav-item">
              <a class="nav-link" href={{url('login')}}>Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{url('registration')}}>Registration</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href={{url('myaccount')}}>My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{url('logout')}}><i class="fa fa-fw fa-power-off"></i> Logout</a>
            </li>            
            @endif
          </ul>
        </div>
    </nav>
</header>

@yield('content')

<footer>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="footer-heading text-white">
                <h4>Follow Me</h4>
            </div>
            <div class="socialLink">
                <ul>
                    <li><a href="javascript:void(0);"><i class="fa fa-fw fa-facebook"></i> Facebook</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-fw fa-instagram"></i> Instagram</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-fw fa-twitter"></i> Twitter</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-fw fa-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="footer-heading text-white">
                <h4>Visit Also</h4>
            </div>
            <div class="visitPage">
                <ul>
                    <li><a href={{url('/')}}>Home</a></li>
                    
                @if(Session::has('user')) 
                    <li><a href={{url('/myaccount')}}>My Account</a></li>
                @else
                    <li><a href={{url('login')}}>Login</a></li>
                    <li><a href={{url('registration')}}>Registration</a></li>
                @endif
                </ul>
            </div>                        
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="footer-heading text-white">
                <h4>Contact Us</h4>
            </div>            
            <div class="contactForm">
                {!!Form::open() !!}
                <div class="form-group">
                  {{Form::text("cusername","",array('class' => 'form-control','id' => 'con_username','placeholder'=>'Enter Your Username...'))}}
                  {{-- <span class="usernameValid text-danger"></span> --}}
                </div>
                <div class="form-group">
                  {{Form::text("cemail","",array('class' => 'form-control','id' => 'con_email','placeholder'=>'Enter Your Email...'))}}
                  {{-- <span class="emailValid text-danger"></span> --}}
                </div>
                <div class="form-group">
                  {{Form::text("cmobile","",array('class' => 'form-control','id' => 'con_mobile','placeholder'=>'Enter Your Mobile...'))}}
                  {{-- <span class="mobileValid text-danger"></span> --}}
                </div>   
                <div class="form-group">
                    {{Form::textarea("cmessage","",array('class' => 'form-control','id' => 'con_message','placeholder'=>'Enter Your Message...','rows'=>'e'))}}
                    {{-- <span class="messageValid text-danger"></span> --}}
                  </div>                   
                {{Form::submit("Send",array('class' => 'btn btn-success','id' => 'contactBtn'))}}
          
              {!!Form::close() !!}                
                {{-- <form >
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Full Name..." id="contact_name">
                    </div>        
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email..." id="contact_email">
                    </div>
                    <div class="form-group">
                        <input type="number" name="mobile" class="form-control" placeholder="Enter your Mobile Number..." id="contact_mobile">
                    </div>        
                    <div class="form-group">
                        <textarea name="contact_message" id="" class="form-control" rows="3" placeholder="Type Your Message..."></textarea>
                    </div>                         
                    <button type="submit" class="btn btn-success">Send</button>
                </form>                     --}}
            </div>
        </div> 
        <div class="col-lg-12 col-md-12 border-top mt-5">
            <div class="text-center copywrite text-white px-4 mt-2">
                <p>Copyright &copy; 2020 All Right Reserve</p>
            </div>
        </div>               
    </div>
</footer>



{{-- <script src="{{asset('js/app.js')}}"></script> --}}
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>