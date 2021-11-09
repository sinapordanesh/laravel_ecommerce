<x-admin-master>

    @section('content')

        <h1>Edit The Post</h1>

        {{--The Form--}}
        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{--Title--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Titile</label>
                <input type="text"
                       name="title"
                       class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title"
                value="{{$post->title}}">
                <small id="emailHelp" class="form-text text-muted">Write your favorite title</small>
            </div>

            {{--Image--}}
            <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
            <label for="exampleInputEmail1">File</label>
            <br>
            <input type="file"
                   name="post_image"
                   class=""
                   id="post_image">
            <small class="form-text text-muted">Select your post image</small>

            <br>

            {{--body--}}
            <div class="form-group">
                <textarea name="body" id="bosy" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
                <small class="form-text text-muted">Enter your body</small>
            </div>

            {{--Submit--}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    @endsection

</x-admin-master>





