<script src="/assets/js/parts.js"></script>
<div>
    <div class="page-header">
    <h1>Parts <small>Full catalog</small></h1>
    <div align="center">
        <button id="{title}" type="button" onclick="build()" class="btn btn-success btn-sm" style="width: 200px">Build More Parts</button>
        <button id="{title}" type="button" onclick="buy()" class="btn btn-danger btn-sm" style="width: 200px">Buy More Parts</button>
    </div>
    <div class="row">
        <div class="pull-right">
            <a href="{first}">
                <button class="btn btn-box-tool">
                    <i class="fa fa-step-backward"></i>
                </button>
            </a>
            <a href="{prev}">
                <button class="btn btn-box-tool">
                   <i class="fa fa-arrow-left"></i>
                </button>
            </a>
            <button class="btn btn-box-tool">{page}</button>
            <a href="{next}">
                <button class="btn btn-box-tool">
                    <i class="fa fa-arrow-right"></i>
                </button>
            </a>
            <a href="{last}">
                <button class="btn btn-box-tool">
                    <i class="fa fa-step-forward"></i>
                </button>
            </a>
        </div>
    </div>
    </div>
    <div class="row">
    {parts}
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="box box-success">
            <div class="box-header">
                <h1 class="box-title">{title}</h1>
            </div>
            <div class="box-body">
                <div id="{CA}" class="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active col-xs-12" style="height:200px;">
                            <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <!--
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div> -->
                        </div>
                        <div class="item col-xs-12" style="height:200px;">
                            <table class="table">
                                <tr>
                                    <td>Certificate of Authority </td><td> {CA}</td>
                                </tr>
                                <tr>
                                    <td>Used</td><td> {used}</td>
                                </tr>
                                <tr>
                                    <td>Date of Creation </td><td> {datetime}</td>
                                </tr>
                            </table>
                        </div>
                        <a class="right carousel-control" href="#{CA}" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/parts}
</div>
