// const { remove } = require("lodash");

{
    const question = document.getElementById("question");
    const modal = document.getElementById("modal");
    const result = document.getElementById("result");
    const resultList = document.getElementById("resultList");
    const circle = document.getElementById("circle");
    const cross = document.getElementById("cross");
    const errorMsg = document.getElementById("errorMsg");
    const answerInput = document.getElementById("answerInput");
    const btn = document.getElementById("btn");
    const againBtn = document.getElementById("againBtn");
    const QAs = question_answers;
    const numOfQuiz = setting["numOfQuiz"];
    const shuffleBtn = setting["shuffleBtn"];
    const musicBtn = setting["musicBtn"];
    const markBtn = setting["markBtn"];
    let QAsIndex = 0;
    let score = 0;
    let userAnswers = [];
    let correctMusic = new Audio("../correct_music.mp3");
    let wrongMusic = new Audio("../wrong_music.mp3");

    const shuffle = (QAs) => {
        for (let i = QAs.length - 1; i > 0; i--) {
            const shuffledIndex = Math.floor(Math.random() * (i + 1));
            [QAs[shuffledIndex], QAs[i]] = [QAs[i], QAs[shuffledIndex]];
        }
        return QAs;
    };

    if (performance.navigation.type === 0) {
        if (shuffleBtn === "true") {
            shuffle(QAs);
        }
    }

    const modalResult = () => {
        // 問題がもうなければこちらを実行
        modal.classList.remove("hidden");
        mask.classList.remove("hidden");
        if (QAs.length < numOfQuiz) {
            result.textContent = `正答率は${score}/${QAs.length}です`;
        } else {
            result.textContent = `正答率は${score}/${numOfQuiz}です`;
        }

        // resultのモーダルウィンドウ
        try {
            for (let i = 0; i < numOfQuiz; i++) {
                let Qdiv = document.createElement("div");
                let Adiv = document.createElement("div");
                let hr = document.createElement("hr");
                let span = document.createElement("span");
                resultList.appendChild(Qdiv);
                resultList.appendChild(Adiv);
                resultList.appendChild(hr);
                Adiv.appendChild(span);
                Qdiv.setAttribute("class", "list");
                Adiv.setAttribute("class", "list");
                hr.setAttribute("class", "list");
                Qdiv.textContent = `問題：${QAs[i].question}`;
                Adiv.textContent = `解答：${userAnswers[i]}`;
                if (QAs[i].answer === userAnswers[i]) {
                    Adiv.innerHTML +=
                        "<span style='float: right;'><i class='fa-regular fa-circle'></i></span>";
                } else {
                    Adiv.innerHTML +=
                        "<span style='float:right; color:red;  margin-right: 2px;'><i class='fa-solid fa-xmark fa-lg'></i></span>";
                }
            }
        } catch (e) {
            console.log("問題がなくなったので結果を表示しています。");
        }
    };

    const setupQuiz = () => {
        question.textContent = QAs[QAsIndex].question;
        answerInput.value = "";
        answerInput.focus();
    };
    setupQuiz();

    const correctOrWrong = () => {
        userAnswers[QAsIndex] = answerInput.value;
        if (QAs[QAsIndex].answer === userAnswers[QAsIndex]) {
            if (musicBtn == null) {
                correctMusic.play();
                setTimeout(() => {
                    correctMusic.pause();
                    correctMusic.currentTime = 0;
                }, 500);
            }
            if (markBtn == null) {
                circle.classList.remove("invisible");
                setTimeout(() => {
                    circle.classList.add("invisible");
                }, 500);
            }
            score++;
        } else {
            if (musicBtn == null) {
                wrongMusic.play();
                setTimeout(() => {
                    wrongMusic.pause();
                    wrongMusic.currentTime = 0;
                }, 500);
            }
            if (markBtn == null) {
                cross.classList.remove("invisible");
                setTimeout(() => {
                    cross.classList.add("invisible");
                }, 500);
            }
        }

        QAsIndex++;

        if (QAs.length < numOfQuiz && QAsIndex === QAs.length) {
            // 問題数がnumOfQuizより少ない時の処理
            setTimeout(() => {
                modalResult();
            }, 500);
        } else if (QAsIndex < numOfQuiz) {
            // 問題がまだあればこちらを実行
            setupQuiz();
        } else {
            // 問題数がnumOfQuizより多く、問題がもうなければこちらを実行
            setTimeout(() => {
                modalResult();
            }, 500);
        }
    };

    againBtn.addEventListener("click", () => {
        if (shuffleBtn == null) {
            // リロードは解答結果をリセットするため
            window.location.reload();
        }
        modal.classList.add("hidden");
        mask.classList.add("hidden");

        let lists = document.getElementsByClassName("list");
        lists = Array.from(lists);

        for (let i = 0; i < lists.length; i++) {
            lists[i].remove();
        }

        QAsIndex = 0;
        score = 0;
        answerInput.focus();
        setupQuiz();
    });

    // inputに答えを記入してエンターを押したら正誤判定
    answerInput.onkeydown = (e) => {
        errorMsg.textContent = "";
        if (e.key === "Enter" && e.shiftKey == true) {
            if (answerInput.value != "") {
                if (!e.isComposing) {
                    e.preventDefault();
                    errorMsg.textContent = "";
                    correctOrWrong();
                } else {
                    errorMsg.textContent =
                        "変換が終了していない場合は解答できません。";
                }
            } else {
                errorMsg.textContent = "空欄では解答できません。";
            }
        }
    };
    // buttonを押したら正誤判定
    btn.addEventListener("click", () => {
        if (answerInput.value != "") {
            correctOrWrong();
        }
    });
}
