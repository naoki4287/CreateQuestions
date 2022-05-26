<x-app-layout>
  <div class="">
    <!-- <div class="flex justify-end"><i id="settingBtn" class="fa-solid fa-gear fa-3x p-1 text-white bg-red-500 cursor-pointer"></i></div> -->

    <div id="modal" class="modal hidden w-6/12 text-white bg-indigo-600  rounded-lg absolute z-10">
      <div id="heading" class="pl-7 pt-6 pb-2 text-2xl border-b-2"></div>
      <div class="mb-8 pl-8 rounded-lg">
        <div id="answerBtn" class="border-b-2 py-4 cursor-pointer hover:text-yellow-400">解答する<i class="fa-solid fa-play fa-lg pl-8"></i></div>
        <div id="addBtn" class="border-b-2 py-4 cursor-pointer hover:text-green-400">追加する<i class="fas fa-lg fa-plus-circle pl-8"></i></div>
        <div id="editBtn" class="border-b-2  py-4 cursor-pointer hover:text-purple-500">編集する<i class="fa-solid fa-pen fa-lg pl-8"></i></div>
        <form class="bg-slate-10" action="/delete" method="POST">
          @csrf
          <input type="hidden" id="titleID" name="titleID">
          <div id="deleteBtn" class="block border-b-2 cursor-pointer hover:text-red-700"><button class="w-full h-full text-left py-4" type="submit">削除する<i class="fa-solid fa-trash-can fa-lg pl-8"></i></button></div>
        </form>
      </div>  
    </div>

    <div id="modalSetting" class="modal hidden w-6/12 m-auto text-white bg-indigo-600  rounded-lg z-20">
      <div class="pl-7 pt-6 pb-2 text-2xl border-b-2">設定</div>
      <div class="mb-8 pl-8">
        <form action="" name="Qform" method="GET">
          @csrf
          <div class="border-b-2 py-4">
          <select name="numOfQuiz" id="numOfQuiz" size="1" class="numOfQuiz text-gray-900 mr-4">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
          </select>
        問題数
        </div>
        <div class="border-b-2 py-4">
          <input id="shuffleBtn" type="checkbox" class=" text-green-500 mr-4" name="shuffleBtn"><label for="shuffleBtn" class="cursor-pointer">問題の順番をシャッフルする</label> 
        </div>
        <div class="border-b-2 py-4">
        <input id="musicBtn" type="checkbox" class="text-green-500 mr-4" name="musicBtn"><label for="musicBtn" class="cursor-pointer">正誤判定の音を消す</label>
        </div>
        <div class="border-b-2 py-4">
        <input id="markBtn" type="checkbox" class="text-green-500 mr-4" name="markBtn"><label for="markBtn" class="cursor-pointer">正誤判定の◯と✖️を出さない</label>
        </div>
          <div class="text-center">
            <button id="setAnswerBtn" type="submit" class="mt-8 mr-8 bg-indigo-900 hover:bg-indigo-300 hover:text-black text-white w-6/12 py-2 rounded-md">解答する</button>
          </div>
        </form>
      </div>  
    </div>
    <div id="mask" class="hidden fixed inset-0 z-0"></div>
    <div id="mask2" class="hidden fixed inset-0 z-0"></div>

    @if (count($titles) === 0)
    <h1 class="text-center mt-80 text-3xl text-white">作成したページはありません。<br>右下の＋ボタンを押して問題を作成してください。</h1>
    @else
    <ul id="questions" class="mt-10 mx-auto text-white w-6/12">
      @foreach ($titles as $title)
      <li class="listTitle w-full border-2 border-white truncate mx-auto mb-2 pl-6 py-4 rounded-md cursor-pointer hover:bg-indigo-600"></li>
      @endforeach
    </ul>
    @endif

    <div class="flex justify-end">
      <a href="{{ route('create') }}"><i id="createBtn" class="fas fa-4x fa-plus-circle  text-white "></i></a>
    </div>
  </div>

  <script>
    const titles = @json($titles);
    const QAs = @json($question_answers);
  </script>

  <script type="module" src="{{ asset('js/home.js') }}"></script>
</x-app-layout>