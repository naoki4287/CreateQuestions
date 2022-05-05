<x-app-layout>
  <div>
    <div class="text-white text-center text-3xl relative top-16">
      {{ $title['title']}}
    </div>
    <div class="mx-20 mt-32 p-4 text-center text-white border-2 rounded-md">
      <div id="question"></div>
    </div>
    <form class="text-center mt-28">
      @csrf
      <input class="w-80 h-8 rounded-lg placeholder:pl-2 outline-none" type="text" name="answer" id="input" placeholder="解答" value="" required autofocus autocomplete="off"><i class="fa-regular fa-circle fa-4x inline text-red-500"></i><br>
      <button class="mt-16 w-80 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-md" id="btn" type="submit">次の問題</button>
    </form>
    <script>
      const question_answers = @json($question_answers);
    </script>
    <script src="{{ asset('js/questions.js') }}"></script>
  </div>
</x-app-layout>
