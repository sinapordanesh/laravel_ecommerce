<x-admin-master>

    @section('content')

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Titile</label>
                <input type="text"
                       name="title"
                       class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title">
                <small id="emailHelp" class="form-text text-muted">Write your favorite title</small>
            </div>


            <label for="exampleInputEmail1">File</label>
            <br>
            <input type="file"
                   name="post_image"
                   class=""
                    id="post_image">
            <small class="form-text text-muted">Select your post image</small>

            <br>

            <div class="form-group">
                <textarea name="body" id="bosy" class="form-control" cols="30" rows="10"></textarea>
                <small class="form-text text-muted">Enter your body</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    @endsection

</x-admin-master>





