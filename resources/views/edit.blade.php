<x-app-layout>
  <div>
    <form class="text-center mt-60" action="{{ route('update') }}" method="POST">
      @csrf
      <input type="hidden" name="QAID" value="{{ $question_answer['id'] }}">
      <input type="hidden" name="titleID" value="{{ $question_answer['title_id'] }}">
      <textarea class="w-5/12 placeholder:pt-1 rounded-md outline-none resize-none" name="question" rows="3" placeholder="問題を作成してください" autofocus autocomplete="off">{{ $question_answer['question'] }}</textarea><br>
      <textarea class="w-5/12 placeholder:pt-1 rounded-md outline-none resize-none" name="answer" rows="3" placeholder="解答" autocomplete="off">{{ $question_answer['answer'] }}</textarea><br>
      <button class="mt-16 bg-blue-500 hover:bg-blue-300 text-white font-bold w-5/12 py-4 rounded-md">編集完了</button>

    </form>
  </div>
</x-app-layout>