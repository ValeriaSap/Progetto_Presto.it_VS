<x-layout>
  <div class="container mt-100">
    <div class="row justify-content-center ">
      <div class="col-12 display-2 text-center p-3 titleShow mb-5">
        <h1 class="display-1 colorP ">{{__('ui.showTitolo')}} {{$article->title}}!</h1>
      </div>
      <div class="container mb-5">
        <div class="row justify-content-around bgE rounded-4">
          
          <div class="ms-1 col-md-5 align-self-center mt-4">
            <h3>{{$article->title}}</h3>
            <h5 class="colorC">{{$article->category->name}}</h5>
            <p><i class="far fa-clock"></i><small> {{__('ui.showData')}} {{$article->created_at->format('d/m/Y')}} </small></p>
            <p>{{__('ui.showDa')}} {{$article->user->name}}</p>
            <h5 class="mt-2 colorD fw-bold">{{__('ui.showDesc')}}</h5>
            <p>{{$article->description}}</p>
            <h5 class="mt-2 colorD  fw-bold">{{__('ui.showPrez')}}</h5>
            <p>{{$article->price}} €</p>
            
            {{-- @if(Auth::user() && $movie->user->id == Auth::user()->id)
              <div class="my-3 bgP col-6 p-3 bgButtonsShow">
                <h5>Dear {{$movie->user->name}} do you want to:</h5>
                <ul>
                  <li>
                    <p class="mb-2 mt-3 ">modify your review?</p>
                    <a href="{{route('article_edit',compact('movie'))}}"class="btn bgA btn-circle btn-circle-xl mt-0 d-flex align-items-center justify-content-center fs-3"><i class="fa-solid fa-pencil colorW"></i></a>
                  </li>
                  <li>
                    <p class="mb-2 mt-3">delete your review?</p>
                    <form method="POST" onclick="return confirm('Are you sure?')" action="{{route('article_destroy',compact('movie'))}}">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-circle btn-circle-xl mt-0 fs-3"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                  </li>
                </ul>
              </div>
              @endif --}}
            </div>
            
            <div class="col-md-5 my-5">
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                @if(count($article->images))
                <div class="carousel-inner rounded-4 shadow-lg">
                  @foreach ($article->images as $image)
                  <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="10000">
                    <img src="{{Storage::url($image->path)}}" class="img-fluid w-100 imgCarousel" alt="...">
                  </div>  
                  @endforeach
                </div>
                @else
                <div class="carousel-inner rounded-4 shadow-lg "> 
                  
                  <div class="carousel-item active" data-bs-interval="2000">
                    <img src="https://picsum.photos/500" class="img-fluid w-100 imgCarousel " alt="...">
                  </div>

                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://picsum.photos/501" class="img-fluid w-100 imgCarousel " alt="...">
                  </div>

                  <div class="carousel-item">
                    <img src="https://picsum.photos/502" class="img-fluid w-100 imgCarousel" alt="...">
                  </div>
                </div>
                @endif 
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
          
        </div>
        
        
      </div>
    </div>
  </x-layout>