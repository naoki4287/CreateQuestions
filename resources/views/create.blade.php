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
      <input class="w-80 h-8 rounded-lg  placeholder:pl-2 outline-none" type="text" name="title" placeholder="タイトル" value="{{ old('title') }}" autofocus><br>
      <button class="mt-16 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-full">作成</button>
    </form>
  </div>
</x-app-layout>