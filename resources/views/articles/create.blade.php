@extends ('layout')

@section ('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css"/>
@endsection

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="title is-1"> New Article </h1>

            <form method="POST"action="/articles">
                @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input type="text" class="input @error('title') is-danger @enderror" name="title" id="title" value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <p class="help is-danger"> {{$errors->first('title')}} </p>
                    @enderror
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                    </div>
                    @error('excerpt')
                        <p class="help is-danger"> {{$errors->first('excerpt')}} </p>
                    @enderror
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body">{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                        <p class="help is-danger"> {{$errors->first('body')}} </p>
                    @enderror
                </div>

                <div class="field">
                    <label for="body" class="label">Tags</label>

                    <div class="select is-multiple">
                        <select name="tags[]" multiple>
                            @foreach($tags as $tag)
                            <option value="{{$tag->id }}"> {{$tag->name}} </option>

                            @endforeach

                        </select>
                    </div>
                    @error('tags')
                        <p class="help is-danger"> {{$errors->first('tags')}} </p>
                    @enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary" type="submit">Submit</button>
                    </div>
                </div>

                
            </form>
        </div>

    </div>
@endsection