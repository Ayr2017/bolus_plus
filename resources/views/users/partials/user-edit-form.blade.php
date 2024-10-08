    <form action="{{route('users.update',['user'=>$user])}}" method="POST">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="name"
                       value="{{old('name') ?? $user->name}}">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control form-control-sm" id="surname" name="surname" aria-describedby="surname"
                       value="{{old('surname') ?? $user->surname}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control form-control-sm" id="phone" name="phone" aria-describedby="phone"
                       value="{{old('phone') ?? $user->phone}}">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-primary">Сохранить</button>
    </form>
