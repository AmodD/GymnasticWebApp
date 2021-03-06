<nav class="navbar is-primary  is-transparent" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
	PGA logo
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
      <a id="students" class="button is-rounded" href="/students" >
	<span class="icon"><i class="fas fa-users"></i></span>
        &nbsp; Students
      </a>
      </span>
      <span class="navbar-item">
      <a id="attendances" class="button is-rounded" href="/attendances/batches" >
	<span class="icon"><i class="fas fa-calendar-alt"></i></span>
        &nbsp; Attendances
      </a>
      </span>
      <span class="navbar-item">
      <a id="fees" class="button is-rounded" href="/fees/centres" >
	<span class="icon"><i class="fas fa-rupee-sign"></i></span>
        &nbsp; Fees
      </a>
      </span>
      <span class="navbar-item is-hidden-mobile">
      <a id="fees" class="button is-rounded" href="/archives" >
	<span class="icon"><i class="fas fa-archive"></i></span>
        &nbsp; Archives
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


<script>
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>

