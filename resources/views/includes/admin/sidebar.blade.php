<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header mt-2 fs-6">ADMIN PANEL</li>
            <li class="nav-item mt-4">
                <a href="{{route('admin.statistic.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'statistic') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABa0lEQVRIie3VPUtcQRTG8aNoBAubgBIQLPwGFhaCYCz8AJIi3RaCFiJpJIUQCKSwtrS1ClbaCJYidrENggpamGBlG1+yvxQ7CUHXu+NdV0H2gWFgzjznfw5zuSeipPAFn8v6u8oaI6K/CW90YLWkdzztu2XBSoKbUudzQNvgFwU+i4jFiNi/E5Gn79hENfP+X80lxuTtQA64ioGUYCMTeI1FvMI41h8KvsB0StCLAWw38PxIsEHs3XepCLyPYYzgUK3zlVTEB1zW8ezgDSbws6i6euCvqeIezOPXrfgehjCKo3RWxTK68Qk3RdD7wG/Te84W+C7wDn1YwBReY6sRsAj8Te3DOMvwf0xFduMkFwrNDonziJiJiLGIWHqIsT2d2uCWqSvqTY48DaX99JFqyRPWsPbU0Pdqv8XfqDwVtIIrHKd11XJ46vQywVfT+nfWKmjl/+7UBsNUvdhjQht21ZLOcZCTMHV+kJPzDwU9utpPPzPsAAAAAElFTkSuQmCC">
                    <p>Статистика</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.galleries.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'galleries') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/slide-layout.png"/>
                    <p>Баннера/Слайдеры</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.films.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'films') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/movie--v1.png"/>
                    <p>Фильмы</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.cinemas.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'cinemas') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/movie-theater.png"/>
                    <p>Кинотеатры</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.news.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'news') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/news.png"/>
                    <p>Новости</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.special_offers.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'special_offers') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/discount--v1.png"/>
                    <p>Акции</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.pages.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'pages') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/continuous-mode.png"/>
                    <p>Страницы</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'users') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios-filled/30/ffffff/user-group-man-man.png"/>
                    <p>Пользователи</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.mailing_lists.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'mailing_lists') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/mailing.png"/>
                    <p>Рассылки</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.cities.index')}}" class="nav-link w-100 {{strpos($_SERVER['REQUEST_URI'], 'cities') !== false ? 'active' : ''}}">
                    <img class="pr-4" src="https://img.icons8.com/ios/30/ffffff/downtown.png"/>
                    <p>Города</p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

