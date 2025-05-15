<div class="card-header d-flex align-items-center py-0">
    <h5 class="py-3 mb-0">{{$subtitle}}</h5>
    <div class="ms-auto my-auto">
        <a href="#" class="btn btn-primary"> <i class="ph-plus-circle me-1"></i> {{ $new }}</a>
    </div>
</div>

<div class="nav-tabs-responsive">
    <ul class="nav nav-tabs nav-tabs-underline flex-nowrap mb-0">
        <li class="nav-item">
            <a href="{{ route('ranks') }}" class="nav-link @if( Request::url() == route('ranks')) active @endif">
                <i class="ph-list me-2"></i>
                Ranks
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('army_units.index') }}" class="nav-link @if( Request::url() == route('army_units.index')) active @endif">
                <i class="ph-users-three me-2"></i>
                Army Units
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('brigades.index') }}" class="nav-link @if( Request::url() == route('brigades.index')) active @endif">
                <i class="ph-calendar me-2"></i>
                Brigades
            </a>
        </li>
    </ul>
</div>