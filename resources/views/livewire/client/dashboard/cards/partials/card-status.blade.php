    <!--Begin::Card is Banned-->
    @if ($card->trashed())
        <div class="alert alert-danger">
            <strong class="text-white">
                This Card is banned.
            </strong>
        </div>
    @else
        <!--Begin::Card is Expired-->
        @if ($card->isExpired())
            <div class="alert alert-danger">
                <strong class="text-white">
                    This Card is expired.
                </strong>
            </div>
        @else
            <!--Begin::Card is not Active-->
            @if (!$card->isActive())
                <div class="alert alert-danger">
                    <strong class="text-white">
                        This Card is not Active.
                    </strong>
                </div>
            @endif
            <!--End::Card is not Active-->
        @endif
        <!--End::Card is Expired-->
    @endif
    <!--End::Card is Banned-->
