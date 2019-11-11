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
@csrf
