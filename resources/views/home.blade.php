<x-app-layout>
  <div class="">

    <div id="modal" class="hidden w-5/12 text-white bg-indigo-600  rounded-lg z-10">
      <div id="heading" class="pl-7 pt-6 pb-2 text-2xl border-b-2"></div>
      <div class="mb-8 pl-8 rounded-lg">
        <div id="answerBtn" class="border-b-2 py-4 cursor-pointer hover:text-yellow-400">解答する<i class="fa-solid fa-play fa-lg pl-8"></i></div>
        <div id="addBtn" class="border-b-2 py-4 cursor-pointer hover:text-green-400">追加する<i class="fas fa-lg fa-plus-circle pl-8"></i></div>
        <div id="editBtn" class="border-b-2  py-4 cursor-pointer hover:text-purple-500">編集する<i class="fa-solid fa-pen fa-lg pl-8"></i></div>
        <div id="deleteBtn" class="border-b-2  py-4 cursor-pointer hover:text-red-700">削除する<i class="fa-solid fa-trash-can fa-lg pl-8"></i></div>
      </div>  
    </div>

    @if (count($titles) === 0)
    <h1 class="text-center mt-80 text-3xl text-white">作成したページはありません。<br>右下の＋ボタンを押して問題を作成してください。</h1>
    @else
    <ul id="questions" class="my-20 mx-auto text-white w-6/12">
      @foreach ($titles as $title)
      <li class="listTitle w-full border-2 border-white truncate mx-auto mb-2 pl-6 py-4 rounded-md cursor-pointer hover:bg-indigo-600">
        {{-- {{ $title['title'] }}</span> --}}
        <form class="inline-block float-right" action="delete" method="POST">
          @csrf
          <input type="hidden" name="titleID" value="{{ $title['id'] }}">
          {{-- <button type="submit"><i class="fa-solid fa-trash-can fa-lg pt-1 pr-4 hover:text-red-400"></i></button>
        </form> --}}
        {{-- <a href="/questionlists/{{ $title['id'] }}"></a>
        <a href="/add/{{ $title['id'] }}"><i class="fas fa-lg fa-plus-circle float-right pt-3 pr-4 text-white hover:text-green-400"></i></a>
        <a id="questionsBtn" href="/questions/{{ $title['id'] }}"><i class="fa-solid fa-play fa-lg float-right pt-3 pr-4 hover:text-yellow-400"></i></a> --}}
      </li>
      @endforeach
    </ul>
    @endif
    <div class="flex justify-end">
      <a href="{{ route('create') }}"><i class="fas fa-4x fa-plus-circle relative text-white bottom-28 right-20"></i></a>
    </div>
  </div>
  <script>
    const titles = @json($titles);
    const QAs = @json($question_answers);
  </script>
  <script type="module" src="{{ asset('js/home.js') }}"></script>
</x-app-layout>