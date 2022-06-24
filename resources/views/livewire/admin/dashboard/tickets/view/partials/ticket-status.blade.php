    <!--Begin::Ticket is Banned-->
    @if ($card->trashed())
        <div class="alert alert-danger">
            <strong class="text-white">
                This Ticket is banned.
            </strong>
        </div>
    @else
        <!--Begin::Ticket is Expired-->
        @if ($card->isExpired())
            <div class="alert alert-danger">
                <strong class="text-white">
                    This Ticket is expired.
                </strong>
            </div>
        @else
            <!--Begin::Ticket is not Active-->
            @if (!$card->isActive())
                <div class="alert alert-danger">
                    <strong class="text-white">
                        This Ticket is not Active.
                    </strong>
                </div>
            @else
                <!--Begin::Ticket is Active-->
                @if ($card->isRedeemed())
                    <div class="alert alert-danger">
                        <strong class="text-white">
                            This Ticket is Redeemed.
                        </strong>
                    </div>
                @else
                    <div class="alert alert-success">
                        <strong class="text-white">
                            This Ticket is Active.
                        </strong>
                    </div>
                @endif
            @endif
            <!--End::Ticket is Active-->
        @endif
        <!--End::Ticket is Expired-->
    @endif
    <!--End::Ticket is Banned-->
