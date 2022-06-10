    <!--Begin::Voucher is Banned-->
    @if ($card->trashed())
        <div class="alert alert-danger">
            <strong class="text-white">
                This Voucher is banned.
            </strong>
        </div>
    @else
        <!--Begin::Voucher is Expired-->
        @if ($card->isExpired())
            <div class="alert alert-danger">
                <strong class="text-white">
                    This Voucher is expired.
                </strong>
            </div>
        @else
            <!--Begin::Voucher is not Active-->
            @if (!$card->isActive())
                <div class="alert alert-danger">
                    <strong class="text-white">
                        This Voucher is not Active.
                    </strong>
                </div>
            @endif
            <!--End::Voucher is not Active-->
        @endif
        <!--End::Voucher is Expired-->
    @endif
    <!--End::Voucher is Banned-->
