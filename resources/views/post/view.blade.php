<x-app-layout>

    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{$post->post_image}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                    @foreach($post->categories as $category)
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                            {{$category->category_name}}
                        </a>
                    @endforeach
                </a>
                <h1  class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{$post->post_title}}
                </h1>
                <p href="#" class="text-sm pb-8">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, {{$post->created_at}}
                </p>
                <div>
                    {!!$post->post_slug!!}
                </div>
            </div>
        </article>


        <div class="w-full bg-white rounded-lg border p-2 my-4 mx-6">
            <h3 class="font-bold">Discussion</h3>

            @foreach($comments as $comment)
                <div class="flex flex-col">
                    <div class="border rounded-md p-3 ml-3 my-3">
                        <div class="flex gap-3 items-center">
                            <h3 class="font-bold">
                                {{$comment->user->name}}
                            </h3>
                        </div>
                        <p class="text-gray-600 mt-2">
                            {{$comment->comment_text}}
                        </p>
                        <p class="text-gray-600 mt-2">


                        <a href="{{route('comment' , $comment->id)}}" class="bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                            <form method="post" action="{{route('comment' , $comment->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-green-700 rounded-lg text-white">Delete</button>

                        </form>
                        </p>
                    </div>
                </div>
            @endforeach



          @role('user|admin|manager')
            <form method="post" action="{{route('comment' , $post->id)}}">
                @csrf
                <div class="w-full px-3 my-2">
                <textarea
                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="comment_text" id="comment_text" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full flex justify-end px-3">
                    <button type='submit' class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500">
                    </button>
                </div>
            </form>
        </div>
        @endrole
</section>
</x-app-layout>




{{--<div class="flex mx-auto items-center justify-center shadow-lg ">--}}

{{--    --}}{{--            mt-56 mx-8 mb-4 max-w-lg--}}
{{--    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="post" action="{{route('comment' , $post->id)}}">--}}
{{--        @csrf--}}
{{--        <div class="flex flex-wrap -mx-3 mb-6">--}}
{{--            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>--}}
{{--            <div class="w-full md:w-full px-3 mb-2 mt-2">--}}
{{--                <textarea  id="comment_text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="comment_text" placeholder='Type Your Comment' required></textarea>--}}
{{--            </div>--}}
{{--            <div class="w-full md:w-full flex items-start md:w-full px-3">--}}
{{--                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">--}}
{{--                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div class="-mr-1">--}}
{{--                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}
{{--</section>--}}
