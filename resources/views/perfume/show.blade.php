@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12" style="padding-left: 250px;margin-top: 40px;margin-right: 250px">
            <div class="row draggable-cards" id="draggable-area" style="padding-right: 100px;">
                <div class="col-md-12 col-sm-12">
                    <div class="card  card-hover">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Details of Perfume {{$perfume->name}}</h4></div>
                        <div class="card-body">
                            Price : {{$perfume->price}} $
                            <hr>
                            Description : {{$perfume->description}}
                            <hr>
                            Gallery :
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" align="center">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="clearfix"></div>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                    @foreach($perfume->images as $image)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img src="{{asset('storage/'.$image->path)}}" alt="perfume image">
                                        </div>
                                     @endforeach
                                <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection

