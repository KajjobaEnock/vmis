<div class="card-header d-flex align-items-center py-0">
    <h5 class="py-3 mb-0">{{$subtitle}}</h5>
    <div class="ms-auto my-auto">
        <a href="{{ route($url) }}" class="btn btn-primary"> <i class="ph-plus-circle me-1"></i> {{ $new }}</a>
    </div>
</div>

<div class="nav-tabs-responsive">
    <ul class="nav nav-tabs nav-tabs-underline flex-nowrap mb-0">
        <li class="nav-item">
            <a href="{{ route('regions.index') }}" class="nav-link @if( Request::url() == route('regions.index')) active @endif">
                <i class="ph-list me-2"></i>
                Regions
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('districts.index') }}" class="nav-link @if( Request::url() == route('districts.index')) active @endif">
                <i class="ph-users-three me-2"></i>
                Districts
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('counties.index') }}" class="nav-link @if( Request::url() == route('counties.index')) active @endif">
                <i class="ph-calendar me-2"></i>
                Counties
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('subcounties.index') }}" class="nav-link @if( Request::url() == route('subcounties.index')) active @endif">
                <i class="ph-calendar me-2"></i>
                Subcounties
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('parishes.index') }}" class="nav-link @if( Request::url() == route('parishes.index')) active @endif">
                <i class="ph-calendar me-2"></i>
                Parishes
            </a>
        </li>
    </ul>
</div>