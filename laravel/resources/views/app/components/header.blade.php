<div class="main-header">
    <nav id="breadcrumb" class="breadcrumb-outer">
        {{ Breadcrumbs::render(Route::currentRouteName()) }}
    </nav>
    <div class="header-title">
        <h1 class="header-title__txt">@yield('title')</h1>
    </div>
</div>
