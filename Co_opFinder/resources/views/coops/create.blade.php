@extends('coops.layout')

@section('title')
    Add Coop
@endsection

@section('content')
    <style>
      .required:after {
        content:" *";
        color: red;
      }
    </style>
    <div class="container">
      <div>
        <h1 class="text-2xl pt-5">Cooperatives Registration</h1>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="post" action="{{ route('coop.store') }}" class="pb-3">
            @csrf
             <div class="form-group">
                <label for="" class="required">Cooperatives Name</label>
                <input type="text" class="form-control" col id="" name="coop_name">
              </div>
                <div class="form-group">
                <label for="" class="required">Reference Number</label>
                <input type="text" class="form-control" id="" name="coop_ref_num">
              </div>
             <div class="form-group">
                <label for="" class="required">Date of Establishment</label>
                <input type="date" class="form-control" id="" name="est_date"
                  value="2010-01-01"
                  min="1950-01-01" max="2020-12-31">
              </div>
              <div class="form-group">
                <label for="" class="required">Address</label>
                <textarea class="form-control" id="" rows="3" name="coop_address"></textarea>
              </div>
              <div class="form-group">
                <label for="" class="required">City</label>
                <input type="text" class="form-control" id="" name="coop_city">
              </div>
              <div class="form-group">
                <label for="" class="required">Postal Code</label>
                <input type="text" class="form-control" id="" name="coop_postcode">
              </div>
              <div class="form-group">
                <label for="" class="required">State</label>
                <select class="custom-select custom-select mb-3" name="coop_state">
                  <option selected>Choose One</option>
                  <option value="Johor">Johor</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Malacca">Malacca</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Penang">Pulau Penang</option>
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
                <label for="" class="required">Telephone</label>
                <input type="text" class="form-control" id="" name="coop_telephone">
              </div>
              <div class="form-group">
                <label for="">Fax</label>
                <input type="text" class="form-control" id="" name="coop_fax">
              </div>
              <div class="form-group">
                <label for="" class="required">Email</label>
                <input type="text" class="form-control" id="" name="email">
              </div>
              <div class="form-group">
                <label for="" class="required">Business Type</label>
                <select class="custom-select custom-select mb-3" name="business_type">
                    <option selected>Choose One</option>
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
                <label for="address_address">Location of Coop</label>
                    <input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="Search for Coop Location">
                    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
              </div>
              
              <div id="address-map-container" style="width:100%;height:400px;">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
              </div>
              <div class="form-group my-3">
                  <input type="submit" value="Submit" class="btn btn-primary">
                  <a href="{{ route('coop.index') }}" class="btn btn-secondary">Cancel</a>
              </div>  
          </form>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/mapInput.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" defer></script>
@endsection