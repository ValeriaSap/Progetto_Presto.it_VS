<!-- Footer -->
<footer class="bgE text-center mt-auto">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      {{-- <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1 bgD" href="#!" role="button"
          ><i class="fab fa-facebook-f text-white"></i
        ></a>
  
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1 bgD" href="#!" role="button"
          ><i class="fab fa-twitter text-white"></i
        ></a>
  
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1 bgD" href="#!" role="button"
          ><i class="fab fa-google text-white"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1 bgD" href="#!" role="button"
          ><i class="fab fa-instagram text-white"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1 bgD" href="#!" role="button"
          ><i class="fab fa-linkedin-in text-white"></i
        ></a>
  
        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1 bgD" href="#!" role="button"
          ><i class="fab fa-github text-white"></i
        ></a>
      </section> --}}
      <!-- Section: Social media --> 
  
      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          <strong>{{__('ui.nome')}}</strong>
        </p>
      </section>
      <!-- Section: Text -->
  
<!-- Section: Links  -->
<section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <a class="navbar-brand" href="#">

              <img src="https://media.discordapp.net/attachments/1168854256120500224/1172184835322818610/IMG_0449.png?ex=655f6532&is=654cf032&hm=529a257399153a3de899354677d3a70816209a9bce2336e1dc9c80aa073946a4&=&width=605&height=605" alt="" height="80px">
            </a>
          </i>Presto
          </h6>
          <p>
            {{__('ui.footerDesc')}}
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            {{__('ui.team')}}
          </h6>
          <p>
            <a href="#!" class="text-reset">Margherita Bombi</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Valeria Saponaro</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Nick Podda</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Leonardo Garofalo</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Jacopo Tei</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Presto.it
          </h6>
          <p>
            @guest
            <p>
              {{__('ui.teamWork')}}
  
            </p>
            <a href="{{route('become.revisor')}}" class="text-reset btn bgA">
              {{__('ui.rev')}}
            </a>     
            @endguest
            @auth
            @if (!Auth::user()->is_revisor)
            <a href="{{route('become.revisor')}}" class="text-reset btn bgA">
              {{__('ui.rev')}}
            </a>     
            @endif
                
            @endauth
            
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        {{-- <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div> --}}
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white" href="https://www.aulab.it/">Aulab.it</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->