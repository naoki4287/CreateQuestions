<x-app-layout>
  <div>
    <form class="text-center mt-60" action="{{ route('post') }}" name="create" method="post">
      @csrf
      <x-input></x-input>
      <x-button>完了</x-button>
    </form>
  </div>
</x-app-layout>