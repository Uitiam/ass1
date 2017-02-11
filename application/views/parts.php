<div>
    <div class="page-header">
    <h1>Parts <small>Full catalog</small></h1>
    </div>
    <div class="row">
    {parts}
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="box box-success collapsed-box">
            <div class="box-header">
                <h1 class="box-title">{title}</h1>
                <hr/>
                <div>
                    <img class="img-responsive img-rounded" src="/assets/img/{src}" title="{title}"/>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>UID </td><td> {UID}</td>
                    </tr><tr>
                        <td>Certificate of Authority </td><td> {CA}</td>
                    </tr><tr>
                        <td>Origin Plant </td><td> {PlantCode}</td>
                    </tr><tr>
                        <td>Date of Creation </td><td> {datetime}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    {/parts}
    </div>
</div>
