<div id="heading" >
	<h1> Search </h1>
</div>
<section id="main">
        <div class="inner">
            <div class="content">

            <form method="POST" action="index.php?mod=search&sub=search">
            <!-- Elements -->
                <h3> Food </h3>
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="searchvalue" id="queryStr" placeholder="Enter your destination or any food you would like" />
                    </div>
                </div>
                <br/>
                <h3> Budget </h3>
                <div class="row">
                    <div class="col-6">
                        <h5> Minimum </h5>
                        <input type="number" name="minrate" id="min_budget" min="1" value="1" placeholder="Enter Minimum Budget Amount" />
                    </div>
                    <div class="col-6">
                        <h5> Maximum </h5>
                        <input type="number" name="maxrate" id="max_budget" min="1" value="1000" placeholder="Enter Maximum Budget Account" />
                    </div>
                </div>
                <br/>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="submit" class="button primary icon fa-search" id="search" style="width:100%;"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
</section>
<script src="modules/client/search/search.js"></script>

<?php

$sub = (isset($_GET['sub']) && $_GET['sub'] != '') ? $_GET['sub'] : '';

switch($sub){
                case 'search':
                    require_once 'modules/client/search/searchresult.php';
                break;
                default: 
                    echo '';
                break;

            }
