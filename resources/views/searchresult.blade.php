@extends('base.baseheader')
@section('content')
    <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url(img/img01.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="quick-search">
                        <div class="row">
                            <form role="form">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <label for="bedroom">Keyword</label>
                                        <input type="text" class="form-control" placeholder="Enter keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="bedroom">Bedroom</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- break -->
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control">
                                            <option>On Sale</option>
                                            <option>For Rent</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bathroom">Bathroom</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- break -->
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control">
                                            <option>Villa</option>
                                            <option>Recident</option>
                                            <option>Commercial</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="minprice">Min Price</label>
                                        <select class="form-control">
                                            <option>$4,200</option>
                                            <option>$6,700</option>
                                            <option>$8,150</option>
                                            <option>$11,110</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- break -->
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <label for="maxprice">Max Price</label>
                                        <select class="form-control">
                                            <option>$8,200</option>
                                            <option>$11,700</option>
                                            <option>$14,150</option>
                                            <option>$21,110</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="maxprice">&nbsp;</label>
                                        <input type="submit" name="submit" value="Search Again"
                                               class="btn btn-warning btn-block">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Search</a></li>
                        <li class="active">Your Keyword</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end:header -->

    <!-- begin:content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <!-- begin:article -->
                <div class="col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-title heading-title-alt">
                                <h3>Property meeting the search criteria</h3>
                            </div>
                        </div>
                    </div>
                    <!-- begin:sorting -->
                    <div class="row sort">
                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <a href="search.html" class="btn btn-default"><i class="fa fa-th"></i></a>
                            <a href="search_list.html" class="btn btn-warning"><i class="fa fa-list"></i></a>
                            <span>Show <strong>3</strong> of <strong>30</strong> result.</span>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <form class="form-inline" role="form">
                                <span>Sort by : </span>
                                <div class="form-group">
                                    <label class="sr-only" for="sortby">Sort by : </label>
                                    <select class="form-control">
                                        <option>Most Recent</option>
                                        <option>Price (Low &gt; High)</option>
                                        <option>Price (High &gt; Low)</option>
                                        <option>Most Popular (Low &gt; High)</option>
                                    </select>
                                </div>
                                <span>Show : </span>
                                <div class="form-group">
                                    <label class="sr-only" for="show">Show : </label>
                                    <select class="form-control">
                                        <option>6</option>
                                        <option>10</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end:sorting -->

                    <!-- begin:product -->
                    <div class="row container-realestate">
                        @foreach ($properties as $property)
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="property-container">
                                    <div class="property-content-list">
                                        <div class="property-image-list">
                                            <img src="{{$property->path}}" alt="">
                                            <div class="property-price">
                                                <span>${{$property->price}}<small>/night</small></span>
                                            </div>
                                            <div class="property-features">
                                                <span><i class="fa fa-hdd-o"></i> {{$property->bedroom}} Bed</span>
                                                <span><i class="fa fa-male"></i> {{$property->bathroom}} Bath</span>
                                            </div>
                                        </div>
                                        <div class="property-text">
                                            <h3>{{$property->title}}</a>
                                                <small>{{$property->state}}, {{$property->country}}</small>
                                            </h3>
                                            <p>{{$property->description}}</p>
                                            <form method="POST" action="{{URL::to('bookNow')}}">
                                                @if (\Auth::user())
                                                    <input type="hidden" name="id_property" value="{{$property->id}}">
                                                    <input type="hidden" name="id_user" value="{{\Auth::user()->id}}">
                                                    <label for="ci">Check In</label>
                                                    <input type ="date" class="form-control" name="start_date"/>
                                                    <label for="co">Check Out</label>
                                                    <input type ="date" class="form-control" name="end_date"/>
                                                    <p style="padding-top: 10px;"><button type="submit" class="btn btn-warning">Book Now</button></p>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- break -->
                        @endforeach
                    </div>
                    <!-- end:product -->

                    <!-- begin:pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end:pagination -->
                </div>
                <!-- end:article -->

                <!-- begin:sidebar -->
                <div class="col-md-3 col-md-pull-9 sidebar">
                    <div class="widget widget-sidebar widget-white">
                        <div class="widget-header">
                            <h3>Recent Property</h3>
                        </div>
                        <ul>
                            <li><a href="#">Luxury Villa</a></li>
                            <li><a href="#">Land In Central Park</a></li>
                            <li><a href="#">The Urban Life</a></li>
                            <li><a href="#">Luxury Office</a></li>
                            <li><a href="">Luxury Villa In Rego Park</a></li>
                        </ul>
                    </div>
                    <!-- break -->
                    <div class="widget widget-sidebar widget-white">
                        <div class="widget-header">
                            <h3>Property Type</h3>
                        </div>
                        <ul class="list-check">
                            <li><a href="#">Office</a>&nbsp;(18)</li>
                            <li><a href="#">Office</a>&nbsp;(43)</li>
                            <li><a href="#">Shop</a>&nbsp;(31)</li>
                            <li><a href="#">Villa</a>&nbsp;(52)</li>
                            <li><a href="#">Apartment</a>&nbsp;(8)</li>
                            <li><a href="#">Single Family Home</a>&nbsp;(11)</li>
                        </ul>
                    </div>
                    <!-- break -->
                </div>
                <!-- end:sidebar -->

            </div>
        </div>
    </div>
    <!-- end:content -->
@stop