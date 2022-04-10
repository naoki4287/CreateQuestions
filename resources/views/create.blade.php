<x-app-layout>
  <div>
    <form class="text-center mt-60" action="{{ route('post') }}" name="create" method="post">
      @csrf
      <input class="w-80 h-8 rounded-lg  border-2 border-blue-500 placeholder:pl-2 outline-none" type="text" name="title" placeholder="タイトル"><br>
      <button class="mt-16 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-full">作成</button>
    </form>
  </div>
</x-app-layout>