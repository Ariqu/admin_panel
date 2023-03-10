<?php

//echo "Server error." . "<br>";
//echo "Return to login: ";
//echo "<a href='login_admin.php'>click here</a>";

?>
<div id=container>
  <img src="https://raw.githubusercontent.com/weixiong15/PHP-Bookstore-Website-Example/master/bookstore/image/logo.gif" id="avatar">
  <div class="type-wrap">
    <span id="typed" style="white-space:pre;" class="typed"></span>
  </div>
  <p><a href='login_admin.php'>powrót</a></p>
</div>
<script>
    $("#typed").typed({
  strings: [
    "Hello, there.",
    "Website Under Construction!",
    "Everything Is Fine :)"
  ],
  typeSpeed: 20,
  startDelay: 0,
  backSpeed: 20,
  backDelay: 1000,
  loop: true,
  cursorChar: "|",
  contentType: "html"
});

</script>
<style>
    body {
  background: #eee;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  cursor: default;
  letter-spacing: 5px;
  font-family: "M PLUS Code Latin", sans-serif;
}
body:after {
  content: "";
  background-image: url(https://raw.githubusercontent.com/weixiong15/PHP-Bookstore-Website-Example/master/bookstore/image/bg.gif);
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}
#container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  width: 100%;
}
#avatar {
  box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.25);
  border-radius: 5%;
  width: 250px;
  animation: bounce cubic-bezier(0.19, 1, 0.22, 1) 0.2s alternate infinite;
  -webkit-animation: bounce cubic-bezier(0.19, 1, 0.22, 1) 0.2s alternate
    infinite;
}
@keyframes bounce {
  to {
    transform: translateY(-5px) scale(1);
    box-shadow: 0 0 10px #fff, 0 0 20px #dc2537, 0 0 30px #dc2537,
      0 0 40px #dc2537, 0 0 70px #f14658, 0 0 80px #f14658;
  }
}
@-webkit-keyframes bounce {
  to {
    -webkit-transform: translateY(-5px) scale(1);
    box-shadow: 0 0 10px #fff, 0 0 20px #dc2537, 0 0 30px #dc2537,
      0 0 40px #dc2537, 0 0 70px #f14658, 0 0 80px #f14658;
  }
}
p {
  color: rgba(0, 0, 0, 0.25);
  text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.75);
  font-family: "Libre Barcode 39 Text", cursive;
  font-size: 2.2em;
}

@import url("https://fonts.googleapis.com/css?family=Work+Sans");
.type-wrap {
  font-size: 50px;
  padding: 20px;
  color: #fff;
  margin-top: 2%;
}
.typed-cursor {
  opacity: 1;
  -webkit-animation: blink 0.7s infinite;
  -moz-animation: blink 0.7s infinite;
  animation: blink 0.7s infinite;
}
@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

</style>
