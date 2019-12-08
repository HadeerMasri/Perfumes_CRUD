<!-- edit perfume and update in DB
name,price,description,images
-->

@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row draggable-cards" id="draggable-area" style="padding-left: 350px;margin-top: 40px;">
                <div class="col-md-8 col-sm-8">
                    <div class="card  card-hover">
                        <div class="card-header bg-info">
                            <h2 class="m-b-0 text-white">Update of Perfume</h2></div>
                        <div class="card-body">
                            <!-- Start Form -->
                            <form action="{{ route('perfume.update',$perfume->id) }}" method="post" enctype="multipart/form-data">
                                {{ method_field('put') }}
                                @csrf
                                <div class="form-body" >
                                    <div class="row pt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$perfume->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" >Price($)</label>
                                                <input type="text" class="form-control" value="{{$perfume->price}}" name="price" >
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" >Description</label>
                                                <textarea name="description"   class="form-control" cols="20" rows="7"
                                                          >{{$perfume->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" >Images of Perfume (Max:3)</label>
                                                <input type="file" class="form-control" name="images[]" multiple>
                                            </div>
                                            <div class="text-left" style="margin-top: 90px">
                                                <button type="submit" class="btn btn-info"  >Update of Perfume</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

