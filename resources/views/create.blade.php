<x-app-layout>
  <div>
    <div>
      <h1 class="text-white text-center text-3xl relative mt-32">問題のタイトルを記入してください</h1>
    </div>
    @error('title')
    <div class="text-white text-center relative top-36">ERROR {{ $message }}</div>
    @enderror
    <form class="text-center mt-40" action="{{ route('insert') }}" name="create" method="post">
      @csrf
      <input class="w-4/12 h-8 rounded-md outline-none" type="text" name="title" placeholder="タイトル" value="{{ old('title') }}" autofocus autocomplete="off"><br>
      <button class="mt-16 bg-blue-500 hover:bg-blue-300 hover:text-black text-white font-bold w-4/12 py-2 rounded-md">作成</button>
    </form>
  </div>
</x-app-layout>