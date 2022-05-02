<x-app-layout>
  <div>
    {{-- <div class="text-white text-center text-3xl relative top-16">
      {{ $title['title']}}
    </div> --}}
    <div class="mx-20 mt-32 p-4 text-center text-white border-2 rounded-md">
      <div>{{ $question_answer['question'] }}</div>
    </div>
    <form class="text-center mt-28" action="{{ route('answer') }}" method="POST">
      @csrf
      <input type="hidden" name="QAID" value="{{ $question_answer['id'] }}">
      <input type="hidden" name="titleID" value="{{ $title['id'] }}">
      {{-- <input type="hidden" name="titleID" value="{{ $ }}"> --}}
      <input class="w-80 h-8 rounded-lg placeholder:pl-2 outline-none" type="text" name="answer" placeholder="解答" autofocus><br>
      <button class="mt-16 w-80 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-md" type="submit"><i class="fa-solid fa-check"></i></button>
    </form>
  </div>
</x-app-layout>
