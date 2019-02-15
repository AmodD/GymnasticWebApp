<nav class="navbar is-primary  is-transparent" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <span class="navbar-item">
      <a class="button is-rounded" href="/">
	<span class="icon"><i class="fas fa-home"></i></span>
         &nbsp; Home
      </a>
      </span>	
      <span class="navbar-item">
      <a id="dashboard" class="button is-rounded" href="/dashboard" >
	<span class="icon"><i class="fas fa-tachometer-alt"></i></span>
        &nbsp; Dashboard
      </a>
      </span>
      <span class="navbar-item">
      <a id="centres_menu" class="button is-rounded" href="/centres" >
	<span class="icon"><i class="fas fa-tachometer-alt"></i></span>
        &nbsp; Centres
      </a>
      </span>
      <span class="navbar-item">
      <a id="batches_menu" class="button is-rounded" href="/batches" >
	<span class="icon"><i class="fas fa-tachometer-alt"></i></span>
        &nbsp; Batches
      </a>
      </span>
      <span class="navbar-item">
      <a id="students_menu" class="button is-rounded" href="/students" >
	<span class="icon"><i class="fas fa-tachometer-alt"></i></span>
        &nbsp; Students
      </a>
      </span>

    </div>

    <div class="navbar-end">
	<span class="navbar-item">
	<form id="logout-form" action="{{ route('logout') }}" method="POST" >{{ csrf_field() }}
		<button id="logout" class="button is-rounded " href="{{ route('logout') }}" 
			onclick="event.preventDefault();document.getElementById('logout-form').submit();">
			<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
			&nbsp; LogOut
		</button>
	</form>
	</span>		
    </div>
  </div>
</nav>


