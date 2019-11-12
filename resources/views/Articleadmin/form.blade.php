<div>
    <label for="title">Title</label>
    <input type="text" name="title" autocomplete="off" value="{{ old('body') ?? $article->title }}">
    @error('title') <p style="color:red;">{{ $message }}</p> @enderror
</div>

<div>
    <label for="body">Content</label>
    <textarea name="body" autocomplete="off" >{{ old('body') ?? $article->body }}</textarea>
    @error('body') <p style="color:red;">{{ $message }}</p> @enderror
</div>
<div>Tag:</div>
@forelse ($tags as $tag)
<input type="checkbox" name="tag[]" value={{$tag->id}}>{{$tag->name}}
<br>
@empty
 <div>No Tags</div>
@endforelse


<div class="form-group">
    <label for="image">Article Image</label>
    <input type="file" name="image">
    <div>{{$errors->first('image')}}</div>
</div>

@csrf
