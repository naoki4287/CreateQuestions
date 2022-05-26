"use strict";

const settingBtn = document.getElementById("settingBtn");
const heading = document.getElementById("heading");
const answerBtn = document.getElementById("answerBtn");
const addBtn = document.getElementById("addBtn");
const editBtn = document.getElementById("editBtn");
const deleteBtn = document.getElementById("deleteBtn");
const titleID = document.getElementById("titleID");
const questions = document.getElementById("questions");
const modalSetting = document.getElementById("modalSetting");
const numOfQuiz = document.getElementById("numOfQuiz");
const shuffleBtn = document.getElementById("shuffleBtn");
const musicBtn = document.getElementById("musicBtn");
const markBtn = document.getElementById("markBtn");
// const NoSettingBtn = document.getElementById("NoSettingBtn");
const setAnswerBtn = document.getElementById("setAnswerBtn");
const mask = document.getElementById("mask");
const mask2 = document.getElementById("mask2");

let listTitle = document.getElementsByClassName("listTitle");

let titlesIndex = 0;

console.log(QAs);

const shuffle = (QAs) => {
    for (let i = QAs.length - 1; i > 0; i--) {
        const shuffledIndex = Math.floor(Math.random() * (i + 1));
        [QAs[shuffledIndex], QAs[i]] = [QAs[i], QAs[shuffledIndex]];
    }
    return QAs;
};

// 1つ目のモーダルウィンドウでボタンを押された時の処理
answerBtn.addEventListener("click", () => {
    // ここにモーダルウィンドウを表示する処理
    modalSetting.classList.remove("hidden");
    mask2.classList.remove("hidden");
    let id = heading.getAttribute("title");

    // 問題数の処理
    let Qnum = numOfQuiz.value;
    numOfQuiz.onchange = () => {
        Qnum = numOfQuiz.value;
        numOfQuiz.setAttribute("value", Qnum);
    };

    // シャッフルの処理
    shuffleBtn.addEventListener("click", () => {
        if (shuffleBtn.checked) {
            shuffleBtn.value = true;
        }
    });

    // アラートを消す処理
    musicBtn.value = false;
    console.log(musicBtn.value);
    musicBtn.addEventListener("click", () => {
        if (musicBtn.checked) {
            musicBtn.value = true;
        }
    });

    markBtn.addEventListener("click", () => {
      if (markBtn.checked) {
          markBtn.value = true;
      }
  });

    // 設定画面を表示しない処理　後で作成する
    // NoSettingBtn.addEventListener('click', () => {
    //   if (NoSettingBtn.checked) {
    //     let settingOff = true;
    //     return settingOff;
    //   }
    // })

    setAnswerBtn.addEventListener("click", () => {
        document.Qform.action = "questions/" + id;
    });

    document.addEventListener("click", (e) => {
        if (!e.target.closest(".modal")) {
            modalSetting.classList.add("hidden");
            mask2.classList.add("hidden");
        }
    });
});

// 設定ボタン
// settingBtn.addEventListener("click", () => {
//   modalSetting.classList.remove("hidden");
//   mask2.classList.remove("hidden");
// });

// 追加ボタン
addBtn.addEventListener("click", () => {
    let id = heading.getAttribute("title");
    window.location.href = "/add/" + id;
});

// 編集ボタン
editBtn.addEventListener("click", () => {
    let id = heading.getAttribute("title");
    window.location.href = "/questionlists/" + id;
});

// 削除ボタン
deleteBtn.addEventListener("click", () => {
    let id = heading.getAttribute("title");
    titleID.setAttribute("value", id);
    console.log(titleID);
});

// li要素（listTitle）にid属性を付与してli要素にtitleを代入する処理
titles.map((title) => {
    let id = title.id;
    listTitle[titlesIndex].setAttribute("id", id);
    listTitle[titlesIndex].textContent = `${title.title}`;
    titlesIndex++;
});

// 作成された問題のどれかをクリックするとモーダルウィンドウが開いてクリックした問題のidを取得し、そのidとmapで一つずつ処理しているtitleのidが一致していたらsearchedTitleという変数にクリックしたli要素を格納する。
document.addEventListener("click", (e) => {
    if (!e.target.closest(".listTitle")) {
        modal.classList.add("hidden");
        mask.classList.add("hidden");
    } else {
        modal.classList.remove("hidden");
        mask.classList.remove("hidden");
        let id = e.target.getAttribute("id");
        const searchedTitle = titles.filter((title) => {
            return id == title.id;
        });
        heading.textContent = `${searchedTitle[0].title}`;
        heading.setAttribute("title", id);
    }
});
