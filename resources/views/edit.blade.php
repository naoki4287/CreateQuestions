<x-app-layout>
  <div>
    <!-- @if (isset($posts['question']))
    <div class="text-white text-center">編集が完了しました</div>
    @endif -->
    <form class="text-center mt-60" action="{{ route('update') }}" method="POST">
      @csrf
      <input type="hidden" name="QAID" value="{{ $question_answer['id'] }}">
      <textarea class="w-96  placeholder:pl-2 placeholder:pt-1 outline-none resize-none" name="question" rows="3" placeholder="問題を作成してください" autofocus>{{ $question_answer['question'] }}</textarea><br>
      <input class="w-96" type="text" name="answer" value="{{ $question_answer['answer'] }}"><br>
    </form>
  </div>
</x-app-layout>