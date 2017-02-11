<div class="row">
    <div class="col-xs-6 sidebar-outer">
        <div class="row">
            {heads}
                <div class="col-xs-3" style="margin-bottom: 20px;">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div align="center">
                        <button id="{title}" type="button" class="btn btn-success btn-sm">Use</button>
                        <button id="{title}" type="button" class="btn btn-danger btn-sm">Scrap</button>
                    </div>
                </div>
            {/heads}
        </div>
        <div class="row">
            {torso}
                <div class="col-xs-3" style="margin-bottom: 20px;">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div align="center">
                        <button id="{title}" type="button" class="btn btn-success btn-sm">Use</button>
                        <button id="{title}" type="button" class="btn btn-danger btn-sm">Scrap</button>
                    </div>
                </div>
            {/torso}
        </div>
        <div class="row">
            {legs}
                <div class="col-xs-3" style="margin-bottom: 20px;" >
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div align="center">
                        <button id="{title}" type="button" class="btn btn-success btn-sm">Use</button>
                        <button id="{title}" type="button" class="btn btn-danger btn-sm">Scrap</button>
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
