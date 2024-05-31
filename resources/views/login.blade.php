

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet"  href="{{asset('css/login.css')}}"/>
    <title>Sign in Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">


          <form method="POST"  action={{route('login')}}class="sign-in-form">
            @csrf
            <h2 class="title">WELCOME BACK!</h2>
            <p style="color:white">READY TO BOOK A DESK?</p>
  @csrf
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" />
            </div>
<div>
                    @error('username')
                    <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
                    @enderror
               </div>





            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password"  value="{{ old('password') }}"/>
            </div>
            <div>
                @error('password')
                <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
                @enderror
            </div>



            <input  type="submit" name="submit" value="ENTER" class="btn solid" />
           <a href="/users/forgotpassword" style="color:white;text-decoration:none">
              Forgot Password?
            </a>
          </form>







         

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
             <a href="/" class="logo">
            <img src="{{ asset('images/ahs-logo.svg') }}" alt="" style="width:150px">
             </a>
            <h3>Where Flexibility Meets Productivity in Every Seat.</h3>
            <p>
             New Here?
            </p>
            <a href="/users/register" class="btn transparent" id="sign-up-btn">
              Sign up
            </a>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            
         
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
    </script>
  </body>
</html>




