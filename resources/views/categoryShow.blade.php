<x-layout >
    <section class="">
        <div class="container mt-5 ">
            <div class="row">
                <div class="col-12 text-center my-5">
                    <h1>{{__('ui.catTitolo')}}</h1>
                    <h2 class="colorP">{{__("ui.$category->name")}}</h2>
                </div>
                {{-- {{$article->category_id == $category->id ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}} --}}
                <div class="container">
                    <div class="row">

                        @forelse ($category->articles as $article)
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
                            <div class="h-100 card card-new shadow-lg"><a class="card-img-tiles" href="#" data-abc="true">
                                <div class="inner">
                                    <div class="main-img position-relative"><img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(300, 300) : 'https://picsum.photos/300'}}" alt="Category">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bgC">
                                            {{__('ui.wePill')}}
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
                        @empty 
                        <div class="col-12 text-center">
                            <h3 class="display-5 mb-5">{{__('ui.catOps')}}</h3>

                            <h3 class="my-5">{{__('ui.catSlogan')}}</h3>
                            <a class="btn btn-lg bgA mb-5" href="{{route('article_create')}}" role="button"
                            >{{__('ui.caricaArticoli')}}</a>
                        </div>
                        @endforelse
                        
                                    {{-- @if ($article->category_id == $category->id)
                                    <div class="ccol-12 col-md-6 col-lg-4 mb-5">
                                        <div class="h-100 card card-new shadow-lg"><a class="card-img-tiles" href="#" data-abc="true">
                                            <div class="inner">
                                                <div class="main-img"><img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(300, 300) : 'https://picsum.photos/300'}}" alt="Category"></div>
                                            </div></a>
                                            <div class="card-body text-center">
                                                <h4 class="card-title">{{$article->title}}</h4>
                                                <h5 class="card-title colorC">{{$article->category->name}}</h5>
                                                <h6 class="card-title">{{$article->price}} €</h6><a class="btn bgA" href="{{route('article_show', compact('article'))}}" >{{__('ui.weDett')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>