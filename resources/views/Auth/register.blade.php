<html>
<head>
        <title>Register</title>        
        <link href="css/auth.css" rel="stylesheet" />
</head>
<body>
<div class="form-container">
            <div class="form-container__details">
              <h1 class="form-container__title">Register</h1>
              <h3 class="form-container__sub-title"></h3>
            </div>
            <form method = "POST" action="{{ route('register')}} " class="form">
              @csrf
              <div class="form__field">
                <label class="form__label">Full name</label>
                <input
                  name="name"
                  autocomplete="off"
                  placeholder="Enter Your Name"
                  type="text"
                  class="form__input"
                />
              </div>
              <div class="form__field">
                <label class="form__label">Email Address</label>
                <input
                  name="email"
                  autocomplete="off"
                  placeholder="Enter Your Email"
                  type="email"
                  class="form__input"
                />
              </div>
              <div class="form__field">
                <label class="form__label">Password</label>
                <input
                  name="password"
                  autocomplete="off"
                  placeholder="password"
                  type="password"
                  class="form__input"
                />
              </div>
              <button class="form__submit">signup</button>
              if you already have an account <a href="{{ route('login')}}">login</a>
            </form>
          </div>
    </body>
</html>