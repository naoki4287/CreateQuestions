{
    const input = document.getElementById("input");
    const btn = document.getElementById("btn");
    const QAs = question_answers;
    console.log(QAs);
    const QAsLength = QAs.length;
    let QAsIndex = 0;
    let score = 0;
    let userAnswer = [];

    const setupQuiz = () => {
        document.getElementById("question").textContent =
            QAs[QAsIndex].question;
        // inputの中を初期化
        input.addEventListener("focus", () => {
            input.value = "";
        });
        console.log(QAsIndex);
    };
    setupQuiz();

    const correctOrWrong = () => {
        userAnswer[QAsIndex] = input.value;
        console.log(userAnswer[QAsIndex]);
        if (QAs[QAsIndex].answer === userAnswer[QAsIndex]) {
            alert("正解!");
            score++;
        } else {
            alert("不正解!");
        }
        console.log(userAnswer);
        QAsIndex++;

        if (QAsIndex < QAsLength) {
            // 問題がまだあればこちらを実行
            setupQuiz();
        } else {
          // 問題がもうなければこちらを実行
            // window.alert(
            //     "終了！あなたの正解数は" + score + "/" + QAsLength + "です！"
            // );
            window.location.href = '/result';
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
