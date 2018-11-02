<script>var listCount =<?=$listCount?></script>
<div id="lists">
  <table class="table">
    <thead>
      <tr>
        <th width="15%">글 번호</th>
        <th width="40%">글 제목</th>
        <th width="20%">작성자</th>
        <th width="25%">작성시간</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(list,key) in lists" v-cloak>
        <td>{{listCount-key}}</td>
        <td><a href="#" @click.prevent="pageView(list)">{{list['title']}}</a></td>
        <td>{{list['creator']}}</td>
        <td>{{list['created_time']}}</td>
      </tr>
    </tbody>
  </table>
  <div id="pagination">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">&laquo;</a>
      </li>
      <li class="page-item"><a class="page-link" href="#1">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">&raquo;</a>
      </li>
    </ul>
  </div>
</div>

<div id="view">
  {{view.board_id}}<br>
  {{view.contents}}<br>
  {{view.created_time}}<br>
  {{view.creator}}<br>
  {{view.passwd}}<br>
  {{view.title}}<br>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src= "https://unpkg.com/vue@2.5.17/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
<script src= "/application/libraries/lib/js/vue_board_aa.js"></script>
