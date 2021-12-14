<div class="header">
    <div class="header-shop">
        <p class="header-shop__txt">店の名前</p>
    </div>
</div>
<menu class="gb-menu">
    <nav class="summary-menu">
        <ul class="summary-menu__box">
            @foreach ( MenuConsts::SUMMARY_MEYU as $key => $value )
            <li class="summary-menu__item">
                <button id="{{ $value['id'] }}" class="summary-menu__btn" type="button" data-sectionid="{{ $value['sectionId'] }}" role="tab" aria-expanded="false" aria-selected="false">
                    <i class="{{ $value['className'] }}"></i>
                    <p class="summary-menu__txt">{{ $value['name'] }}</p>
                </button>
            </li>
            @endforeach
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <br>{{ __('ログアウト') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            {{-- <li class="summary-menu__item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    <button id="{{ $value['id'] }}" class="summary-menu__btn" type="submit" data-sectionid="{{ $value['sectionId'] }}" role="tab" aria-expanded="false" aria-selected="false">
                        <i class="{{ $value['className'] }}"></i>
                        <p class="summary-menu__txt">{{ $value['name'] }}</p>
                    </button>
                </form>
            </li> --}}
        </ul>
    </nav>
    <div  class="detail-menu">
        @foreach ( MenuConsts::DETAILS_MENU as $key => $array )
        <div id='{{ $key }}' class="detail-menu__section" data-sectionid="{{ $key }}" role="tabpanel" aria-hidden="true">
            <ul class="detail-menu__box">
                @foreach ( $array as $value )
                <li class="detail-menu__item">
                    <button class="detail-menu__btn" type="button" onclick="location.href='{{ $value['url'] }}'" role="tab" aria-expanded="false" aria-selected="false">
                        <p class="detail-menu__txt">{{ $value['name'] }}</p>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</menu>
