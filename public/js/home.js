"use strict";
const heading = document.getElementById("heading");
const answerBtn = document.getElementById("answerBtn");
const addBtn = document.getElementById("addBtn");
const editBtn = document.getElementById("editBtn");
const deleteBtn = document.getElementById("deleteBtn");
const questions = document.getElementById("questions");
let listTitle = document.getElementsByClassName("listTitle");

let titlesIndex = 0;

// console.log(listTitle);
console.log(titles);

answerBtn.addEventListener("click", () => {
  let id = heading.getAttribute("title");
  window.location.href = "/questions/" + id;
});
addBtn.addEventListener("click", (e) => {
        let id = heading.getAttribute("title");
        console.log(heading);
        console.log(id);
        window.location.href = "/add/" + id;
});
editBtn.addEventListener("click", () => {
  let id = heading.getAttribute("title");
  window.location.href = "/questionlists/" + id;
});
deleteBtn.addEventListener("click", () => {
    alert("削除ボタンを押しました");
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
    } else {
        modal.classList.remove("hidden");
        // console.log(e.target.closest(".listTitle"));
        let id = e.target.getAttribute("id");
        // console.log(id);
        const searchedTitle = titles.filter((title) => {
            return id == title.id;
        });
        // console.log(searchedTitle);
        heading.textContent = `${searchedTitle[0].title}`;
        heading.setAttribute('title', id)
    }
});
