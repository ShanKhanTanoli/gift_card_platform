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
            @else
            <!--Begin::Voucher is Active-->
            @if($card->isRedeemed())
            <div class="alert alert-danger">
                <strong class="text-white">
                    This Voucher is Redeemed.
                </strong>
            </div>
            @else
            <div class="alert alert-success">
                <strong class="text-white">
                    This Voucher is Active.
                </strong>
            </div>
            @endif
            @endif
            <!--End::Voucher is Active-->
        @endif
        <!--End::Voucher is Expired-->
    @endif
    <!--End::Voucher is Banned-->
