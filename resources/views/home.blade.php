<x-app-layout>
  <div class="">
    @if (count($titles) === 0)
    <h1 class="text-center mt-80 text-3xl text-white">作成したページはありません。<br>右下の＋ボタンを押して問題を作成してください。</h1>
    @else
    <ul id="questions" class="my-20 text-white">
      @foreach ($titles as $title)
      <li class="w-6/12 border-2 border-white truncate mx-auto mb-2 px-2 py-4 rounded-md cursor-pointer hover:bg-indigo-600">
        <span class="pl-4">{{ $title['title'] }}</span>
        <form class="inline-block float-right" action="delete" method="POST">
          @csrf
          <input type="hidden" name="titleID" value="{{ $title['id'] }}">
          <button type="submit"><i class="fa-solid fa-trash-can fa-lg pt-1 pr-4 hover:text-red-400"></i></button>
        </form>
        <a href="/questionlists/{{ $title['id'] }}"><i class="fa-solid fa-pen fa-lg float-right pt-3 pr-4 hover:text-pink-400"></i></a>
        <a href="/add/{{ $title['id'] }}"><i class="fas fa-lg fa-plus-circle float-right pt-3 pr-4 text-white hover:text-green-400"></i></a>
        {{-- @if (isset($question_answer['question'])) --}}
        <a id="questionsBtn" href="/questions/{{ $title['id'] }}"><i class="fa-solid fa-play fa-lg float-right pt-3 pr-4 hover:text-yellow-400"></i></a>
        {{-- @endif --}}
      </li>
      @endforeach
    </ul>
    @endif
    <div class="flex justify-end">
      <a href="{{ route('create') }}"><i class="fas fa-4x fa-plus-circle fixed text-white bottom-28 right-20"></i></a>
    </div>
  </div>
  <script>
      const question_answers = @json($question_answers);
  </script>
  <script src="{{ asset('js/home.js') }}"></script>
</x-app-layout>