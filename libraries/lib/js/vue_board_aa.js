// document.querySelector(".number_input").addEventListener("keypress", function (evt) {
//     if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
//     {
//         evt.preventDefault();
//     }
// });

$(document).ready(function() {
  $("#write").click(function() {
    $("#input_form").toggle(500)
  })
})

var input = new Vue({
  el: '#input_form',
  data:{
    title:'',
    creator:'',
    contents:'',
    passwd:'',
    passconf:'',
    isRun:false
  },
  methods:{
    sendPost: function() {
      if (this.isRun==true) {
        return;
      }
      this.isRun=true;
      var self = this;
      $.ajax({
        url:"/vue_board/add",
        method: "POST",
        data:{
          title:self.title,
          creator:self.creator,
          contents:self.contents,
          passwd:self.passwd,
          passconf:self.passconf
        },
        success: function(response) {
          self.isRun=false
          self.getlist()
          self.title=''
          self.creator=''
          self.contents=''
          self.passwd=''
          self.passconf=''
          if (response=="success") {
            alert('작성되었습니다.')
            lists.listCount++
          }
          else{
            alert('항목을 모두 기입해주세요')
          }
        },
        error : function(err) {
          alert(" 에러 ")
          self.isRun=false
        }
      })
    },
    getlist: function() {
      $.ajax({
        url: "/vue_board/index_data",
        method: "GET",
        dataType:"json",
        success: function(data) {
          lists.lists = data
          console.log(data)
        },
        error : function(err) {
          alert('에러요')
        }
      })
    }
  }
})
var lists = new Vue({
  el: '#lists',
  data:{
    lists : [],
    listCount: listCount
  },
  mounted: function() {
    input.getlist()
  }
})
