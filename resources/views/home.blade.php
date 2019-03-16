
@extends('layouts.app')

@section('top')

	@if(Auth::guest())
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')

<div class="tile is-ancestor">
  <div class="tile is-parent">
    <article class="tile is-child box">
	<figure class="image is-2by1">
	  <img src="img1.jpg">
	</figure>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
	<figure class="image is-2by1">
	  <img src="img2.jpg">
	</figure>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
	<figure class="image is-2by1">
	  <img src="img3.jpg">
	</figure>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
	<figure class="image is-2by1">
	  <img src="img4.jpg">
	</figure>
    </article>
  </div>
</div>

<div class="tile is-ancestor">
  <div class="tile is-vertical is-10">
    <div class="tile">
      <div class="tile is-parent">
	<article class="tile is-child box">
	<figure class="image is-2by1">
	  <img src="img5.jpg">
	</figure>
        </article>
      </div>
      <div class="tile is-8 is-vertical">
        <div class="tile is-parent has-text-centered">
          <article class="tile is-child box has-background-dark">
            <p class="title has-text-white">Pune Gymnastics Academy</p>
	    <p class="subtitle has-text-white">( Formerly Fearless Flyers Gymnastics )</p>
	    <br>	
            <p class="title has-text-white">9158 999 472</p>
            <p class="subtitle has-text-white">abhi.padhye@gmail.com</p>
          </article>
        </div>
      </div>
    </div>
    <div class="tile">
      <div class="tile is-4 is-parent">
	<article class="tile is-child box">
	<figure class="image is-3by2">
	  <img src="img9.jpg">
	</figure>
          </article>
      </div>
      <div class="tile is-parent">
	<article class="tile is-child box">
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/cO32-aBbHaM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </article>
      </div>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
	<figure class="image is-1by3">
	  <img src="img11.jpg">
	</figure>
    </article>
  </div>
</div>

<div class="tile is-ancestor">
  <div class="tile is-parent">
    <article class="tile is-child box has-background-dark">
	@if(Auth::guest())
		@component('components.login') @endcomponent
	@endif
    </article>
  </div>
</div>

@endsection
