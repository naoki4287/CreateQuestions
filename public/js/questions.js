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
    let QAsLength = QAs.length;
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
        console.log(performance.navigation.type);
        if (shuffleInput === "true") {
            shuffle(QAs);
        }
    }

    console.log(shuffleInput);
    const setupQuiz = () => {
        question.textContent = QAs[QAsIndex].question;
        answerInput.value = "";
    };
    setupQuiz();

    const correctOrWrong = () => {
        userAnswers[QAsIndex] = answerInput.value;
        console.log(userAnswers[QAsIndex]);
        if (QAs[QAsIndex].answer === userAnswers[QAsIndex]) {
            if (alertInput == true) {
                alert("正解!");
            }
            score++;
        } else {
            if (alertInput == true) {
                alert("不正解!");
            }
        }
        QAsIndex++;

        if (QAsIndex < QAsLength) {
            // 問題がまだあればこちらを実行
            setupQuiz();
        } else {
            // 問題がもうなければこちらを実行
            modal.classList.remove("hidden");
            mask.classList.remove("hidden");
            result.textContent = `正答率は${score}/${QAsLength}です`;

            // resultのモーダルウィンドウ
            for (let i = 0; i < QAsLength; i++) {
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
        }
    };

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
