<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Verified</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{route('users.show',['user' => $user])}}">
                        {{$user->id}}
                    </a>
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email ?? 'not verified'}}</td>
                <td>{{$user->verified_at ?? 'not verified'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
