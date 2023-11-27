<x-layout>
    <div class="container mt-100">     
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-1 colorP">{{__('ui.tuttiArticoli')}}</h1>
            </div>
            @forelse ($articles as $article)
            <div class="col-md-4 col-sm-6 mb-5">
                <div class="card h-100 shadow-lg mb-30"><a class="card-img-tiles" href="#" data-abc="true">
                    <div class="inner">
                        <div class="main-img"><img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(300, 300) : 'https://picsum.photos/300'}}" alt="Category"></div>
                        
                    </div></a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$article->title}}</h4>
                        <h5 class="card-title colorC">{{$article->category->name}}</h5>
                        <p class="text-muted">{{$article->description}}...</p>
                        <p class="text-muted">{{$article->price}} €</p>
                        <a class="btn bgA" href="{{route('article_show', compact('article'))}}">{{__('ui.weDett')}}</a>
                    </div>
                </div>
            </div>
            @empty 
            <div class="row justify-content-center">
            <div class="col-6 text-center">
                <div class='alert bgA shadow'>
                    <h3 class='my-3'>{{__('ui.messNoArt')}}</h3>
                </div>
            </div>
        </div>
            @endforelse
            {{$articles->links()}}
        </div>
    </div>
</x-layout>