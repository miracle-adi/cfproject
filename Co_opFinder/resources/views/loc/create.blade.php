@extends('loc.layout')

@section('content')
{{-- <p>{{ $coop->id }}</p> --}}
<form method="post" action="{{ route('loc.store') }}" class="py-5">
    @csrf
    {{-- <p>{{ $coop->id }}</p> --}}
    <div class="form-group">
        <label for="address_address">Address</label>
        <input type="text" id="address-input" name="locationField" class="form-control map-input">
        <input type="hidden" name="coop_id" id="coop-id" value="1"/>
        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
    </div>
    <div id="address-map-container" style="width:100%;height:400px; ">
        <div style="width: 100%; height: 100%" id="address-map"></div>
    </div>
    <div class="py-2">
        <input type="submit" value="Confirm Location" class="btn btn-primary">
    </div>
</form>
{{-- Displays the map --}}
@endsection

@section('scripts')
    <script src="/js/mapInput.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
@endsection