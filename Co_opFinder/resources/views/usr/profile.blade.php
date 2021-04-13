@extends('usr.layout')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container">
        <div class="row mb-3">
            @if(Auth::check())
                @if(Auth::user()->userlevel === '1')
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <a href="{{ url('admin-user') }}" class="btn btn-link"><i class="fas fa-chevron-left"></i> Back to Users List</a>
                    {{-- <a href="{{ url('admin-user') }}"> --}}
                </div>
                <div class="col-md-7 text-right">
                    <a href="{{ route('usr.edit',$usr->id) }}" class="btn btn-primary" style="display:inline-block;">Edit Profile</a>
                    <span class="btn btn-danger" 
                                        onclick="event.preventDefault();
                                        if(confirm('Do you really want to delete?')){
                                            document.getElementById('form-delete-{{ $usr->id }}').submit()
                                        }"/>Delete User
                                <form method="post" style="display:none" id="{{ 'form-delete-'.$usr->id }}" 
                                        action="{{ route('usr.destroy',$usr->id) }}">
                                        @csrf 
                                        @method('delete')
                                </form>
                </div>
                <div class="col-md-1"></div>
                @elseif (Auth::user()->id === $usr->id)
                    <div class="col-md-1"></div>
                    <div class="col-md-10 text-right">
                        <a href="{{ route('usr.edit',$usr->id) }}" class="btn btn-primary" style="display:inline-block;">Edit Profile</a>
                    </div>
                    <div class="col-md-1"></div>
                @endif
            @endif
        </div>
        <div class="row justify-content-center">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Your Profile
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <h5 class="col-md-4 pl-5">Name</h5>
                               <p class="col-md-8 text-left">{{ $usr->name }}</p>
                           </div>
                           <div class="row">
                                <h5 class="col-md-4 pl-5">Email</h5>
                                <p class="col-md-8 text-left">{{ $usr->email }}</p>
                            </div>
                            
                            <div class="row">
                                <h5 class="col-md-4 pl-5">User ID</h5>
                                <p class="col-md-8 text-left" style="text-transform: uppercase">usr0{{ $usr->id }}</p>
                            </div>
                            <div class="row">
                                <h5 class="col-md-4 pl-5">Date Registered</h5>
                                <p class="col-md-8 text-left">{{ date_format($usr->created_at,"j F Y") }}</p>
                            </div>
                            
                            <div class="row">
                                <h5 class="col-md-4 pl-5">Date of Birth</h5>
                                <p class="col-md-8 text-left">{{ date("j F Y", strtotime($usr->birth_date)) }} </p> 
                            </div>
                            <div class="row">
                                <h5 class="col-md-4 pl-5">Gender</h5>
                                <p class="col-md-8 text-left">{{ $usr->gender }}</p>
                            </div>
                            <div class="row">
                                <h5 class="col-md-4 pl-5">Address</h5>
                                <p class="col-md-8 text-left">{{ $usr->user_address }}</p>
                            </div>
                            <div class="row">
                                <h5 class="col-md-4 pl-5">State</h5>
                                <p class="col-md-8 text-left">{{ $usr->state }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="card">
                            <div class="card-header">{{ __('Cooperatives Owned') }}</div>
                                <div class="card-body">
                                    @if ($usr->coops->count()>0)
                                    <?php $i = 0; ?>
                                        @foreach ($usr->coops as $coop)
                                        <div class="row">
                                                <div class="col-xs-1 pr-2 pl-4">
                                                    <?php $i++; ?>
                                                    <?php echo "$i"; ?>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><b>{{ $coop->coop_name }}</b></p>
                                                </div>
                                                <div class="col-md-3 pl-5">
                                                    <a href="{{ route('coop.show',$coop->id) }}" class="btn btn-primary">Read More</a>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    @if ($coop->verified_status === 0)
                                                        <p>Verified status: <b class="text-danger">No</b></p>
                                                    @else 
                                                        <p>Verified Status: <b class="text-success">Yes</b></p>
                                                    @endif
                                                </div>
                                                <div class="col-md-8"></div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="row">
                                        <p class="col-md-4"><strong>No Cooperatives Owned</strong></p>
                                        <div class="col-md-8 text-right">
                                            <a href="{{ route('coop.create') }}" class="btn btn-primary">Register Coop Here</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
                        <div class="py-3">
                            <div class="card">
                                <div class="card-header">{{ __('Past Comments') }}</div>
                                    <div class="card-body">
                                    @inject('coops', 'App\Coop')
                                    @if ($usr->comments->count()>0)
                                        <?php $i = 1; ?>
                                        @foreach ($usr->comments as $comment)
                                        <div class="row mt-2">
                                            <div class="col-xs-1 pl-3">
                                                <?php echo "$i"; ?>
                                                <?php $i++; ?>  
                                            </div>
                                            <div class="col-md-6"><p>{{ $comment->comment_text }}</p></div>
                                            <div class="col-md-3">
                                                <p class="text-muted"><small>{{ date_format($comment->created_at,"j F Y, g:i a") }}</small></p>
                                            </div>
                                            <div class="col-md-2 text-right">
                                                @foreach ($coops->get() as $coop)
                                                    @if ($comment->coop_id === $coop->id)
                                                        <a href="{{ route('coop.show', $coop->id)}}"><i class="fas fa-arrow-right" style="color:#24a0ed;"></i></a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row mx-4" style="border-bottom:2px solid rgb(201, 198, 198);"></div>
                                        @endforeach
                                    @else
                                    <div class="row">
                                        <p class="col-md-12"><strong>No Comments Yet</strong></p>
                                    </div>
                                    @endif
                                    </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-md-1"></div>

        </div>      
    </div>
@endsection

