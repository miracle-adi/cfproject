@extends('usr.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="div-body">
                        <div class="card-header">{{ __('Edit Profile') }}</div>

                        <form method="POST" action="{{ route('usr.update',$usr->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group row pt-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                    name="name" value="{{ $usr->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ $usr->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
    
                                {{-- <div class="form-group row">
                                    <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label> --}}
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="dob" name="birth_date"
                                          value="{{ $usr->birth_date }}"
                                          min="{{ 1960-01-01 }}" max="2021-12-31">
                                      </div>
                                </div>
                            </div>
                            @if ($usr->gender === 'Male')
                                <div class="form-group row align-items-center">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                    <div class="col-md-6">
                                        <label for="female" class="">Male</label>
                                        <input id="gender" type="radio"  name="gender" value="Male" checked autofocus>
                                        <label for="female" class="">Female</label>
                                        <input id="gender" type="radio" name="gender" value="Female" autofocus>
                                    </div>
                                </div>
                            @elseif ($usr->gender === 'Female' )
                                <div class="form-group row align-items-center">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                    <div class="col-md-6">
                                        <label for="female" class="">Male</label>
                                        <input id="gender" type="radio"  name="gender" value="Male" autofocus>
                                        <label for="female" class="">Female</label>
                                        <input id="gender" type="radio" name="gender" value="Female" checked autofocus>
                                    </div>
                                </div>
                            @endif
            
                            <div class="form-group row">
                                <label for="user_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="user_address" name="user_address" class="form-control 
                                    @error('user_address') is-invalid @enderror"  cols="30" rows="4">{{ $usr->user_address }}</textarea>

                                    @error('user_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }} (Choose One)</label>
                                <div class="col-md-6">
                                    {{-- <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}"autofocus> --}}
                                    <select id="state" class="form-control custom-select mb-3" name="state">
                                        <option selected>{{ $usr->state }} </option>
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
                            </div>
                            <div class="form-group row mb-0 py-3">
                                <div class="col-md-12 text-center ">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    <a href="{{ route('usr.show',$usr->id) }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- {{ $coop->coop_name }} --}}