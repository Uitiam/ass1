<div class="row">
    <div class="col-xs-6 sidebar-outer">
        <h4 class="bg-primary">Head Parts</h4>
        <div class="row">
            {heads}
                <div class="col-xs-4" style="margin-bottom: 20px;">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div align="center">
                        <button id="{title}" type="button" class="btn btn-success btn-sm" style="width: 90px">Use</button>
                        <button id="{title}" type="button" class="btn btn-danger btn-sm" style="width: 90px">Return</button>
                    </div>
                </div>
            {/heads}
        </div>
        <h4 class="bg-primary">Torso Parts</h4>
        <div class="row">
            {torso}
                <div class="col-xs-4" style="margin-bottom: 20px;">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div align="center">
                        <button id="{title}" type="button" class="btn btn-success btn-sm" style="width: 90px">Use</button>
                        <button id="{title}" type="button" class="btn btn-danger btn-sm" style="width: 90px">Return</button>
                    </div>
                </div>
            {/torso}
        </div>
        <h4 class="bg-primary">Leg Parts</h4>
        <div class="row">
            {legs}
                <div class="col-xs-4" style="margin-bottom: 20px;" >
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div align="center">
                        <button id="{title}" type="button" class="btn btn-success btn-sm" style="width: 90px">Use</button>
                        <button id="{title}" type="button" class="btn btn-danger btn-sm" style="width: 90px">Return</button>
                    </div>
                </div>
            {/legs}
        </div>
    </div>


    <!-- Recommended Robot-->
    <div class="container-fluid col-xs-12 col-md-5 col-lg-5">
            {robotHead}
            <div class="thumbnail">
                <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                <div class="caption">
                </div>
            </div>
            {/robotHead}
            {robotTorso}
            <div class="thumbnail">
                <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                <div class="caption">
                </div>
            </div>
            {/robotTorso}
            {robotLegs}
            <div class="thumbnail">
                <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                <div class="caption">
                </div>
            </div>
            {/robotLegs}
            <div align="right">
                <button id="{title}" type="button" class="btn btn-success btn-md">Build Robot</button>
            </div>
    </div>
</div>
