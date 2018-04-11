<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Liens</h4>
          <ul class="list-unstyled">
            <?php 
              if(isset($_USER) && $_USER != false){
            ?>
              <form class="form-signin" action="/post/profile/logout" method="POST">
                <input type="hidden" value="<?= $_USER->id ?>" name="id">
                <button type="submit" style="padding-left: 0;" class="btn btn-link text-white">Logout (<?= ucfirst($_USER->username) ?>)</button>
              </form>
            <?php 
              }else{
                echo '<li><a href="/login.html" class="text-white">Login</a></li>';
              }

              if( isset($_USER->id)){
              ?>
                <a href="/article/new.html" class="text-white">Nouvel article</a>
              <?php
              }
             ?>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark box-shadow">
    <div class="container d-flex justify-content-between">
      <a href="/" class="navbar-brand d-flex align-items-center">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.694 31.694" style="enable-background:new 0 0 31.694 31.694;" xml:space="preserve" width="20px" height="20px">
<g>
  <path d="M23.112,9.35c-4.473,2.742-7.697,6.205-9.006,7.744l-3.361-2.633c-0.089-0.064-1.934,1.574-1.885,1.625l6.121,6.223   c0.045,0.051,0.107,0.074,0.174,0.074c0.012,0,0.031,0,0.047-0.004c0.08-0.018,0.148-0.072,0.178-0.152   c0.986-2.521,4.242-7.799,8.4-11.627c0.074-0.07,0.1-0.18,0.059-0.275C23.838,10.324,23.174,9.312,23.112,9.35z" fill="#FFFFFF"/>
  <path d="M27.126,3.842c-9.268,0-10.836-3.518-10.85-3.551C16.208,0.119,16.04,0.004,15.85,0c0,0-0.004,0-0.008,0   c-0.184,0-0.354,0.115-0.428,0.283C15.403,0.32,13.801,3.842,4.568,3.842c-0.258,0-0.462,0.209-0.462,0.461v15.764   c0,6.453,11.084,11.383,11.553,11.59c0.062,0.027,0.121,0.037,0.188,0.037c0.061,0,0.127-0.01,0.186-0.037   c0.473-0.207,11.555-5.137,11.555-11.59V4.303C27.586,4.051,27.381,3.842,27.126,3.842z M25.038,19.15   c0,5.049-8.678,8.912-9.047,9.072c-0.045,0.023-0.098,0.031-0.145,0.031c-0.051,0-0.098-0.008-0.146-0.031   c-0.365-0.16-9.046-4.023-9.046-9.072V6.811c0-0.199,0.161-0.363,0.362-0.363c7.229,0,8.482-2.756,8.494-2.783   c0.057-0.133,0.189-0.223,0.334-0.223c0.002,0,0.006,0,0.006,0c0.148,0.002,0.279,0.092,0.332,0.229   c0.012,0.025,1.24,2.777,8.494,2.777c0.201,0,0.361,0.164,0.361,0.363L25.038,19.15L25.038,19.15z" fill="#FFFFFF"/>
</svg>
        <strong style="margin-left:5px;">SecuTest</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>