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

      <x-textarea id="title" name="title" rows="3" placeholder="タイトルを編集してください &#13;&#10;問題入力欄右下の//にカーソルを合わせると入力欄を大きくすることができます" autofocus autocomplete="off">{{ $title['title'] }}</x-textarea><br>
      <x-mc-button>作成</x-mc-button>
    </form>
  </div>
</x-app-layout>