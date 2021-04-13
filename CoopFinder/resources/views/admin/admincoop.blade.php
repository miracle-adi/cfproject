@extends('layouts.master')

@section('title')
            Coop List
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cooperatives List</h4>
                </div>
                @inject('coops', 'App\Coop')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>Reference Number</th>
                                <th>Cooperatives Name</th>
                                <th>State</th>
                                <th>Category</th>
                                <th> </th>
                            </thead>
                            <tbody>
                                @foreach ($coops->get() as $coop)
                                <tr>
                                    <td style="text-transform: uppercase;">{{ $coop->coop_ref_num }}</td>
                                    <td>{{ $coop->coop_name }}</td>
                                    <td>{{ $coop->coop_state }}</td>
                                    <td>{{ $coop->business_type }}</td>
                                    <td><a href="{{ route('coop.show', $coop->id)}}"><i class="fas fa-arrow-right" style="color:#24a0ed;"></i></a></td>
                                </tr>
                                @endforeach
                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection