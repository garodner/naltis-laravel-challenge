@extends('layout.master')
@section('content')
    <section>
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Model</th>
                <th>Make</th>
                <th>Year</th>
                <th width="15%">Type</th>
                <th width="8%">Likes</th>
                <th width="8%">Upadte</th>
                <th width="8%">Delete</th>
              </tr>
            </thead>
          </table>
        </div>
        @if($all->isempty())
        <div class="row">
            <div class="col-12">
                <div class="empty">there're no results to show</div>
            </div>
        </div>
        @else
        <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                @foreach($all as $one)
                    <tr>
                        <td>{{$one->model}}</td>
                        <td>{{$one->make}}</td>
                        <td>{{$one->year}}</td>
                        <td width="15%">{{$one->type === 'App\Car'||$one->type === 'Car' ? 'Car' : ($one->type == 'App\Truck'||$one->type == 'Truck' ? 'Truck' : 'Vehicle')}}</td>
                        <td width="8%" class="text-center"><a href="{{url('increment/'.$one->id)}}">{{$one->likes}}</a></td>
                        <td width="8%" class="text-center"><a href="{{url('edit/'.$one->id)}}"><i class="fa fa-cog"></i></a></td>
                        <td width="8%" class="text-center"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$one->id}}"><i class="fa fa-remove" style="color:red"></i></button></td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{$one->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$one->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">are you sure you want to remove that one?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('remove',[$one->id])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Yes</button>
                                </form>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </section>
@endsection
