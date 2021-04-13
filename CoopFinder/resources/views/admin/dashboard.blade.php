@extends('layouts.master')

@section('title')
			CoopFinder Admin
@endsection()

@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Unverified Cooperatives</h4>
              </div>
              @inject('coops', 'App\Coop')
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Reference Number</th>
                      <th>Cooperatives Name</th>
                      <th>Date Registered</th>
                      <th> </th>
                    </thead>
                    <tbody>
                    @foreach($coops->where('verified_status','=','0')->get() as $coop)
                      <tr>
                       <td style="text-transform: uppercase;">{{ $coop->coop_ref_num }}</td>
                       <td>{{ $coop->coop_name }}</td>
                       <td> {{ date_format($coop->created_at,"j F Y, g:i a") }}</td>
                       <td><a href="{{ route('coop.show', $coop->id)}}"><i class="fas fa-arrow-right" style="color:#24a0ed;"></i></a></td>
                       </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()

@section('scripts')


@endsection()