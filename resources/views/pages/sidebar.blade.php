     <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php 

                            $allCategory = DB::table('tbl_categories')->where('category_status',1)->get();
                            foreach ($allCategory as  $value) {
                           ?>                           
                     
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ route('product_by_category_id',$value->id) }}">{{$value->category_name}}</a></h4>
                                </div>
                            </div>
                        <?php } ?>
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                            <?php 

                                $allManufacturers = DB::table('tbl_manufacturers')->where('manufacturer_status',1)->get();
                                foreach ($allManufacturers as  $value) {

                           ?> 
                                 <li><a href="{{ route('product_by_manufacturer_id',$value->id) }}"> <span class="pull-right">(50)</span>
                                        {{$value->manufacturer_name}}
                                    </a>
                                </li>
                            <?php } ?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->