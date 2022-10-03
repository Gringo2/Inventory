<html>
<head>
        <title>Register </title>        
        <link href="css/auth.css" rel="stylesheet" />
</head>
<body>
<div class="form-container">
            <div class="form-container__details">
              <h1 class="form-container__title">Login</h1>
              <h3 class="form-container__sub-title"></h3>
            </div>
            <form method = "POST" action="{{ route('login')}} " class="form">
              @csrf
              <div class="form__field">
                <label class="form__label">Username</label>
                <input
                  name="email"
                  autocomplete="off"
                  placeholder="username"
                  type="text"
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
              <button class="form__submit">signin</button>
             
            </form>
          </div>
    </body>
</html>