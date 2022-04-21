<x-app-layout>
  <div>
    <div class="mx-20 mt-32 p-4 text-center text-white border-2 rounded-md">
      <? shuffle($question_answers) ?>
      @foreach ($question_answers as $question_answer)
      <div>{{ $question_answer['question'] }}</div>
      @endforeach
    </div>
    <form class="text-center mt-28" action="" method="post">
      <input class="w-80 h-8 rounded-lg placeholder:pl-2 outline-none" type="text" name="answer" placeholder="解答"><br>
      <button class="mt-16 w-80 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-md" type="submit"><i class="fa-solid fa-check"></i></button>
    </form>
    <script src="{{ asset('js/questions.js') }}"></script>
  </div>
</x-app-layout>