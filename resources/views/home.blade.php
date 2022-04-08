<x-app-layout>
  <div>
    @if (!isset($data))
    <h1 class="text-center mt-80 text-3xl text-blue-500">{!! nl2br(e($msg)) !!}</h1>
    @else
    <ul>
      @foreach ($data as $title) {
      <li>{{ $title }}</li>
      }
      @endforeach
    </ul>

    @endif

    <form class="flex justify-end" action="{{ route('create') }}">
      <button class="mr-28 mt-60"><i class="fas fa-4x fa-plus-circle"></i></button>
    </form>
  </div>
</x-app-layout>