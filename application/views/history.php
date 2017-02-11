<div>
    <div class="page-header">
    <h1>History <small>Listings</small></h1>
    </div>
    <div class="box box-success">
        <div class="box-header with-border">
        <h2 class="box-title">Full listing</h2>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        </div>
        <div class="box-body">
        <!--bootstrap actully wants table elements for this case-->
        <table class="table table-bordered">
        {history}
            <tr>
            <td class="col-xs-1"><p>{type}</p></td>
            <td class="col-xs-3"><p>{data}</p></td>
            <td class="col-xs-2"><p>Cost: {cost}</p></td>
            <td class="col-xs-2"><p>Sold price: {sold}</p></td>
            <td class="col-xs-4"><p>{datetime}</p></td>
            </tr>
        {/history}
        </table>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-header with-border">
        <h2 class="box-title">Shipment listing</h2>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        </div>
        <div class="box-body">
        <!--bootstrap actully wants table elements for this case-->
        <table class="table table-bordered">
        {shipment}
            <tr>
            <td class="col-xs-1"><p>{type}</p></td>
            <td class="col-xs-3"><p>{data}</p></td>
            <td class="col-xs-2"><p>Cost: {cost}</p></td>
            <td class="col-xs-2"><p>Sold price: {sold}</p></td>
            <td class="col-xs-4"><p>{datetime}</p></td>
            </tr>
        {/shipment}
        </table>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-header with-border">
        <h2 class="box-title">Purchase listing</h2>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        </div>
        <div class="box-body">
        <!--bootstrap actully wants table elements for this case-->
        <table class="table table-bordered">
        {purchase}
            <tr>
            <td class="col-xs-1"><p>{type}</p></td>
            <td class="col-xs-3"><p>{data}</p></td>
            <td class="col-xs-2"><p>Cost: {cost}</p></td>
            <td class="col-xs-2"><p>Sold price: {sold}</p></td>
            <td class="col-xs-4"><p>{datetime}</p></td>
            </tr>
        {/purchase}
        </table>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-header with-border">
        <h2 class="box-title">Assembly listing</h2>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        </div>
        <div class="box-body">
        <!--bootstrap actully wants table elements for this case-->
        <table class="table table-bordered">
        {assembly}
            <tr>
            <td class="col-xs-1"><p>{type}</p></td>
            <td class="col-xs-3"><p>{data}</p></td>
            <td class="col-xs-2"><p>Cost: {cost}</p></td>
            <td class="col-xs-2"><p>Sold price: {sold}</p></td>
            <td class="col-xs-4"><p>{datetime}</p></td>
            </tr>
        {/assembly}
        </table>
        </div>
    </div>
</div>
