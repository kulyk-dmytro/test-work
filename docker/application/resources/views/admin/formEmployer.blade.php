<label for="first_name">First name</label>
<input type="text" class="form-control" name="first_name" placeholder="Заголовок новости" value="{{$first_name or ""}}" required>
@if ($errors->has('first_name'))
        {{--<div class="class="text-danger"">{{ $errors->first('first_name') }}</div>--}}
        <div class="text-danger">{{ $errors->first('first_name') }}</div>
@endif

<label for="last_name">Last name</label>
<input type="text" class="form-control" name="last_name" placeholder="Заголовок новости" value="{{$last_name or ""}}" required>
@if ($errors->has('last_name'))
        <div class="text-danger">{{ $errors->first('last_name') }}</div>
@endif

<label for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="Заголовок новости" value="{{$email or ""}}" required>
@if ($errors->has('email'))
        <div class="text-danger">{{ $errors->first('email') }}</div>
@endif
<label for="phone">Phone</label>
<input type="text" class="form-control" name="phone" placeholder="Заголовок новости" value="{{$phone or ""}}" required>
@if ($errors->has('phone'))
        <div class="text-danger">{{ $errors->first('phone') }}</div>
@endif

<label for="company_id">Companies</label>
<select class="form-control" name="company_id" multiple="">

        {{--@foreach ($companies as $key => $company)--}}
                {{--<option value="{{$category->id or ""}}"--}}
                        {{--@isset($article->id)--}}
                        {{--@foreach ($article->categories as $category_article)--}}
                        {{--@if ($category->id == $category_article->id)--}}
                        {{--selected="selected"--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--@endisset--}}
                {{-->--}}
                        {{--{{$category->title or ""}}--}}
                {{--</option>--}}
        {{--@endforeach--}}

    @foreach ($companies as $key => $company)
        <option value="{{ $company->id }}">
            {{ $company->name }}
        </option>
    @endforeach
</select>
<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">