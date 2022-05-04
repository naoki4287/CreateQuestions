<x-app-layout>
  <div>
    <div class="text-white text-center text-3xl relative top-16">◯問中◯正解です</div>
    {{-- @foreach ($question_answers as $question_answer)
      <div>{{ $question_answer['question'] }}</div>
      <div>{{ $question_answer['answer'] }}</div>
    @endforeach --}}
    <div class="text-center">
      <button class="mt-16 w-80 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-md" type="submit">Home</button>
      <button class="w-80 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-md" type="submit">もう一度</button>
    </div>
  </div>
</x-app-layout>
