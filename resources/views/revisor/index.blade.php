<x-layout>
    <div class="container-fluid bgRepeat">
      <div class="container py-4 h-100 bgW shadow">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="row  mt-5 justify-content-evenly">
            <div class="col-12 mt-5">
              <h1 class="display-3 text-center mt-2 colorP">{{__('ui.logTitolo')}} {{Auth::user()->name}}</h1>
            </div>
            <div class="col-12 text-center mt-3">
              @if($article_to_check)
              {{-- {{__('ui.rev1')}} --}}
              <h2> {{__('ui.ciSonoAncora')}} {{App\Models\Article::toBeRevisionedCount()}} {{__('ui.articoliDaRevisionare')}}</h2>
              @else
              {{-- {{__('ui.rev2')}} --}}
              <h2 > {{__('ui.rev2')}} </h2>
              @endif
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
          @if(!$article_to_undo == null) 
          <div class="container mt-3">
            <div class="row justify-content-center">
              <div class="table-responsive ">
                <table class="table border border-2 shadow-sm text-center ">
                  <thead>
                    <tr class="table-light">
                      <th scope="col ">ID</th>
                      <th scope="col ">{{__('ui.revOp')}}</th>
                      <th scope="col ">{{__('ui.revTito')}}</th>
                      <th scope="col ">{{__('ui.showData')}}</th>
                      <th scope="col ">{{__('ui.showDesc')}}</th>
                      <th scope="col ">{{__('ui.showPrez')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{$article_to_undo->id}}</th>
                      <td>
                        @if ($article_to_undo->is_accepted == 1)
                        <p>{{__('ui.revAccept')}}</p>
                        @else   
                        <p>{{__('ui.revReject')}}</p> 
                        @endif</td>
                      <td>{{$article_to_undo->title}}</td>
                      <td>{{$article_to_undo->created_at->format('d/m/Y')}}</td>
                      <td>{{$article_to_undo->description}}</td>
                      <td>{{$article_to_undo->price}} €</td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <div class="col-12 text-center mb-3">
                <form action="{{route('revisor.undo_article', ['article'=>$article_to_undo])}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger btn-lg ms-2 " type="submit">{{__('ui.revUnn')}}</button>
              </form>
              </div>
              </div>
            </div>
            @endif
    
          <section>
            @if ($article_to_check)
            <div class="container-fluid py-2 rounded-3">
              <div class="row d-flex justify-content-start align-items-center h-100">
                <div class="col-12 mb-4">
                  <div class="card mb-3 border-4 shadow p-4" style="border-radius: .5rem;">
                    <div class="row">
                      <div class="col-md-4" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <div>
                          <div id="carouselExampleInterval" class="carousel carosello slide" data-bs-ride="carousel">
                            
                            @if(count($article_to_check->images))
                            <div class="carousel-inner rounded-4 shadow-lg carouselSize">
                              @foreach ($article_to_check->images as $image)
                              <div class=" carousel-item slideC @if($loop->first) active @endif" data-bs-interval="10000">
                                <img src="{{Storage::url($image->path)}}" class="d-block w-100 h-100 imgCarousel" alt="...">
                              </div>
                              @endforeach
                            </div>
                            @else
                            <div class="carousel-inner rounded-4 shadow-lg "> 
                              
                              <div class="carousel-item active" data-bs-interval="2000">
                                <img src="https://picsum.photos/500" class="d-block w-100 h-100 imgCarousel " alt="...">
                              </div>
                              
                              <div class="carousel-item" data-bs-interval="2000">
                                <img src="https://picsum.photos/501" class="d-block w-100 h-100 imgCarousel " alt="...">
                              </div>
                              
                              <div class="carousel-item">
                                <img src="https://picsum.photos/502" class="d-block w-100 h-100 imgCarousel" alt="...">
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
    
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-9">
                            @foreach ($article_to_check->images as $image)
                            <div class="col-md-8">
                              <div class="p-2">
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                    <p class="d-inline">{{$label}}</p>
                                    @endforeach
                                @endif
                                <h5 class="tc-accent my-3">{{__('ui.revImm')}}</h5>
                                <hr>
                                <div class="card-body d-flex justify-content-between">
                                  <div>
                                      <p class="desc">Adulti: <span class="{{$image->adult}}"></span></p>
                                      <p class="desc">Satira: <span class="{{$image->spoof}}"></span></p>
                                      <p class="desc">Medicina: <span class="{{$image->medical}}"></span></p>
                                  </div>
                                  <div>
                                    <p class="ms-4 desc">Violenza: <span class="{{$image->violence}}"></span></p>
                                    <p class="ms-4 desc">Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        
                        <div class="row">
                          <h5 class="tc-accent my-3 ms-3">{{__('ui.revDesc')}}</h5>
                          <div class="col-md-10 ms-3"><hr></div>
                          <div class="col-12 d-flex justify-content-start">
                            <div class="col-5 ms-3 pb-3">
                              <h5 class="card-text colorP desc">{{__('ui.caricatoUtente')}}</h5>
                              <p class="fs-6 desc">{{$article_to_check->user->name}}</p>
                              <h5 class="card-text colorP desc">{{__('ui.revTito')}}</h5>
                              <p class="fs-6 desc">{{$article_to_check->title}}</p>
                              <h5 class="card-text colorP desc">{{__('ui.cateRev')}}</h5>
                              <p class="fs-6 desc">{{$article_to_check->category->name}}</p>
                            </div>
                            <div class="col-5">
                              <h5 class="card-text colorP desc">{{__('ui.showDesc')}}</h5>
                              <p class="fs-6 desc">{{$article_to_check->description}}</p>
                              <h5 class="card-text colorP desc">{{__('ui.showPrez')}}</h5>
                              <p class="fs-6 desc">{{$article_to_check->price}} €</p>
                              <h5 class="card-text colorP desc">{{__('ui.showData')}}</h5>
                              <p class="fs-6 desc">{{$article_to_check->created_at->format('d/m/Y')}}</p>
                            </div>
                          </div>  
                          
                        </div>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @if ($article_to_check)
          <div class="d-flex justify-content-center">
            <form action="{{route('revisor.accept_article', ['article'=>$article_to_check])}}" method="POST">
              @csrf
              @method('PATCH')
              <button class="btn bgA btn-lg" type="submit">{{__('ui.revsi')}}</button>
            </form>
            <form action="{{route('revisor.reject_article', ['article'=>$article_to_check])}}" method="POST">
              @csrf
              @method('PATCH')
              <button class="btn bgC btn-lg ms-2 " type="submit">{{__('ui.revno')}}</button>
            </form>
          </div>
          @endif
        </div>
      </div>
    </div>
   
    
  </x-layout>