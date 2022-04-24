<div class="row">
    <div class="col-12">
        <!--Begin::Tab Menu-->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Admin/EditBusiness/' . $user->slug) active @endif" aria-current="page"
                    href="{{ route('AdminEditBusiness', $user->slug) }}">
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Admin/UpdateBusiness/' . $user->slug . '/Password') active @endif"
                    href="{{ route('AdminUpdateBusinessPassword', $user->slug) }}">
                    Password
                </a>
            </li>
        </ul>
        <!--End::Tab Menu-->
    </div>
</div>
