$(function() {
     //ボタンを押すと色が変わる
     $('#change_color').click('on',function(){
         var colors = ['red', 'blue', 'yellow','white'];
         $('body').css("background-color", colors[getRandomIntInclusive(0,colors.length-1)]);
     });

     //HTMLを追加することもできる
     $('#add_hello').click('on',function(){
         var msg = '<p>hello</p>';
         $('.target_hello').append(msg);
     });

     //通信して取得したデータを元に、HTMLを追加することもできる
     $('#get_news').click('on', function(){
         $.ajax({
             url: '/api/news',
             type: 'GET',
             data: {}
         })

         .done(function(response) {
             console.log(response);
             var row;
             for(var i=0; i<Object.keys(response).length; i++){
                 row = row + "<tr>"
                 row = row + "<td>"+ response[i].id +"</td>";
                 row = row + "<td>"+ response[i].title +"</td>";
                 row = row + "<td>"+ response[i].body +"</td>";
                 row = row + "</tr>";
             }
             $('.news').append(row);
         })

         .fail(function() {
             alert('エラー');
         });
     })
     
     //add news
     $('#add_news').click('on',function() {
         
         var parms = {
             'title':'テスト','body':'お願いしまーす'
         };
         
         $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
         })
         
         $.ajax({
             url: '/api/addnews',
             type:'POST',
             contentType:"application/json",
             data:JSON.stringify(parms)
         })

         .done(function(response) {
             console.log(response);
         })
         
         .fail(function() {
             alert('エラー');
         });
     })
     
     //submit
     $('#submit_news').click('on',function(){
       
       var title = document.getElementById('title').value;
       var body = document.getElementById('body').value;
       console.log(title);
       console.log(body);
       
       $.ajax({
           url:'/api/submit',
           type:'POST',
           contentType:'application/json',
           data:JSON.stringify({
               title:title,body:body
           })
           
       })
        .done(function(response) {
             console.log(response);
         })
         
         .fail(function() {
             alert('エラー');
         });
     })
 });

 /*
   min-max間のランダムな整数を返す
 */
 function getRandomIntInclusive(min, max) {
     min = Math.ceil(min);
     max = Math.floor(max);
     return Math.floor(Math.random() * (max - min + 1)) + min; //The maximum is inclusive and the minimum is inclusive
 }


