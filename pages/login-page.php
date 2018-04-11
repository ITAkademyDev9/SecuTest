  <link href="http://getbootstrap.com/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  
  <form class="form-signin" action="/post/profile/login" method="POST">
    <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
    <label for="inputEmail" class="sr-only">Adresse mail</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Adresse mail" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="1" name="remember"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form>