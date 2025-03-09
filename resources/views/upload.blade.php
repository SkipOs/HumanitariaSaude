
    <form action="/file-upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
@if (session('message'))
    <p>{{ session('message') }}</p>
@endif
