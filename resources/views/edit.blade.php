<x-app-layout>
  <div>
    <form class="text-center mt-60" action="{{ route('update') }}" method="POST">
      @csrf
      <input type="hidden" name="QAID" value="{{ $question_answer['id'] }}">
      <input type="hidden" name="titleID" value="{{ $question_answer['title_id'] }}">
      <textarea class="w-96 placeholder:pt-1 outline-none resize-none" name="question" rows="3" placeholder="問題を作成してください" autofocus>{{ $question_answer['question'] }}</textarea><br>
      <input class="w-96" type="text" name="answer" placeholder="解答" value="{{ $question_answer['answer'] }}"><br>
    </form>
  </div>
</x-app-layout>