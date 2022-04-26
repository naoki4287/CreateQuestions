<x-app-layout>
  <div>
    <div>
    </div>
    <form class="text-center mt-60" action="{{ route('update') }}
" name="create_question" method="post">
      @csrf
      @if (isset($edit_title['id']))
      <input type="hidden" name="titleID" value="{{ $edit_title['id'] }}">
      @else
      <input type="hidden" name="titleID" value="{{ $edit_title }}">
      @endif
      <textarea class="w-80 rounded-lg  placeholder:pl-2 placeholder:pt-1 outline-none resize-none" name="question" rows="3" placeholder="問題を作成してください"></textarea><br>
      <input class="w-80 h-8 rounded-lg placeholder:pl-2 outline-none" type="text" name="answer" placeholder="解答">
    </form>
  </div>
</x-app-layout>