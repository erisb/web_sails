@extends('mains.headersolid')
<!-- Hero Slide  -->
@section('content')
<section id="home" class="fluid-container">
  <section class="hero">
      <div class="overlay-black"></div>
          <div class="hero-content text-center">
              <header class="typewriter">
                  <h1 class="h1">The Best App to Increase Productivity</h1>
              </header>

              <p class="h4 pt-3 pb-4">A Desktop & Web app for your terminal.</p>
              <div>
                  <a href="{{url('register')}}" class="btn btn-primary btn-lg pr-5 pl-5">Getting Started</a>
              </div>
              <div  class="mouse mt-5"></div>
          </div>
  </section>
</section>

<!-- About -->
<section id="about" class="text-dark pt-5 pb-5">
    <section class="container services text-center pt-5 pb-5">
        <div class="row justify-content-md-center ">

            <div class="col-xs-12 col-md-10 col-sm-12">
                <h2 class="text-center pb-3">We Bring Your Port to The Next Level</h2>
            </div>
            <div class="col-xs-12 col-md-8 col-sm-12 pl-5 mr-5">
                <p class="text-center pb-4"> We build smart digital branding strategies through careful & comprehensive research, utilizing self-developed tools to make the process even more efficient.</p>
            </div>

            <div class="container mr-5 ml-5">
              <div class="row">
                <div class="col-sm">
                  <div class="card pt-5 pb-5" >
                      <div class="card-body">
                        <i class="oi oi-home" style="font-size: 3em;"></i>
                        <h4 class="card-title">24/7 Support</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
                <div class="col-sm">
                  <div class="card pt-5 pb-5" >
                      <div class="card-body">
                        <i class="oi oi-data-transfer-download" style="font-size: 3em;  color: #FF7043;"></i>
                        <h4 class="card-title">Data Privacy</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
                <div class="col-sm">
                  <div class="card pt-5 pb-5" >
                      <div class="card-body">
                        <i class="oi oi-cog" style="font-size: 3em;"></i>
                        <h4 class="card-title">Easy Configuration</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</section>
<!-- Plan -->
<section id="pricing" class="hero-section pb-5">
    <div class="overlay-white"></div>
    <section class="text-dark pt-5 pb-5">
        <section class="container services text-center pt-5 pb-5">
            <div class="row justify-content-md-center ">

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <h2 class="text-center pb-3">Choose Your Plan</h2>
                </div>
                <div class="col-xs-12 col-md-8 col-sm-12 pl-5 mr-5">
                    <p class="text-center pb-4"> We build smart digital branding strategies through careful & comprehensive research, utilizing self-developed tools to make the process even more efficient.</p>
                </div>

                <div class="container mr-5 ml-5">
                  <div class="row">
                    <div class="col-sm">
                      <div class="card pt-5 pb-5" >
                          <div class="card-body">
                            <h4 class="card-title">On Premise</h4>
                            <p>Application Runs on your computer</p>
                            <p class="h1 pt-5 pb-4"> <i class="h1 oi oi-laptop"></i> </p>
                            <p class="pb-2">Send Mail</p>
                            <button type="button" class="btn btn-outline-primary mb-3" onclick="window.location.href='/register';">REGISTER NOW</button>
                            <div class="row mt-5">
                                <div class="col-6">
                                  <i class="oi oi-check "> </i>
                                  <span class="text-left">Annual Technical Support</span>
                                </div>
                                <div class="col-6">
                                  <i class="oi oi-check text-right"> </i>
                                  <span>Desktop Application</span>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm">
                      <div class="card blue-gradient pt-5 pb-5" >
                          <div class="card-body">
                            <h4 class="card-title">Cloud Service</h4>
                            <p>is a suite of cloud computing services</p>
                            <p class="h1 pt-5 pb-4">Rp. 25.000K</p>
                            <p class="pb-2">/Site/Month Billed Annualy</p>
                            <button type="button" class="btn btn-white mb-3">GET FREE TRIAL</button>
                            <div class="row mt-5">
                                <div class="col-6">
                                  <i class="oi oi-check"> </i>
                                  <span class="text-left">Free Support</span>
                                </div>
                                <div class="col-6">
                                  <i class="oi oi-check text-right"> </i>
                                  <span> Web Application</span>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
    </section>
</section>

<!-- Customer -->

<section class="testimonial-section2">
        <div class="row text-center pt-5">
           <div class="col-12">
              <div class="h3 text-white">What Our Customer Say!</div>
           </div>
        </div>
        <div id="testim" class="testim">
<!--<div class="testim-cover"> -->
            <div class="wrap">
                    <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                    <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                    <ul id="testim-dots" class="dots">
                        <li class="dot active"></li><!--
                        --><li class="dot"></li><!--
                        --><li class="dot"></li><!--
                        --><li class="dot"></li><!--
                        --><li class="dot"></li>
                    </ul>
                    <div id="testim-content" class="cont">
                        <div class="active">
                            <div class="img"><img src="https://image.ibb.co/hgy1M7/5a6f718346a28820008b4611_750_562.jpg" alt=""></div>
                            <div class="h4">Kellie</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        </div>

                        <div>
                            <div class="img"><img src="https://image.ibb.co/cNP817/pexels_photo_220453.jpg" alt=""></div>
                            <div class="h4">Jessica</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        </div>

                        <div>
                            <div class="img"><img src="https://image.ibb.co/iN3qES/pexels_photo_324658.jpg" alt=""></div>
                             <div class="h4">Kellie</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        </div>

                        <div>
                            <div class="img"><img src="https://image.ibb.co/kL6AES/Top_SA_Nicky_Oppenheimer.jpg" alt=""></div>
                            <div class="h4">Jessica</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        </div>

                        <div>
                            <div class="img"><img src="https://image.ibb.co/gUPag7/image.jpg" alt=""></div>
                            <div class="h4">Kellie</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        </div>

                    </div>
            </div>
        </div>
<!--</div> -->
</section>
@endsection
