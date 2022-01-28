<form action="{{route('save')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="logo">
    <button type="submit">Save</button>
</form>