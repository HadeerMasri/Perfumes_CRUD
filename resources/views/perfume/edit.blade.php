@extends('layouts.app')
@section('cssHeader')

@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row draggable-cards" id="draggable-area" style="padding-left: 350px;margin-top: 40px;">
                <div class="col-md-8 col-sm-8">
                    <div class="card  card-hover">
                        <div class="card-header bg-info">
                            <h2 class="m-b-0 text-white">Update of Perfume</h2></div>
                        <div class="card-body">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('jsFooter')
    <script>
        $(document).ready(function () {
            $('.chalets').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json",
                }
            });

        });
    </script>

    <script src="{{asset('assets/extra-libs/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>




@endsection