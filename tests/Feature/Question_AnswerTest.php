<?php

namespace Tests\Feature;

use App\Models\question_answer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Question_AnswerTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_question_answer()
  {
    $question_answers = [
      'question' => 'red',
      'answer' => '赤',
      'title_id' => 1,
      'user_id' => 2,
    ];

    // モデルの作成
    $question_answer = new question_answer();
    $question_answer->fill($question_answers)->save();
    $this->assertDatabaseHas('question_answers', $question_answers);

    // モデルの更新
    $question_answer->question = 'green';
    $question_answer->answer = '緑';
    $question_answer->save();
    $this->assertDatabaseMissing('question_answers', $question_answers);
    $question_answers['question'] = 'green';
    $question_answers['answer'] = '緑';
    $this->assertDatabaseHas('question_answers', $question_answers);

    // モデルの削除
    $question_answer->delete();
    // $this->assertDatabaseMissing('question_answers', $question_answers);
  }
}
