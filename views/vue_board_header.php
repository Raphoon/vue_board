<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/application/libraries/lib/css/vue_board_aa.css">
    <link rel="shortcut icon" type="image/png"  href="/application/libraries/lib/img/logo.ico">
    <title>
      Vue Board
    </title>
  </head>
  <body>
    <img id="logo" src="/application/libraries/lib/img/vue_logo.png" height="150" width="150">
    <h1>Vue Board</h1>
     <button type="button" id="write" class="btn btn-outline-primary">글 쓰기</button>
      <div class="card bg-light mb-3" name="write" id="input_form">
        <div class="card-body">
          <div>
            <input type="text" name="title" id="title" placeholder="제목" v-model="title">
            <input type="text" name="creator" id="creator" placeholder="작성자" v-model="creator"><br>
            <textarea name="contents" id="contents" placeholder="본문"  v-model="contents" rows="8" cols="80"></textarea><br>
            <input type="number" class="number_input" name="passwd" id="passwd" placeholder="비밀번호(4자리 숫자)" v-model="passwd">
            <input type="number" class="number_inputs" name="passconf" pattern="[0-9]" id="passconf" placeholder="비밀번호 확인" v-model="passconf">
            <button type="button" id="submit" @click="sendPost" name="button">작성</button>
          </div>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src= "/application/libraries/lib/js/vue_board_write.js"></script>
