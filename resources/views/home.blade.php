<x-app-layout>

@foreach($posts as $post)
    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        <a  class="hover:opacity-75">
            <img src="{{$post->post_image}}">
        </a>
        <div class="bg-white flex flex-col justify-start p-6">
            <h1  class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->post_title}}</h1>
            <p  class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on {{$post->created_at}}
            </p>
            <p  class="pb-6">{{$post->post_slug}}..</p>
            <a href="{{route('view' , $post)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>

    @endforeach
    {{$posts->onEachSide(1)->links()}}

</x-app-layout>
