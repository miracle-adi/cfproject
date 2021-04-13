@extends('coops.layout')
@section('title')
    {{ $coop->coop_name }}
@endsection
@section('content')
<style type="text/css">
    #map {
        height: 400px;
        width: 100%;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8"><h1>Cooperatives Information</h1></div>
        <div class="col-md-3"></div>
    </div>
    <div class="row mb-3"> {{-- buttons --}}
    @if (Auth::check())
        @if (Auth::user()->id === $coop->owner_id)
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <a href="{{ route('coop.index') }}" class="btn btn-link">Back to Search Results</a>
            </div>
            <div class="col-md-7 text-right">
                <a href="{{ route('coop.edit',$coop->id) }}" class="btn btn-info" style="display:inline-block;">Edit Coop</a>
                <span class="btn btn-danger" 
                                        onclick="event.preventDefault();
                                        if(confirm('Do you really want to delete?')){
                                            document.getElementById('form-delete-{{ $coop->id }}').submit()
                                        }"/>Delete Coop
                                <form method="post" style="display:none" id="{{ 'form-delete-'.$coop->id }}" 
                                        action="{{ route('coop.destroy',$coop->id) }}">
                                        @csrf 
                                        @method('delete')
                                </form>
            </div>
            <div class="col-md-1"></div>
        @elseif (Auth::user()->userlevel === '1')
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <a href="{{ route('coop.index') }}" class="btn btn-link">Back to Search Results</a>
            </div>
            <div class="col-md-7 text-right">
                <a href="{{ route('coop.edit',$coop->id) }}" class="btn btn-info" style="display:inline-block;">Edit Coop</a>
                <span class="btn btn-danger" 
                                        onclick="event.preventDefault();
                                        if(confirm('Do you really want to delete?')){
                                            document.getElementById('form-delete-{{ $coop->id }}').submit()
                                        }"/>Delete Coop
                                <form method="post" style="display:none" id="{{ 'form-delete-'.$coop->id }}" 
                                        action="{{ route('coop.destroy',$coop->id) }}">
                                        @csrf 
                                        @method('delete')
                                </form>
            </div>
            <div class="col-md-1"></div>
        @endif
    @endif
    </div>
    <div class="row justify-content-center py-2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row items-content">
                        <div class="col-md-9">
                            <b style="text-transform: uppercase;">{{ $coop->coop_name }}</b>
                        </div>
                        <div class="col-md-3 text-right">
                            @if (Auth::check())
                                @if (Auth::user()->id === $coop->owner_id)
                                    @if ($coop->verified_status === 1)
                                        <p class="text-success">Coop Verified</p>
                                    @elseif ($coop->verified_status === 0)
                                        <p class="text-danger">Cooperatives NOT Verified!</p>
                                    @endif
                                @elseif (Auth::user()->userlevel === '1')
                                    @if ($coop->verified_status === 1)
                                        <p class="text-success">Coop Verified</p>
                                    @elseif ($coop->verified_status === 0)
                                        <p class="text-danger">Cooperatives NOT Verified!</p>
                                    @endif  
                                @endif        
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Reference Number</h5>
                        <p class="col-md-4" style="text-transform: uppercase;">{{ $coop->coop_ref_num }}</p>
                        <div class="col-md-4 text-right">
                            @if (Auth::check())
                                @if (Auth::user()->userlevel === '1')
                                    @if ($coop->verified_status === 1)
                                    <form method="post" action="{{ route('coop.update', $coop->id) }}">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="coop_name"  value="{{ $coop->coop_name }}">
                                        <input type="hidden" name="coop_ref_num"  value="{{ $coop->coop_ref_num }}">
                                        <input type="hidden" name="coop_address" id="" value="{{ $coop->coop_address }}"">
                                        <input type="hidden" name="coop_city"  value="{{ $coop->coop_city }}">
                                        <input type="hidden" name="coop_postcode"  value="{{ $coop->coop_postcode }}">
                                        <input type="hidden" name="coop_state"  value="{{ $coop->coop_state }}">
                                        <input type="hidden" name="coop_telephone"  value="{{ $coop->coop_telephone }}">
                                        <input type="hidden" name="email"  value="{{ $coop->email }}">
                                        <input type="hidden" name="business_type" value="{{ $coop->business_type }}">
                                        <input type="hidden" name="verified_status" id="verified_status" value="0" >
                                        <button type="submit" class="btn btn-danger">Reject Coop</button>
                                    </form>
                                    @elseif($coop->verified_status === 0)
                                    <form method="post" action="{{ route('coop.update', $coop->id) }}">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="coop_name"  value="{{ $coop->coop_name }}">
                                        <input type="hidden" name="coop_ref_num"  value="{{ $coop->coop_ref_num }}">
                                        <input type="hidden" name="coop_address" id="" value="{{ $coop->coop_address }}"">
                                        <input type="hidden" name="coop_city"  value="{{ $coop->coop_city }}">
                                        <input type="hidden" name="coop_postcode"  value="{{ $coop->coop_postcode }}">
                                        <input type="hidden" name="coop_state"  value="{{ $coop->coop_state }}">
                                        <input type="hidden" name="coop_telephone"  value="{{ $coop->coop_telephone }}">
                                        <input type="hidden" name="email"  value="{{ $coop->email }}">
                                        <input type="hidden" name="business_type" value="{{ $coop->business_type }}">
                                        <input type="hidden" name="verified_status" id="verified_status" value="1" >
                                        <button type="submit" class="btn btn-danger">Verify Coop</button>
                                    </form>
                                    @endif
                                @endif    
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Address</h5>
                        <p class="col-md-8">{{ $coop->coop_address }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">City</h5>
                        <p class="col-md-8">{{ $coop->coop_city }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Postal Code</h5>
                        <p class="col-md-8">{{ $coop->coop_postcode }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">State</h5>
                        <p class="col-md-8">{{ $coop->coop_state }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Telephone</h5>
                        <p class="col-md-8">{{ $coop->coop_telephone }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Fax</h5>
                        <p class="col-md-8">{{ $coop->coop_fax }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Email</h5>
                        <p class="col-md-8">{{ $coop->email }}</p>
                    </div>
                    <div class="row">
                        <h5 class="col-md-4 pl-5">Business Type</h5>
                        <p class="col-md-8">{{ $coop->business_type }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
        <div class="row justify-content-center py-2">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="card">
                    <div class="card-header">
                        Location 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($coop->address_latitude)
                                    @if ($coop->address_longitude)
                                        <div id="map">
                                            
                                        </div>
                                    @endif
                                @else
                                    <p class="text-danger">Location has NOT been Set!</p>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row justfiy-content center py-2">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Comments
                    </div>
                    <div class="card-body">
                        <div  class="pb-3">
                            <table>
                                @foreach ($coop->comments as $comment)
                                    @foreach ($users as $user)
                                        <tr>
                                            @if ($user->id === $comment->commenter_id)
                                                <td class="h4">{{ $user->name }}</td>
                                                <td><p class="text-muted"><small>{{ date_format($comment->created_at,"j F Y, g:i a") }}</small></p></td>
                                                <td>
                                                    @if(Auth::check())
                                                        @if ($comment->commenter_id === Auth::user()->id)
                                                                <form method="post" action="{{ route('cmt.destroy',$comment->id) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="form-group">
                                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                                    </div>
                                                                </form>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"><p>{{ $comment->comment_text }}</p></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="row ml-3">
                            <div class="col-md-12 ">
                                @if(Auth::check())                        
                                    <form method="POST" action="{{ route('cmt.store') }}" onsubmit="check()">
                                        @csrf
                                            <input type="text" name="coop_id" value="{{ $coop->id }}" hidden/>
                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden/>
                                            <label for="comment_text" class="h4">Post a Comment</label>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <textarea name="comment_text" class="form-control" id="comment_text" cols="30" rows="3"></textarea>
                                                <div class="form-group py-4">
                                                    <input type="submit" value="Add comment" class="btn btn-primary">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>
        
        
</div> 
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly" defer></script>
    <script>
        function initMap() {
            var coop = {
                lat: {{ $coop->address_latitude }},
                lng: {{ $coop->address_longitude }}
            };
            var map = new google.maps.Map(document.getElementById("map"),{
                zoom: 18,
                center: coop,
            });
            // Marker on Map
            var marker = new google.maps.Marker({
                position: coop,
                map: map,
            });
        }
    </script>
@endsection

