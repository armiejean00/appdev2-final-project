

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
    <title>Sign up Form</title>
  </head>
  <body>
    <div class="container sign-up-mode">
      <div class="forms-container">
        <div class="signin-signup">


        





          <form method="POST" action="/register" class="sign-up-form" >
            <h2 class="title">WELCOME!</h2>
            <p style="color:white">READY TO JOIN?</p>
 @csrf

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" />
            </div>
             @error('username')
                        <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
            @enderror
             <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}"/>
            </div>
             @error('first_name')
                     <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
             @enderror
             <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"/>
            </div>
             @error('last_name')
                    <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
            @enderror
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            </div>
             @error('email')
                    <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
            @enderror
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password"  value="{{ old('password') }}" />
            </div>
             @error('password')
                     <p style="color:rgb(233, 54, 54);font-size:12px">{{ $message }}</p>
            @enderror
             <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
            </div>


            <input type="submit" name="submit" class="btn" value="Sign up" />
           
          </form>


        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
         
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            
          <div class="content">
              <a href="/" class="logo">
            <img src="{{ asset('images/ahs-logo.svg') }}" alt="" style="width:150px">
             </a>
            <h3>Unleash Your Productivity, Any Seat, Anytime.</h3>
            <p>
              One of Us?
            </p>
            <a href="/users/sign_in" class="btn transparent" id="sign-in-btn">
              Sign in
            </a>
          </div>
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




