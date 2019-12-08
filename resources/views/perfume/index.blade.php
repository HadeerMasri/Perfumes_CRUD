<!-- show perfumes from DB
name,price,description,images in datatable using bootstrap
-->
@extends('layouts.app')
@section('cssHeader')
    <link href="{{asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="row" style="margin-left: 150px;margin-top: 40px;margin-right: 150px">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center m-b-10">
                        <a href="{{ url('perfume/create') }}" style="margin-bottom:30px "
                           class="btn btn-sm btn-info">
                            Add New Perfume
                        </a>
                    </div>
                    <div class="table-responsive" >
                        <table id="" class="table table-striped table-bordered display table-hover  perfumes">
                            <thead class="bg-info  text-white">
                            <tr class="title-table">
                                <th>No.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="border border-info">
                            @if($perfumes)
                                @foreach($perfumes as $perfume)
                                    <tr class="field-table">
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $perfume->name }}</td>
                                        <td>{{ $perfume->price }}$</td>
                                        <td>{{$perfume->description}}</td>
                                        <td>
                                            <div class="ml-auto text-muted">
                                                <a href="{{ route('perfume.show',$perfume->id)}}"
                                                   class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('perfume.edit',$perfume->id)}}"
                                                       class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('perfume.destroy',$perfume->id) }}" method="post" class="form-check-inline" >
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-sm btn-danger" type="submit" >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="field-table">
                                    <td colspan="6">No data</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jsFooter')
    <script>
        $(document).ready(function () {
            $('.perfumes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],

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