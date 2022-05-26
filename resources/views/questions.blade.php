<x-app-layout>
  <div class="">

    <div id="modal" class="hidden w-80 text-white bg-indigo-600  rounded-lg z-10">
      <div class="p-8 rounded-lg">
        <div id="result" class="mb-8"></div>
        <ul id="resultList">
        </ul>
      </div>
      <div class="text-center space-x-4">
        <a href="/"><button class="w-4/12 mb-8 p-2 border-2 border-white hover:bg-indigo-900 rounded-lg">HOME</button></a>
        <button id="againBtn" class="w-4/12 mb-8 p-2 border-2 border-white hover:bg-indigo-900 rounded-lg">もう一度</button>
      </div>
    </div>

    <div class="text-white text-center text-3xl relative top-10">
      {{ $title['title'] }}
    </div>
    <div class="mx-20 mt-24 p-4 text-center text-white border-2 rounded-md">
      <div id="question" class=""></div>
    </div>
    <div class="text-center mt-10">
      @csrf
      <i class="fa-regular fa-circle fa-5x invisible text-red-500 z-10 " id="circle"></i>
      <i class="fa-solid fa-xmark fa-5x invisible text-red-500 z-20" id="cross"></i>
      <div id="errorMsg" class="text-white z-0"></div>
      <input class="input w-4/12 h-8 rounded-lg placeholder:pl-2 outline-none relative z-0" type="text" name="answer" id="answerInput" value="" placeholder="解答  shift+enterで解答できます" autofocus autocomplete="off"><br>
      <button class="mt-16 w-4/12 bg-blue-500 hover:bg-blue-300 text-white py-2 px-4 rounded-md" id="btn" type="submit">解答する</button>
    </div>
    <div id="mask" class="hidden fixed inset-0 z-0"></div>

    <script>
      const question_answers = @json($question_answers);
      const setting = @json($setting);
    </script>
    <script type="module" src="{{ asset('js/questions.js') }}"></script>
  </div>
</x-app-layout>