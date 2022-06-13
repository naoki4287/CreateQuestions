<x-app-layout>
  <div>
    <div class="text-center">
    </div>
    <form class="text-center mt-40" action="{{ route('titleUpdate') }}" method="POST">
      @csrf
      <input type="hidden" name="titleID" value="{{ $title['id'] }}">
      @error('title')
      <div class="text-white text-center relative bottom-4">{{ $message }}</div>
      @enderror

      <textarea class="w-6/12 placeholder:pt-1 rounded-md outline-none" id="title" name="title" rows="3" placeholder="タイトルを編集してください &#13;&#10;問題入力欄右下の//にカーソルを合わせると入力欄を大きくすることができます" autofocus autocomplete="off">{{ $title['title'] }}</textarea><br>
      <button class="mt-16 bg-blue-500 hover:bg-blue-300 text-white hover:text-black w-6/12 py-4 rounded-md" type="submit">編集完了</button>
    </form>
  </div>
</x-app-layout>