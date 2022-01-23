<div class="header-left">
    <div class="header-shop">
        <p class="header-shop__txt">{{ Restaurant::getName() }}</p>
    </div>
</div>
<div class="header-right">
    <button class="header-user">
        <i class="fas fa-user"></i>
        <p class="header-user__txt">{{ Auth::user()->name }}</p>
    </button>
</div>
