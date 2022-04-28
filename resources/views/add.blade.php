<x-app-layout>
  <div>
    <div class="text-white text-center text-3xl relative top-32">
      {{ $add_title['title']}}
    </div>
    <form class="text-center mt-60" action="{{ route('make') }}
" name="create_question" method="post">
      @csrf
      @if (isset($add_title['id']))
      <input type="hidden" name="titleID" value="{{ $add_title['id'] }}">
      @else
      <input type="hidden" name="titleID" value="{{ $add_title }}">
      @endif

      @error('question')
      <div class="text-white text-center relative bottom-4">ERROR: {{ $message }}</div>
      @enderror

      @error('answer')
      <div class="text-white text-center relative bottom-4">ERROR: {{ $message }}</div>
      @enderror
      <textarea class="w-80 rounded-lg  placeholder:pl-2 placeholder:pt-1 outline-none resize-none" name="question" rows="3" placeholder="問題を作成してください" autofocus>{{ old('question') }}</textarea><br>
      <input class="w-80 h-8 rounded-lg placeholder:pl-2 outline-none" type="text" name="answer" placeholder="解答" value="{{ old('answer') }}">
    </form>
  </div>
</x-app-layout>