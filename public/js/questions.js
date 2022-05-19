{
    const question = document.getElementById("question");
    const modal = document.getElementById("modal");
    const result = document.getElementById("result");
    const resultList = document.getElementById("resultList");
    const input = document.getElementById("input");
    const btn = document.getElementById("btn");
    const againBtn = document.getElementById("againBtn");
    const QAs = question_answers;
    const QAsLength = QAs.length;
    let QAsIndex = 0;
    let score = 0;
    let userAnswers = [];

    const setupQuiz = () => {
        question.textContent = QAs[QAsIndex].question;
        console.log(question.textContent);
        // inputの中を初期化
        input.addEventListener("focus", () => {
            input.value = "";
        });
    };
    setupQuiz();

    const correctOrWrong = () => {
        userAnswers[QAsIndex] = input.value;
        if (QAs[QAsIndex].answer === userAnswers[QAsIndex]) {
            alert("正解!");
            score++;
        } else {
            alert("不正解!");
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
                // Adiv.syle.color = 'red';
                Qdiv.textContent = `問題：${QAs[i].question}`;
                Adiv.textContent = `解答：${userAnswers[i]}`;
                if (QAs[i].answer === userAnswers[i]) {
                  Adiv.innerHTML +=  "<span style='float:right;'><i class='fa-regular fa-circle'></i></span>";
                } else {
                  Adiv.innerHTML +=  "<span style='float:right; color:red;'><i class='fa-solid fa-xmark fa-lg'></i></span>";
                }
                hr.textContent = "<hr>";
            }

            againBtn.addEventListener("click", () => {
                window.location.reload();
                modal.classList.add("hidden");
                mask.classList.add("hidden");
                QAsIndex = 0;
                setupQuiz();
            });
        }
    };

    // inputに答えを記入してエンターを押したら正誤判定
    input.onkeydown = (e) => {
        if (e.key === "Enter") {
            correctOrWrong();
        }
    };
    // buttonを押したら正誤判定
    btn.addEventListener("click", () => {
        correctOrWrong();
    });
}
