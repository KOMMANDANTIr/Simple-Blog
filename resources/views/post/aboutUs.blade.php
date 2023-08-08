
<x-app-layout>

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{$post->image}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">

                <h1  class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{$post->title}}
                </h1>
                <div>
                    {!!$post->content!!}
                </div>
            </div>
        </article>

    </section>
</x-app-layout>
