// const { remove } = require("lodash");

{
    const question = document.getElementById("question");
    const modal = document.getElementById("modal");
    const result = document.getElementById("result");
    const resultList = document.getElementById("resultList");
    const errorMsg = document.getElementById("errorMsg");
    const answerInput = document.getElementById("answerInput");
    const btn = document.getElementById("btn");
    const againBtn = document.getElementById("againBtn");
    const QAs = question_answers;
    const optionInput = setting["optionInput"];
    const shuffleInput = setting["shuffleInput"];
    const alertInput = setting["alertInput"];
    let QAsIndex = 0;
    let score = 0;
    let userAnswers = [];

    const shuffle = (QAs) => {
        for (let i = QAs.length - 1; i > 0; i--) {
            const shuffledIndex = Math.floor(Math.random() * (i + 1));
            [QAs[shuffledIndex], QAs[i]] = [QAs[i], QAs[shuffledIndex]];
        }
        return QAs;
    };

    if (performance.navigation.type === 0) {
        if (shuffleInput === "true") {
            shuffle(QAs);
        }
    }

    const modalResult = () => {
        // 問題がもうなければこちらを実行
        modal.classList.remove("hidden");
        mask.classList.remove("hidden");
        if (QAs.length < optionInput) {
            result.textContent = `正答率は${score}/${QAs.length}です`;
        } else {
            result.textContent = `正答率は${score}/${optionInput}です`;
        }

        // resultのモーダルウィンドウ
        for (let i = 0; i < optionInput; i++) {
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
                    "<span style='float:right;'><i class='fa-regular fa-circle'></i></span>";
            } else {
                Adiv.innerHTML +=
                    "<span style='float:right; color:red;'><i class='fa-solid fa-xmark fa-lg'></i></span>";
            }
        }
    };

    const setupQuiz = () => {
        question.textContent = QAs[QAsIndex].question;
        answerInput.value = "";
    };
    setupQuiz();

    const correctOrWrong = () => {
        userAnswers[QAsIndex] = answerInput.value;
        if (QAs[QAsIndex].answer === userAnswers[QAsIndex]) {
            if (alertInput === "false") {
                alert("正解!");
            }
            score++;
        } else {
            if (alertInput === "false") {
                alert("不正解!");
            }
        }
        QAsIndex++;

        if (QAs.length < optionInput && QAsIndex === QAs.length) {
          //    console.log(QAsIndex);
            console.log("1つ目を通りました");
            modalResult();
        } else if (QAsIndex < optionInput) {
            // 問題がまだあればこちらを実行
            setupQuiz();
        } else {
          // else いらんかも
            // 問題がもうなければこちらを実行
            modalResult();
        }
    };

    againBtn.addEventListener("click", () => {
        if (shuffleInput !== "true") {
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
        answerInput.focus();
        setupQuiz();
    });

    // inputに答えを記入してエンターを押したら正誤判定
    answerInput.onkeydown = (e) => {
        if (e.key === "Enter" && e.shiftKey == true) {
            if (!e.isComposing) {
                if (answerInput.value != "") {
                    errorMsg.textContent = "";
                    correctOrWrong();
                }
            } else {
                errorMsg.textContent =
                    "変換が終了していない場合は解答できません。";
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
