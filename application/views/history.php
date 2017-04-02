<div>
    <div class="page-header">
    <h1>History <small>{limiter}</small></h1>
    </div>
    <div class="box box-success">
        <div class="box-header with-border">
        <h2 class="box-title">{listing}</h2>
        <div class="box-tools pull-right">
            Sort Type:
            <a href="n">
                <button class="btn btn-box-tool">
                    Part Type
                </button>
            </a>
            <a href="a">
                <button class="btn btn-box-tool">
                    Action Type
                </button>
            </a>
            <a href="d">
                <button class="btn btn-box-tool">
                    Date
                </button>
            </a>
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
