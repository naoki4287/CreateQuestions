<x-app-layout>
  <div>
    <div class="text-center">
      <div class="inline-block text-white text-2xl  mt-8">
        {{ $title['title'] }}
      </div>
    </div>
    <ul class="mt-12">
      @foreach ($question_answers as $question_answer)
      <li class="max-w-2xl border-2 border-white truncate mx-auto mb-2 px-2 py-3 rounded-md cursor-pointer hover:bg-indigo-600">
        <a href="/edit/{{ $question_answer['id'] }}">
          <div class="text-white text-xl ml-4 mr-2">
            <label for="question">問題：</label>
            <span class="inline-block mb-2">{{ $question_answer['question'] }}</span>
            <hr class="border-b-2 border-white">
            <label for="answer">解答：</label>
            <span class="inline-block mt-2">{{ $question_answer['answer'] }}</span>
          </div>
        </a>
      </li>
      @endforeach
    </ul>
  </div>
</x-app-layout>