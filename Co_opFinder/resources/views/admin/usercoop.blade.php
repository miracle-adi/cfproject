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
                @inject('users', 'App\User')
                @inject('coops', 'App\Coop')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>User ID</th>
                                <th>Name</th>
                                <th>State</th>
                                <th>Number Coop Owned</th>
                                <th> </th>
                            </thead>
                            <tbody>
                                
                                @foreach ($users->get() as $user)
                                <?php $i = 0; ?>
                                <tr>
                                    <td>USER0{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->state }}</td>
                                    @foreach($coops->get() as $coop)
                                        @if ($user->id === $coop->owner_id)
                                            <?php $i++; ?>
                                        @endif
                                    @endforeach
                                    <td  style="text-align:center">
                                    <?php echo "$i"; ?>
                                    </td>
                                    <td><a href="{{ route('usr.show', $user->id) }}"><i class="fas fa-arrow-right" style="color:#24a0ed;"></i></a></td>
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