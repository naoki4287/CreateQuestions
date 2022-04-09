<x-app-layout>
  <div>
    <!-- @if (!isset($titles))
    <h1 class="text-center mt-80 text-3xl text-blue-500">作成したページはありません。<br>右下の＋ボタンを押して問題を作成してください。</h1>
  
    @else -->
    <ul class="text-center mt-80 text-blue-500">
      @foreach ($titles as $title) 
        <li>{{ $title['title'] }}</li>
      @endforeach
    </ul>
    <!-- @endif -->

    <form class="flex justify-end" action="{{ route('create') }}">
      <button class="mr-28 mt-60"><i class="fas fa-4x fa-plus-circle"></i></button>
    </form>
  </div>
</x-app-layout>