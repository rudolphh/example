@extends('app')

@include('measure.scripts.index')


@section('main')

{{-- <div class="table-responsive"> --}}
<table id="measurements-table" class="table table-striped table-bordered " 
        cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Weight</th>
                <th>Neck</th>
                <th>Waist</th>
                @if($user->gender == 'female')
                    <th>Hip</th>
                @endif
                <th>BF%</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($measurements as $measure)
            <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}

                <td><span data-editable>{{ (float)$measure->weight }}</span></td>
                <td><span data-editable>{{ (float)$measure->neck }}</span></td>
                <td><span data-editable>{{ (float)$measure->waist }}</span></td>
                @if($user->gender == 'female')
                    <td>{{ (float)$measure->hip }}</td>
                @endif

                <td>{{ 0 }}</td>

                <td>
        <a href="{{ route('measurements.show', ['id' => $measure->id ]) }}" >
           <!-- {{ $measure->created_at->format('m/d/Y - h:i A') }} -->
            {{ $measure->created_at->format('m/d/Y') }}
        </a>

        <!--
        <span style="display: block;">
        <a class="btn btn-xs" type="button" data-title="Edit" 
                href="{{ route('measurements.edit', ['id' => $measure->id ]) }}" >
            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
        </a>
        
        <a class="btn btn-xs delete" type="button" data-title="Edit" 
                data-id="{{ $measure->id }}"
                data-href="{{ route('measurements.destroy', ['id' => $measure->id ]) }}" >
            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
        </a></span> -->
                </td>


{{--     <td><p data-placement="top" data-toggle="tooltip" title="Edit">
        <a class="btn btn-xs" type="button" data-title="Edit" 
                href="{{ route('measurements.edit', ['id' => $measure->id ]) }}" >
            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
        </a>
        </p>
    </td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit">
        <a class="btn btn-xs delete" type="button" data-title="Edit" 
                data-id="{{ $measure->id }}"
                data-href="{{ route('measurements.destroy', ['id' => $measure->id ]) }}" >
            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
        </a>
        </p>
    </td> --}}
            </tr>
        @endforeach   
        </tbody>
    </table>

{{-- </div>
 --}}



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove" aria-hidden="true"></i></button>
        <h4 class="modal-title custom_align" id="Heading">Delete Measurement</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-info alert-important"><i class="fa fa-exclamation-triangle fa-2x"></i> Are You Sure?</div>
       
      </div>
    
    <div class="modal-footer ">

        {{-- <button id="confirm-delete" type="button" class="btn btn-success">
            <i class="fa fa-check "></i>&nbsp;Yes</button> --}}
            
        </form>
        {!! Form::open([
            'id' => 'confirm-delete',
            'method' => 'DELETE',
            'route' => ['measurements.destroy', $measure->id]
        ]) !!}
        {{Form::button('<i class="fa fa-check">&nbsp;Yes</i>', 
                    array('type' => 'submit', 'class' => 'btn btn-default'))}}

            <button type="button" class="btn btn-primary" data-dismiss="modal">
            <i class="fa fa-remove "></i>&nbsp;No&nbsp;</button>
            {{-- {!! Form::submit('Delete?', ['class' => 'btn btn-danger']) !!} --}}

        {!! Form::close() !!}
       


    </div>
    </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>



@stop


