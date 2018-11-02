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
  },
  methods: {
    pageView(data) {
      event.preventDefault()
      $("#lists").toggle(800)
      view.getData(data)
    }
  },
})

var view = new Vue({
  el: '#view',
  data:{
    view: {
      board_id: '',
      contents: '',
      created_time: '',
      creator: '',
      passwd: '',
      title: '',
    },
  },
  mounted: function() {
  },
  methods: {
    getData(data) {
      console.log(data)
      this.view = data
    }
  },
})
