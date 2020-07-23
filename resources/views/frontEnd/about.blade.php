@extends('layoutFront.app')
@section('title','Tentang dan Sejarah')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{ url('frontend/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-2 bread">Youth &amp; Family</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Ministry <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="ministry-list">
							<li class="active"><a href="#">Youth &amp; Family</a></li>
							<li><a href="#">Community Outreach</a></li>
							<li><a href="#">Missions</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<h3 class="mb-4">Opportunities</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
						<ul class="ministry-list my-5">
							<li><span class="ion-ios-arrow-forward mr-2"></span>Bible classes for all ages</li>
							<li><span class="ion-ios-arrow-forward mr-2"></span>The Big Oxmox advised her not to do so</li>
							<li><span class="ion-ios-arrow-forward mr-2"></span>Pointing has no control about</li>
							<li><span class="ion-ios-arrow-forward mr-2"></span>Separated they live in Bookmarksgrove right</li>
						</ul>
						<hr>
						<h3 class="mb-4 mt-5">The Lord's Army</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>           
					</div>
				</div>
			</div>      
		</section>    

    <section class="ftco-section ftco-section-parallax bg-secondary ftco-no-pb">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white heading-section-no-line ftco-animate">
              <h2>Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  @endsection