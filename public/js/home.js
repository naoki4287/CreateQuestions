"use strict";

const open = document.getElementById("open");
const close = document.querySelector(".close");
const modal = document.querySelector(".modal");
const questions = document.getElementById('questions');
const question = document.getElementsByClassName('question');

questions.addEventListener("click", () => {
  modal.classList.remove("hidden");
});

close.addEventListener("click", () => {
  modal.classList.add("hidden");
});
