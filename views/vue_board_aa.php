<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/application/libraries/lib/css/vue_board_aa.css">
    <title>
      Vue Board
    </title>
  </head>
  <body>
    <h1>Vue Board</h1>
    <form>
      <div class="card bg-light mb-3" name="write">
        <div class="card-body">
          <h4 class="card-title">글 쓰기</h4>
          <div id="input">
            <input type="text" name="title" id="title" placeholder="제목"   v-model="title">
            <input type="text" name="creator" id="creator" placeholder="작성자" v-model  ="creator"><br>
            <textarea name="contents" id="contents" placeholder="본문"  v-model="contents" rows="8" cols="80"></textarea><br>
            <button type="button" name="button">작성</button>
            <p>{{title}}<br>{{creator}}<br>{{contents}}</p>
          </div>
        </div>
      </div>
    </form>
    <div id="lists">
      
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src= "https://unpkg.com/vue@2.5.17/dist/vue.js"></script>
  <script src= "/application/libraries/lib/js/vue_board_aa.js"></script>
  </body>
</html>
