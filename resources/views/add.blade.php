<x-app-layout>
  <div>
    <div class="text-white text-center text-3xl relative top-20">
      {{ $add_title['title']}}
    </div>
    <form class="text-center mt-40" action="{{ route('make') }}" name="create_question" method="post">
      @csrf
      @if (isset($add_title['id']))
      <input type="hidden" name="titleID" value="{{ $add_title['id'] }}">
      @else
      <input type="hidden" name="titleID" value="{{ $add_title }}">
      @endif

      @error('question')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror

      @error('answer')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror
      <textarea class="w-6/12 rounded-md outline-none" name="question" rows="3" placeholder="問題を作成してください&#13;&#10;問題入力欄右下の//にカーソルを合わせると入力欄を大きくすることができます" autofocus autocomplete="off">{{ old('question') }}</textarea><br>
      <textarea class="w-6/12 rounded-md outline-none" name="answer" rows="3" placeholder="解答" autocomplete="off">{{ old('answer') }}</textarea>
      {{-- <input class="w-6/12 h-8 rounded-md outline-none" type="text" name="answer" placeholder="解答" value="{{ old('answer') }}" autocomplete="off"> --}}
      <button class="mt-16 bg-blue-500 hover:bg-blue-300 hover:text-black text-white font-bold w-6/12 py-4 rounded-md">作成</button>
    </form>
  </div>
</x-app-layout>