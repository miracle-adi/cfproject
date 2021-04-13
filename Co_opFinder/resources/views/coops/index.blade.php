@extends('coops.layout')

@section('title')
    Coop Information
@endsection

@section('content')

<div class="container">
    <div class="">
        <h1 class="text-2xl pt-5">Cooperatives Information</h1>
    </div>
    <div class="list-group pt-3">
        @foreach ($coops as $coop)
        @if($coop->verified_status === 1)
        <a class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><b>{{ $coop->coop_name }}</b></h5>
              <button class="btn btn-primary" onclick="window.location.href='{{ route('coop.show', $coop->id) }}'">Read More</button>
            </div>
            <table>
                <tr>
                    <th>State</th>
                    <td class="pl-2">{{ $coop->coop_state }}</td>
                </tr>
                <tr>
                    <th>Reference No.</th>
                    <td class="pl-2" style="text-transform: uppercase;">{{ $coop->coop_ref_num }}</td>
                </tr>
                <tr>
                    <th>Business Type</th>
                    <td class="pl-2">{{ $coop->business_type }}</td>
                </tr>
            </table>
        </a>
        @endif
        @endforeach      
    </div>
</div>

@endsection

