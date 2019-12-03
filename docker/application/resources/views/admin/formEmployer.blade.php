<label for="first_name">First name</label>
<input type="text" class="form-control" name="first_name" placeholder="Enter first name" value="{{ (old("first_name") == $first_name ? "" : $first_name) }}" required>
@if ($errors->has('first_name'))
        {{--<div class="class="text-danger"">{{ $errors->first('first_name') }}</div>--}}
        <div class="text-danger">{{ $errors->first('first_name') }}</div>
@endif

<label for="last_name">Last name</label>
<input type="text" class="form-control" name="last_name" placeholder="Enter last name" value="{{ (old("last_name") == $last_name ? "" : $last_name) }}" required>
@if ($errors->has('last_name'))
        <div class="text-danger">{{ $errors->first('last_name') }}</div>
@endif

<label for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ (old("email") == $email ? "" : $email) }}" required>
@if ($errors->has('email'))
        <div class="text-danger">{{ $errors->first('email') }}</div>
@endif
<label for="phone">Phone</label>
<input type="text" class="form-control" name="phone" placeholder="Enter phone" value="{{ (old("phone") == $phone ? "" : $phone) }}" required>
@if ($errors->has('phone'))
        <div class="text-danger">{{ $errors->first('phone') }}</div>
@endif

<label for="company_id">Companies</label>
<select class="form-control" name="company_id" multiple="">
    @foreach ($companies as $key => $company)
        <option value="{{ $company->id }}"
                @isset($company_id)
                    @if ($company->id == $employer->company_id)
                        selected="selected"
                    @endif
                @endisset
        >
            {{ $company->name }}
        </option>
    @endforeach
</select>
<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">