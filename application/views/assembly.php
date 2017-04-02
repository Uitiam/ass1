<div class="row">
    <div class="col-xs-12 col-lg-6 sidebar-outer">
        <h4 class="bg-primary">Head Parts</h4>
        <div class="row">
            {heads}
            <div class="col-xs-12 col-md-6 col-lg-4" style="margin-bottom: 20px;">
                <div class="col-xs-12" align="center">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <button id="{src}" type="button" class="useHead btn btn-success btn-md" style="width:100%" title = "{title}">Use</button>
                    </div>
                    <div class="col-xs-12">
                        <button id="{src}" type="button" class="returnPart btn btn-danger btn-md" style="width:100%" title = "{id}">Return</button>
                    </div>
                </div>
            </div>
            {/heads}
        </div>
        <h4 class="bg-primary">Torso Parts</h4>
        <div class="row">
            {torso}
            <div class="col-xs-12 col-md-6 col-lg-4" style="margin-bottom: 20px;">
                <div class="col-xs-12" align="center">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <button id="{src}" type="button" class="useTorso btn btn-success btn-md" style="width:100%" title = "{title}">Use</button>
                    </div>
                    <div class="col-xs-12">
                        <button id="{src}" type="button" class="returnPart btn btn-danger btn-md" style="width:100%" title = "{id}">Return</button>
                    </div>
                </div>
            </div>
            {/torso}
        </div>
        <h4 class="bg-primary">Leg Parts</h4>
        <div class="row">
            {legs}
            <div class="col-xs-12 col-md-6 col-lg-4" style="margin-bottom: 20px;">
                <div class="col-xs-12" align="center">
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <button id="{src}" type="button" class="useLegs btn btn-success btn-md" style="width:100%" title = "{title}">Use</button>
                    </div>
                    <div class="col-xs-12">
                        <button id="{src}" type="button" class="returnPart btn btn-danger btn-md" style="width:100%" title = "{id}">Return</button>
                    </div>
                </div>
            </div>
            {/legs}
        </div>
    </div>


    <!-- Recommended Robot-->
    <div class="container-fluid col-xs-12 col-md-12 col-lg-5">
            {robotHead}
            <div class="thumbnail">
                <img id="botHead" class="img-responsive img-rounded" src="/assets/img/{src}" title="{id}" alt="No Heads"/>
                <div class="caption">
                </div>
            </div>
            {/robotHead}
            {robotTorso}
            <div class="thumbnail">
                <img id="botTorso" class="img-responsive img-rounded" src="/assets/img/{src}" title="{id}" alt="No Torsos"/>
                <div class="caption">
                </div>
            </div>
            {/robotTorso}
            {robotLegs}
            <div class="thumbnail">
                <img id="botLegs" class="img-responsive img-rounded" src="/assets/img/{src}" title="{id}" alt="No Legs"/>
                <div class="caption">
                </div>
            </div>
            {/robotLegs}
            <div align="right">
                <button id="{title}" type="button" class="buildBot btn btn-success btn-md">Build Robot</button>
            </div>
    </div>
</div>
