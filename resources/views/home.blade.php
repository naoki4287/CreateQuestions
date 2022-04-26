<x-app-layout>
  <div class="">
    @if (count($titles) === 0)
    <h1 class="text-center mt-80 text-3xl text-white">作成したページはありません。<br>右下の＋ボタンを押して問題を作成してください。</h1>
    @else
    <!-- <div class="modal hidden w-80 mx-auto text-center text-white bg-indigo-600 translate-y-1/3 rounded-lg">
      <div class="p-8 rounded-lg">
        <a href="{{ route('questions')}}"><button class="cursor-pointer pt-2 pb-8">解答する</button></a><br>
      <a href="/edit/{id}"><button class="cursor-pointer pb-8">編集する</button></a>
        <form action="/delete" method="POST">
          <button class="cursor-pointer border-2 border-white p-2">削除する</button>
        </form>
      </div>
      <div class="close">
        <button class="cursor-pointer pb-8">閉じる</button>
      </div>
    </div> -->
    <ul id="questions" class="my-40 text-white">
      @foreach ($titles as $title)
      <li class="max-w-lg border-2 border-white truncate mx-auto mb-2 px-2 py-4 rounded-md cursor-pointer hover:bg-indigo-600"><span class="max-w-xl pl-4">{{ $title['title'] }}</span><a href="/edit/{{ $title['id'] }}"><i class="fa-solid fa-pen float-right pt-1 pr-4 hover:text-green-400"></i></a>
      </li>
      @endforeach
    </ul>
    @endif
    <div class="flex justify-end static">
      <a href="{{ route('create')}}"><i class="fas fa-4x fa-plus-circle fixed text-white bottom-28 right-20"></i></a>
    </div>
    <script src="{{ asset('js/home.js') }}"></script>
  </div>
</x-app-layout>