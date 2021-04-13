@extends('coops.layout')
@section('title')
    Edit Coop
@endsection
@section('content')


<div class="container">
    <div class="border-b flex justify-center p-4">
        <h1 class="text 2xl pb-2">Edit Cooperatives information</h1>
    </div>
    <div class="p-3 border justify-between">
        <form method="post" action="{{ route('coop.update', $coop->id) }}" class="py-5">
            @csrf
            @method('patch')
            <div class="form-group">
                <h4>Coop Name: </h4>
                <input type="text" name="coop_name" class="form-control" value="{{ $coop->coop_name }}">
            </div>
            <div class="form-group">
                <h4>Reference Number: </h4>
                <input type="text" name="coop_ref_num" class="form-control" value="{{ $coop->coop_ref_num }}">
            </div>
            <div class="form-group">
                <h4>Address: </h4>
                <textarea name="coop_address" id="" class="form-control" cols="30" rows="3">{{ $coop->coop_address }}</textarea>
            </div>
            <div class="form-group">
                <h4>City: </h4>
                <input type="text" name="coop_city" class="form-control" value="{{ $coop->coop_city }}">
            </div>
            <div class="form-group">
                <h4>Postal Code: </h4>
               
                <input type="text" name="coop_postcode" class="form-control" value="{{ $coop->coop_postcode }}">
            </div>
           
            <div class="form-group">
                <label for="formGroupExampleInput2">State:</label>
                <select class="custom-select custom-select mb-3" name="coop_state" placeholder="">
                    <option selected>{{ $coop->coop_state }} </option>
                    <option value="Johor">Johor</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Malacca">Malacca</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Penang">Penang</option>
                    <option value="Perak">Perak</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Terengganu">Terangganu</option>
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan">Labuan</option>
                    <option value="Putrajaya">Putrajaya</option>                                    
                  </select>
              </div>
            <div class="form-group">
                <h4>Telephone: </h4>
                
                <input type="text" name="coop_telephone" class="form-control" value="{{ $coop->coop_telephone }}">
            </div>
            <div class="form-group">
                <h4>Fax: </h4>
                
                <input type="text" name="coop_fax" class="form-control" value="{{ $coop->coop_fax }}">
            </div>
            <div class="form-group">
                <h4>Email: </h4>
                <input type="text" name="email" class="form-control" value="{{ $coop->email }}">
            </div>
            
            <div class="form-group">
                <label for="formGroupExampleInput2" class="h4">Business Type:</label>
                <select class="custom-select custom-select mb-3" name="business_type">
                    <option selected>{{ $coop->business_type }}</option>
                    <option value="Banking">Banking</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Consumer">Consumer</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Higher Education">Higher Education</option>
                    <option value="Fisheries">Fisheries</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Insurance">Insurance</option>
                    <option value="Housing">Housing</option>
                    <option value="Enterprising">Enterprising</option>
                    <option value="Education">Education</option>
                    <option value="Women's Wellness">Women's Wellness</option>
                  </select>
              </div>
            
            <div class="form-group">
                <label for="address_address" class="h4">Location of Coop</label>
                    <input type="text" id="address-input" name="address_address"
                     class="form-control map-input" placeholder="Search for Coop Location" value="{{ $coop->address_address }}">
                    <input type="hidden" name="address_latitude" id="address-latitude" value="{{ $coop->address_latitude }}" />
                    <input type="hidden" name="address_longitude" id="address-longitude" value="{{ $coop->address_longitude }}" />
              </div>
              <div id="address-map-container" style="width:100%;height:400px;">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
              </div>
              <div class="p-3">
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{ route('coop.show', $coop->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
    </form>
    </div>
</div>

@endsection
@section('scripts')
    <script src="/js/mapInput.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
@endsection