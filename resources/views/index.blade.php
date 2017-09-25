@extends('base.baseheader')
@section('content')
    <!-- begin:header -->
    <div id="header" class="header-slide">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="quick-search">
                        <div class="row">
                            <form role="form" action="search" method="POST">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" name="country">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country}}">{{$country->country}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bedroom">Bedroom</label>
                                        <select class="form-control" name="bedroom">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- break -->
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <select class="form-control" name="state">
                                            @foreach ($states as $state)
                                                <option value="{{$state->state}}">{{$state->state}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bathroom">Bathroom</label>
                                        <select class="form-control" name="bathroom">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- break -->
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="status">Pets</label>
                                        <select class="form-control" name="pets">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="minprice">Min Price</label>
                                        <select class="form-control" name="minprice">
                                            @foreach ($price as $pricing)
                                                <option value="{{$pricing->price}}">${{$pricing->price}}/night
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- break -->
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control" name="type">
                                            @foreach ($types as $type)
                                                <option value="{{$type->type}}">{{$type->type}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="maxprice">Max Price</label>
                                        <select class="form-control" name="maxprice">
                                            @foreach ($price as $pricing)
                                                <option value="{{$pricing->price}}">${{$pricing->price}}/night
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <input type="submit" name="submit" value="Search"
                                           class="btn btn-warning btn-lg btn-block"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:header -->

    <!-- begin:service -->
    <div id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Best Real Estate Deals
                        <small>You need to do is very simple just join us</small>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-container">
                        <div class="service-icon">
                            <a href="#"><i class="fa fa-home"></i></a>
                        </div>
                        <div class="service-content">
                            <h3>Lorem ipsum dolor sit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt.</p>
                        </div>
                    </div>
                </div>
                <!-- break -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-container">
                        <div class="service-icon">
                            <a href="#"><i class="fa fa-thumbs-up"></i></a>
                        </div>
                        <div class="service-content">
                            <h3>Lorem ipsum dolor sit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt.</p>
                        </div>
                    </div>
                </div>
                <!-- break -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-container">
                        <div class="service-icon">
                            <a href="#"><i class="fa fa-umbrella"></i></a>
                        </div>
                        <div class="service-content">
                            <h3>Lorem ipsum dolor sit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt.</p>
                        </div>
                    </div>
                </div>
                <!-- break -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-container">
                        <div class="service-icon">
                            <a href="#"><i class="fa fa-lock"></i></a>
                        </div>
                        <div class="service-content">
                            <h3>Lorem ipsum dolor sit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:service -->
@stop