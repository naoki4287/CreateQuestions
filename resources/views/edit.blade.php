<x-app-layout>
  <div>
    <div class="text-center">
    </div>
    <form class="text-center mt-40" action="{{ route('update') }}" method="POST">
      @csrf
      <input type="hidden" name="QAID" value="{{ $question_answer['id'] }}">
      <input type="hidden" name="titleID" value="{{ $question_answer['title_id'] }}">
      
      @error('question')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror

      @error('answer')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror
      <textarea class="w-6/12 placeholder:pt-1 rounded-md outline-none" name="question" rows="3" placeholder="問題を作成してください &#13;&#10;問題入力欄右下の//にカーソルを合わせると入力欄を大きくすることができます" autofocus autocomplete="off">{{ $question_answer['question'] }}</textarea><br>
      <textarea class="w-6/12 placeholder:pt-1 rounded-md outline-none" name="answer" rows="3" placeholder="解答" autocomplete="off">{{ $question_answer['answer'] }}</textarea><br>
      <button class="mt-16 bg-blue-500 hover:bg-blue-300 text-white hover:text-black w-6/12 py-4 rounded-md" type="submit">編集完了</button>
    </form>
  </div>
</x-app-layout>