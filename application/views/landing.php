<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>

<div class="page-header">
    <h1 id="userAddress">Welcome, User!</h1>
    <br />
    <h3>Dashboard</h3>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-grey"><i class="fa fa-gear iconCenter"></i>
                    </span>
                    <div class="info-box-content boxcenter">
                    <span class="info-box-text"><br />Number of Parts</span>
                    <span class="info-box-number boxcenter">{numparts}</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-android iconCenter"></i>
                    </span>
                    <div class="info-box-content boxcenter">
                    <span class="info-box-text"><br />Assembled Robots</span>
                    <span class="info-box-number boxcenter">{numbots}</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-dollar iconCenter"></i>
                    </span>
                    <div class="info-box-content boxcenter">
                    <span class="info-box-text"><br />Total Spent</span>
                    <span class="info-box-number boxcenter">${spent}</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-dollar iconCenter"></i>
                    </span>
                    <div class="info-box-content boxcenter">
                    <span class="info-box-text"><br />Total Earned</span>
                    <span class="info-box-number boxcenter">${earned}</span>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="col-xs-12">
            <div class="col-xs-12 col-md-6">
                <div class="box boxcenter">
                <div class="thumbnail">
                        <canvas id="salesChart" width: "100%" height="100%">If you see this message, your browser does not support HTML5 canvas. Please switch to a browser that does support HTML5 canvas for full viewing pleasure.
                        </canvas>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="box boxcenter">
                    <div class="thumbnail">
                        <canvas id="partsChart">If you see this message, your browser does not support HTML5 canvas. Please switch to a browser that does support HTML5 canvas for full viewing pleasure.
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>