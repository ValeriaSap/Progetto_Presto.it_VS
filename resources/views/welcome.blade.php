<x-layout>
    <x-header></x-header>
    <div class="container mt-4">
        <div class="row text-center justify-content-center">
            <div class="col-6 justify-content-center">
                @if(session('access.denied'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('access.denied')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
    </div>
    @if(session('message'))
    <div class="container mt-3">
      <div class="row">
        <div class="col-12 d-flex justify-content-center text-center">
          <div class=" alert alert-success alert-dismissible fade show bunner" role="alert">
            <strong></strong>{{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    </div>
    @endif
    <div class="container mt-5">
        <h1 class="text-center mb-5">{{__('ui.weArticoli')}}</h1>
        <div class="row">
            @foreach ($lastArticles as $article)
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <div class="h-100 card card-new shadow-lg mx-2"><a class="card-img-tiles" href="#" data-abc="true">
                    <div class="inner">
                        <div class="main-img position-relative img-card"><img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(300, 300) : 'https://picsum.photos/300'}}" alt="Category">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bgC">
                                new
                                <span class="visually-hidden"></span>
                              </span>
                        </div>
                        {{-- <div class="thumblist"><img src="https://i.imgur.com/ILEU18M.jpg" alt="Category"><img src="https://i.imgur.com/2kePJmX.jpg" alt="Category"></div> --}}
                    </div></a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$article->title}}</h4>
                        <h5 class="card-title colorC">{{$article->category->name}}</h5>
                        <p class="text-muted">{{$article->price}} €</p>
                       <a class="btn bgA" href="{{route('article_show', compact('article'))}}">{{__('ui.weDett')}}</a>
                    </div>
                </div>
            </div>
            @endforeach
            <x-balloons></x-balloons>
        </div>
    </div>
</x-layout>





