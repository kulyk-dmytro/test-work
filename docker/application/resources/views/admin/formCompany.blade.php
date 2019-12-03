{{--{{$company->name}}--}}
{{--<hr />--}}
{{--{{$company->email}}.--}}
{{--<hr />--}}
{{--{{$company->logo}}--}}
{{--<hr />--}}
{{--{{$company->website}}--}}

<label for="name">Name</label>
<input type="text" class="form-control" name="name" placeholder="Заголовок новости" value="{{ (old("name") == $name ? "" : $name) }}" required>
@if ($errors->has('name'))
    <div class="text-danger">{{ $errors->first('name') }}</div>
@endif

<label for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="Заголовок новости" value="{{ (old("email") == $email ? "" : $email) }}" required>
@if ($errors->has('email'))
    <div class="text-danger">{{ $errors->first('email') }}</div>
@endif

<label for="logo">Logo</label>
<div class="custom-file">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
</div>
@if ($errors->has('logo'))
    <div class="text-danger">{{ $errors->first('logo') }}</div>
@endif

<label for="website">Website</label>
<input type="text" class="form-control" name="website" placeholder="Заголовок новости" value="{{ (old("website") == $website ? "" : $website) }}" required>
@if ($errors->has('website'))
    <div class="text-danger">{{ $errors->first('website') }}</div>
@endif

<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">