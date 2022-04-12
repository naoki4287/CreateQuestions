<x-app-layout>
  <div class="">
    @if (count($titles) === 0)
    <h1 class="text-center mt-80 text-3xl text-white">作成したページはありません。<br>右下の＋ボタンを押して問題を作成してください。</h1>
    @else
    <ul class="text-center my-40 text-white">
      @foreach ($titles as $title)
      <li class="max-w-md border-2 border-white mx-auto mb-2 py-2 rounded-md cursor-pointer hover:bg-indigo-600">{{ $title['title'] }}
        <i class="fa-solid fa-trash-can float-right pt-1 pr-4 hover:text-red-400"></i>
        <a href="/edit/{id}"><i class="fa-solid fa-pen float-right pt-1 pr-4 hover:text-green-400"></i></a>
        <a href="/questions"><i class="fa-solid fa-play float-right pt-1 pr-4 hover:text-yellow-400"></i></a>
      </li> 
        @endforeach
      </ul>
      @endif
      
      <div class="flex justify-end static">
        <a href="/create"><i class="fas fa-4x fa-plus-circle fixed text-white bottom-28 right-20"></i></a>
      </div>
    
    
  </div>
</x-app-layout>