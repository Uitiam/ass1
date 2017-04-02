<div>
    <div class="page-header">
    <h1>History <small>{limiter}</small></h1>
    </div>
    <div class="box box-success">
        <div class="box-header with-border">
        <h2 class="box-title">{listing}</h2>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool">
                <a href="{first}"><i class="fa fa-step-backward"></i></a>
            </button>
            <button class="btn btn-box-tool">
                <a href="{prev}"><i class="fa fa-arrow-left"></i></a>
            </button>
            <button class="btn btn-box-tool">{page}</button>
            <button class="btn btn-box-tool">
                <a href="{next}"<i class="fa fa-arrow-right"></i></a>
            </button>
            <button class="btn btn-box-tool">
                <a href="{last}"><i class="fa fa-step-forward"></i></a>
            </button>

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
            <td class="col-xs-2"><p>{part}</p></td>
            <td class="col-xs-2"><p>${sale}</p></td>
            <td class="col-xs-4"><p>{datetime}</p></td>
            </tr>
        {/history}
        </table>
        </div>
    </div>
</div>
