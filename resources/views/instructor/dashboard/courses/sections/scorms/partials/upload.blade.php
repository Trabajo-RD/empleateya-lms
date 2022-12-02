{{-- <form action="/upload-scorm" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} --}}
    <div class="form-group">
        <input type="file" accept="image/*" name="origin_file">

        @error('origin_file')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- <button type="submit">Submit</button> --}}
{{-- </form> --}}
