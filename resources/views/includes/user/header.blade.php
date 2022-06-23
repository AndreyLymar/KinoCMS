
    <header class="p-3 bg-dark text-white">
        <div class="container w-100">
            <div class="d-flex flex-wrap ">
{{--                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">--}}
{{--                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>--}}
{{--                </a>--}}

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('user.main.index')}}" class="nav-link px-2 {{strpos($_SERVER['REQUEST_URI'], '/main') !== false ? 'text-secondary' : 'text-white'}}">Главная</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Афиша</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Расписание</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Скоро</a></li>
                    <li><a href="{{route('user.cinemas.index')}}" class="nav-link px-2 {{strpos($_SERVER['REQUEST_URI'], '/cinemas') !== false ? 'text-secondary' : 'text-white'}} text-white">Кинотеатры</a></li>
                    <li><a href="{{route('user.special_offers.index')}}" class="nav-link px-2 {{strpos($_SERVER['REQUEST_URI'], '/special_offers') !== false ? 'text-secondary' : 'text-white'}} text-white">Акции</a></li>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 navbar-nav">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" {{strpos($_SERVER['REQUEST_URI'], '/pages') !== false ? 'text-secondary' : 'text-white'}}>О кинотеатре</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user.news.index')}}">Новости</a>
                                @foreach($pages as $page)
                                        <a class="dropdown-item" href="{{route('user.pages.show',$page->id)}}">{{$page->title}}</a>
                                    @endforeach
                                </div>
                            </li>
                    </ul>

                </ul>
                <ul class="nav col-12 col-lg-auto me-lg-5 mb-2 justify-content-center mb-md-0">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a class="nav-link px-2 text-white" href="{{ route('login') }}">Войти</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="nav-link px-2 text-white" href="{{ route('register') }}">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('user.personal_accounts.index')}}">Личный кабинет</a>

                            @can('view',auth()->user())
                                    <a class="dropdown-item" href="{{ route('admin.statistic.index') }}">Админка</a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-white bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 navbar-nav">
                        <li class="">
                            <div class="tel  text-white">{{$homepage->phone1 ?? ''}}</div>
                            <div class="tel text-white">{{$homepage->phone2 ?? ''}}</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>






