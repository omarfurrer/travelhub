<form action="{{ isset($agency)? '/admin/agencies/'.$agency->id : '/admin/agencies' }}" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}

    @if(isset($agency))
    {{ method_field('PATCH') }}
    @endif

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name',isset($agency)? $agency->name : '') }}">
        @if($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
        <label for="logo">Logo</label>
        @if(isset($agency))
        @if($agency->logo_path != NULL)
        <div>
            <img width="100" height="100" src="{{ asset('storage/'.$agency->logo_path) }}" alt="..." class="img-thumbnail" id="agency-logo-placeholder">
        </div>
        @endif
        @endif
        <input type="file" id="logo" name="logo">
        <p class="help-block">Uplaod 150x150 px Logo</p>
        <p class="text-danger">{{ $errors->first('logo') }}</p>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description">Description</label>
        <textarea class="form-control" name="description">{{ old('description',isset($agency)? $agency->description : '') }}</textarea>
        @if($errors->has('description'))
        <p class="text-danger">{{ $errors->first('description') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('doe') ? ' has-error' : '' }}">
        <label for="doe">Date Of Establishment</label>
        <input type="date" class="form-control" name="doe" id="doe" placeholder="Date Of Establishment" value="{{ old('doe',isset($agency)? $agency->doe->toDateString() : '') }}">
        @if($errors->has('doe'))
        <p class="text-danger">{{ $errors->first('doe') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address',isset($agency)? $agency->address : '') }}">
        @if($errors->has('address'))
        <p class="text-danger">{{ $errors->first('address') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
        <label for="contact_phone">Phone</label>
        <input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Phone" value="{{ old('contact_phone',isset($agency)? $agency->contact_phone : '') }}">
        @if($errors->has('contact_phone'))
        <p class="text-danger">{{ $errors->first('contact_phone') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('website_url') ? ' has-error' : '' }}">
        <label for="website_url">Website URL</label>
        <input type="text" class="form-control" name="website_url" id="website_url" placeholder="Website URL" value="{{ old('website_url',isset($agency)? $agency->website_url : '') }}">
        @if($errors->has('website_url'))
        <p class="text-danger">{{ $errors->first('website_url') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('fb_url') ? ' has-error' : '' }}">
        <label for="fb_url">Fb URL</label>
        <input type="text" class="form-control" name="fb_url" id="fb_url" placeholder="FB URL" value="{{ old('fb_url',isset($agency)? $agency->fb_url : '') }}">
        @if($errors->has('fb_url'))
        <p class="text-danger">{{ $errors->first('fb_url') }}</p>
        @endif
    </div>

    <div class="form-group{{ $errors->has('gmaps_url') ? ' has-error' : '' }}">
        <label for="gmaps_url">Gmaps URL</label>
        <input type="text" class="form-control" name="gmaps_url" id="gmaps_url" placeholder="Gmaps_url" value="{{ old('gmaps_url',isset($agency)? $agency->gmaps_url : '') }}">
        @if($errors->has('gmaps_url'))
        <p class="text-danger">{{ $errors->first('gmaps_url') }}</p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary pull-right">Save</button>
</form>