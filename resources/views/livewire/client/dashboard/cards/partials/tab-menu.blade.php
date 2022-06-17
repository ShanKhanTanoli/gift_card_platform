<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Client/Card/' . $card->slug . '/More') active bg-gradient-primary @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Card/' . $card->slug . '/More') active text-white @endif"
                    href="{{ route('ClientCardMore', $card->slug) }}">
                    <i class="fas fa-universal-access me-2"></i>
                    <span class="text-sm">Accessibility</span>
                </a>
            </li>
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Client/Card/' . $card->slug . '/Pin') active bg-gradient-primary @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Card/' . $card->slug . '/Pin') active text-white @endif"
                    href="{{ route('ClientCardPin', $card->slug) }}">
                    <i class="fas fa-key me-2"></i>
                    <span class="text-sm">Pin Code</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Client/RechargeCard/' . $card->slug) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/RechargeCard/' . $card->slug) active text-white @else @endif"
                    href="{{ route('ClientRechargeCard', $card->slug) }}">
                    <i class="fas fa-money-bill me-2"></i>
                    <span class="text-sm">Recharge</span>
                </a>
            </li>
        </ul>
    </div>
</div>
