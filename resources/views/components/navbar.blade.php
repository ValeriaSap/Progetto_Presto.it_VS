<nav id="navbar" class="navbar navbar-expand-xxl navbar-light bg-light shadow fixed-top py-2 px-3 transition">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/">
            <img src="https://companieslogo.com/img/orig/PRST_BIG.D-3cd298b6.png?t=1687683317" width=100px alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto">
                
                {{-- <li class="nav-item">
                    <a class="nav-link navlink text-white" href="#">
                        <i class="fas fa-envelope" ></i> Contatti
                    </a>
                </li> --}}
                @guest
                <li class="nav-item">
                    <a class="nav-link navlink text-white" href="{{route('register')}}">
                        <i class="fas fa-user-plus"></i> {{__('ui.registrati')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navlink text-white" href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i> {{__('ui.accedi')}}
                    </a>
                </li>
                @endguest
                
                <div class="nav-item dropdown">
                    <a class="nav-link navlink dropdown-toggle text-white text-start" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-hashtag"></i>{{__('ui.categorie')}}
                    </a>
                    
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{__("ui.$category->name")}}</a></li>
                        @endforeach
                    </ul>
                </div>
                
                <li class="nav-item">
                    <a class="nav-link navlink text-white" href="{{route('article_index')}}">
                        <i class="fa-solid fa-inbox"></i> {{__('ui.tuttiArticoli')}}
                    </a>
                </li>
                
                @auth
                <li class="nav-item">
                    <a class="nav-link navlink text-white" href="{{route('article_create')}}">
                        <i class="fa-solid fa-pen-to-square"></i> {{__('ui.aggArticoli')}}
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link navlink active dropdown-toggle fw-bold nav-text-custom position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <i class="fa-solid fa-user"></i> 
                    @if (Auth::user()->is_revisor)
                    @if(App\Models\Article::toBeRevisionedCount() > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <small>{{App\Models\Article::toBeRevisionedCount()}}</small> 
                        <span class="visually-hidden">{{__('ui.messRev')}}</span>
                    </span>
                    @endif
                    @endif
                    {{__('ui.saluto')}} {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a class="colorB" href="{{route('profile')}}"> 
                                <i class="fa-solid fa-circle-user"></i>
                                Profilo
                            </a>
                        </li>
                       
                        <li>
                            @if (Auth::user()->is_revisor)
                            <li class="dropdown-item">
                                <a class="colorB" href="{{route('revisor.index')}}">
                                    <i class="fa-solid fa-id-card fa-lg ">
                                       
                                    </i> {{__('ui.revisorZone')}}
                                </a>
                            </li>
                            @endif
                            
                        </li>
                        <li class="dropdown-item">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="nav-link active" type="submit">{{__('ui.logOut')}}</button>
                            </form>
                        </li>
                    </ul>
                </li> 
                
                
                @endauth
            </ul>
            <span class="d-flex p-0">
                <span class="nav-item p-0"><x-_locale lang="it" /></span>
                <span class="nav-item p-0"><x-_locale lang="en" /></span>
                <span class="nav-item p-0"><x-_locale lang="es" /></span>
            </span>
            
            <form action="{{route('articles.search')}}" method="GET" class="d-flex" role="search">
                <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.cerca')}}" aria-label="Search">
                <button class="btn bgS colorD" type="submit">{{__('ui.cerca')}}</button>
            </form>
            
            
        </div>
    </div>
</nav>