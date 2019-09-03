<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                               <?php foreach($mrn as $v) {?>
                                    <div class="huge"><?php echo $v->totalRecords; ?></div>
                                    <div>MRN</div>
                               <?php } ?>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . 'mrn' ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>                               
                                <div class="col-xs-9 text-right">
                                <?php foreach($issue as $v) {?>
                                    <div class="huge"><?php echo $v->totalRecords; ?></div>
                                    <div>Issue</div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . 'issue' ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php foreach($return as $v) {?>
                                    <div class="huge"><?php echo $v->totalRecords; ?></div>
                                    <div>Return</div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . 'return_slip' ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php foreach($items as $v) {?>
                                    <div class="huge"><?php echo $v->totalRecords; ?></div>
                                    <div>Total Created Itmes</div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . 'itemBasket/itemBasketView' ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Stock Summary - 
                            from 
                            <?php                            
                            foreach($finYear as $v)                          
                            { 
                             $startYear=$v->finYearStartDate;
                             $endYear=$v->finYearEndDate;   
                                ?>
                             <?php echo $startYear !='' ? date('m/d/Y',$startYear) : ''; ?>
                           To 
                             <?php echo $endYear != '' ? date('m/d/Y',$endYear): ''; 
                            }
                                ?>                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>ItemCode</th>
                                                    <th>ItemName</th>
                                                    <th>Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i=1;
                                            foreach($stockSummary as $key=>$value){
                                                $stockINQty=$value->StockIN;
                                                $stockQutQty=-$value->StockOUT;
                                                $totalStock=$stockINQty-$stockQutQty;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value->ItemCode; ?></td>
                                                    <td><?php echo $value->itemName; ?></td>
                                                    <td><?php echo $totalStock; ?></td>
                                                </tr>
                                            <?php $i++; } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                
            </div>
            <!-- /.row -->

            