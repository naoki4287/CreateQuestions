<x-app-layout>
  <div>
    <div>
      <h1 class="text-white text-center text-3xl relative mt-32">問題のタイトルを記入してください</h1>
    </div>
    @error('title')
    <div class="text-white text-center mt-28 -mb-28">{{ $message }}</div>
    @enderror
    <form class="text-center mt-28" action="{{ route('insert') }}" name="create" method="post">
      @csrf
      {{-- <input class="w-6/12 h-8 rounded-md outline-none" type="text" name="title" placeholder="タイトル" value="{{ old('title') }}" autofocus autocomplete="off"><br> --}}
      <textarea class="w-6/12 placeholder:pt-1 rounded-md outline-none" name="title" rows="3" placeholder="問題を作成してください" autofocus autocomplete="off">{{ old('title') }}</textarea><br>

      <x-mc-button>作成</x-mc-button>
    </form>
  </div>
</x-app-layout>