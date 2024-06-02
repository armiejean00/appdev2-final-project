

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


        





          <form method="POST" action={{ route('register') }} class="sign-up-form" >
            <h2 class="title">WELCOME!</h2>
            <p style="color:white">  Have You Lost Something?</p>
 @csrf

           
          
             <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname') }}"/>
            </div>
          
             <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}"/>
            </div>
           
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            </div>
           
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password"  value="{{ old('password') }}" />
            </div>
           
             <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
            </div>


            <input type="submit" name="submit" class="btn" value="Sign up" />
         
            
           
          </form>
   <div style="display: flex">
 <p>Already have an account?  </p><a href={{ route('login') }} > Sign in</a>
            </div>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
         
        
        </div>
        <div class="panel right-panel">
            
          <div class="content">
           
          
          </div>
         
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




