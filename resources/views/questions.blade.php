<x-app-layout>
  <div id="div" class="">
    <div id="modal" class="hidden w-80 text-white bg-indigo-600 top-24  rounded-lg z-10">
      <div class="p-8 rounded-lg">
        <div id="result" class="mb-8"></div>
        <ul id="resultList">
        </ul>
      </div>
      <div class="text-center">
        <button class="mb-8 p-2 border-2 border-white rounded-lg"><a href="/">HOME</a></button>
        <button id="againBtn" class="mb-8 p-2 border-2 border-white rounded-lg">もう一度</button>
      </div>
    </div>

    <div class="text-white text-center text-3xl relative top-16">
      {{ $title['title'] }}
    </div>
    <div class="mx-20 mt-32 p-4 text-center text-white border-2 rounded-md">
      <div id="question"></div>
    </div>
    <div class="text-center mt-28">
      @csrf
      <input class="w-80 h-8 rounded-lg placeholder:pl-2 outline-none relative" type="text" name="answer" id="input" placeholder="解答" value="" required autofocus autocomplete="off"><br>
      <button class="mt-16 w-80 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-md" id="btn" type="submit">次の問題</button>
    </div>
    <div id="mask" class="hidden fixed inset-0 z-0"></div>
    <script>
      const question_answers = @json($question_answers);
    </script>
    <script src="{{ asset('js/questions.js') }}"></script>
  </div>
</x-app-layout>
