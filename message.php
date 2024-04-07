<?php 
    if($_COOKIE['gosp']==''){
        header('Location: /tt.php');
    }
    else {
        require_once "headerGosp.php";
    ?>
<div id="contain">
  <aside>
    <header>
      <input type="text" placeholder="пошук">
    </header>
    <ul>
      <li>
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
        <div>
          <h2>Тест Тестович</h2>
          <h3>
            <span class="status orange"></span>
            offline
          </h3>
        </div>
    </ul>
  </aside>
  <main>
    <header>
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
      <div>
        <h2>Чат з Тестом Тестовичом</h2>
      </div>
     
    </header>
    <ul id="chat">
      <li class="you">
        <div class="entete">
          <span class="status green"></span>
          <h2>Vincent</h2>
          <h3>10:12AM, Today</h3>
        </div>
        
        <div class="message">
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
        </div>
      </li>
      <li class="me">
        <div class="entete">
          <h3>10:12AM, Today</h3>
          <h2>Vincent</h2>
          <span class="status blue"></span>
        </div>
       
        <div class="message">
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
        </div>
      </li>
      <li class="me">
        <div class="entete">
          <h3>10:12AM, Today</h3>

<h2>Vincent</h2>
          <span class="status blue"></span>
        </div>
        
        <div class="message">
          OK
        </div>
      </li>
      
    </ul>
    <footer>
      <textarea placeholder="Type your message"></textarea>
      <a href="#">Надіслати</a>
    </footer>
  </main>
</div>



<style>

*{
  box-sizing:border-box;
}

#contain{
  
  height:80vh;;
  background:#eff3f7;
  
  font-size:0;
  border-radius:5px;
  overflow:hidden;
  width: 100%;
  margin: 0;
  padding: 0;
}
aside{
  width:20%;
  height:100vh;;
  background-color:#3b3e49;
  display:inline-block;
  font-size:15px;
  vertical-align:top;
  position: fixed;
  top: 10%;
  left: 0;
  
}
main{
  width:100%;
  height:100%;
 
  font-size:15px;
  top: 10%;
  left: 100%;
}

aside header{
  padding:30px 20px;
}
aside input{
  width:100%;
  height:50px;
  line-height:50px;
  padding:0 50px 0 20px;
  background-color:#5e616a;
  border:none;
  border-radius:3px;
  color:#fff;
  background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
  background-repeat:no-repeat;
  background-position:170px;
  background-size:40px;
}
aside input::placeholder{
  color:#fff;
}
aside ul{
  padding-left:0;
  margin:0;
  list-style-type:none;
  overflow-y:scroll;
  height:690px;
}
aside li{
  padding:10px 0;
}
aside li:hover{
  background-color:#5e616a;
}
h2,h3{
  margin:0;
}
aside li img{
  border-radius:50%;
  margin-left:20px;
  margin-right:8px;
}
aside li div{
  display:inline-block;
  vertical-align:top;
  margin-top:12px;
}
aside li h2{
  font-size:14px;
  color:#fff;
  font-weight:normal;
  margin-bottom:5px;
}
aside li h3{
  font-size:12px;
  color:#7e818a;
  font-weight:normal;
}

.status{
  width:8px;
  height:8px;
  border-radius:50%;
  display:inline-block;
  margin-right:7px;
}
.green{
  background-color:#58b666;
}
.orange{
  background-color:#ff725d;
}
.blue{
  background-color:#6fbced;
  margin-right:0;
  margin-left:7px;
}
main header{
  height:110px;
  padding:30px 20px 30px 300px;
  left: 100px;
}
main header > *{
  display:inline-block;
  vertical-align:top;
}
main header img:first-child{
  border-radius:50%;
}
main header img:last-child{
  width:24px;
  margin-top:8px;
}
main header div{
  margin-left:10px;
  margin-right:145px;
}
main header h2{
  font-size:16px;
  margin-bottom:5px;
}
main header h3{
  font-size:14px;
  font-weight:normal;
  color:#7e818a;
}
#chat{
  padding-left:0;
  margin:0;
  list-style-type:none;
  overflow-y:scroll;
  height: 50%;
  border-top:2px solid #fff;
  border-bottom:2px solid #fff;
 right: 0px;
  position: fixed;
  top: 30%;
  left: 20%;
}
#chat li{
  padding:10px 30px;
}
#chat h2,#chat h3{
  display:inline-block;
  font-size:13px;
  font-weight:normal;
}
#chat h3{
  color:#bbb;
}
#chat .entete{
  margin-bottom:5px;
}
#chat .message{
  padding:20px;
  color:#fff;
  line-height:25px;
  max-width:90%;
  display:inline-block;
  text-align:left;
  border-radius:5px;
}
#chat .me{
  text-align:right;
}
#chat .you .message{
  background-color:#58b666;
}
#chat .me .message{
  background-color:#6fbced;
}
main footer{
  height:155px;
  padding:353px 30px 10px 252px
}
main footer textarea{
  resize:none;
  border:none;
  display:block;
  width:100%;
  height:80px;
  border-radius:3px;
  padding:20px;
  font-size:13px;
  margin-bottom:13px;
}
main footer textarea::placeholder{
  color:#ddd;
}
main footer img{
  height:30px;
  cursor:pointer;
}
main footer a{
  text-decoration:none;
  text-transform:uppercase;
  font-weight:bold;
  color:#6fbced;
  vertical-align:top;
  margin-left:85%;
  margin-top:5px;
  display:inline-block;
}
</style>
    <?php  }require_once "footer.php";?>