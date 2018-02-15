<form action="{{ isset($user)? '/admin/users/'.$user->id : '/admin/users' }}" method="POST">

    {{ csrf_field() }}

    @if(isset($user))
    {{ method_field('PATCH') }}
    @endif

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name',isset($user)? $user->name : '') }}">
        @if($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email',isset($user)? $user->email : '') }}">
        @if($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number',isset($user)? $user->phone_number : '') }}">
        @if($errors->has('phone_number'))
        <p class="text-danger">{{ $errors->first('phone_number') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
        <label for="dob">Date Of Birth</label>
        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date Of Birth" value="{{ old('dob',isset($user)? $user->dob->toDateString() : '') }}">
        @if($errors->has('dob'))
        <p class="text-danger">{{ $errors->first('dob') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label for="role">Role</label>
        <select id="role" name="role" class="form-control">
            <option value="">Choose Role</option>
            @foreach($roles as $key => $name)
            <option value="{{ $key }}" {{  old('role') != NULL ? (old('role') == $key ? 'selected' : '' ) : (isset($user)? ($user->role == $key ? 'selected' : '') :'')   }}>{{ $name }}</option>
            @endforeach
        </select>
        @if($errors->has('role'))
        <p class="text-danger">{{ $errors->first('role') }}</p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary pull-right">Save</button>
</form>