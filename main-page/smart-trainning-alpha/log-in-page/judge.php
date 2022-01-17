<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>log in</title>
  <link rel="stylesheet" href="./style.css">
    <style>
        body {
  background: linear-gradient(to right, #ff47a1 0%, #ff9f4d 100%);
}

#sky {
  width: 100vw;
  height: 100vh;
  position: fixed;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

#shootingstars {
  margin: 0;
  padding: 0;
  width: 150vh;
  height: 100vw;
  position: fixed;
  overflow: hidden;
  transform: translatex(calc(50vw - 50%)) translatey(calc(50vh - 50%))
    rotate(120deg);
}

.wish {
  height: 2px;
  top: 300px;
  width: 100px;
  margin: 0;
  opacity: 0;
  padding: 0;
  background-color: white;
  position: absolute;
  background: linear-gradient(-45deg, white, rgba(0, 0, 255, 0));
  filter: drop-shadow(0 0 6px white);
  overflow: hidden;
}
.alert {
  text-align: center;
}
.alert2 {
  margin: auto;
  position: absolute;
  top: 100px;
  left: 50%;
  transform: translate(-50%, -50%);
}
    </style>
</head>
<!-- partial:index.partial.html -->
<div id="root" />
<!-- partial -->
<script src='/js/react.production.min.js'></script>
<script src='/js/react-dom.production.min.js'></script>
<script src='/js/anime.min.js'></script><script  src="./script.js"></script>
<script>
    function _defineProperty(obj, key, value) {if (key in obj) {Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true });} else {obj[key] = value;}return obj;} // Twinkling Night Sky by Sharna

class StarrySky extends React.Component {constructor(...args) {super(...args);_defineProperty(this, "state",
    {
      num: 60,
      vw: Math.max(document.documentElement.clientWidth, window.innerWidth || 0),
      vh: Math.max(document.documentElement.clientHeight, window.innerHeight || 0) });_defineProperty(this, "starryNight",

    () => {
      anime({
        targets: ["#sky .star"],
        opacity: [
        {
          duration: 700,
          value: "0" },

        {
          duration: 700,
          value: "1" }],


        easing: "linear",
        loop: true,
        delay: (el, i) => 50 * i });

    });_defineProperty(this, "shootingStars",
    () => {
      anime({
        targets: ["#shootingstars .wish"],
        easing: "linear",
        loop: true,
        delay: (el, i) => 1000 * i,
        opacity: [
        {
          duration: 700,
          value: "1" }],


        width: [
        {
          value: "150px" },

        {
          value: "0px" }],


        translateX: 350 });

    });_defineProperty(this, "randomRadius",
    () => {
      return Math.random() * 0.7 + 0.6;
    });_defineProperty(this, "getRandomX",
    () => {
      return Math.floor(Math.random() * Math.floor(this.state.vw)).toString();
    });_defineProperty(this, "getRandomY",
    () => {
      return Math.floor(Math.random() * Math.floor(this.state.vh)).toString();
    });}
  componentDidMount() {
    this.starryNight();
    this.shootingStars();
  }
  render() {
    const { num } = this.state;
    return /*#__PURE__*/(
      React.createElement("div", { id: "App" }, /*#__PURE__*/
      React.createElement("svg", { id: "sky" },
      [...Array(num)].map((x, y) => /*#__PURE__*/
      React.createElement("circle", {
        cx: this.getRandomX(),
        cy: this.getRandomY(),
        r: this.randomRadius(),
        stroke: "none",
        strokeWidth: "0",
        fill: "white",
        key: y,
        className: "star" }))), /*#__PURE__*/



      React.createElement("div", { id: "shootingstars" },
      [...Array(60)].map((x, y) => /*#__PURE__*/
      React.createElement("div", {
        key: y,
        className: "wish",
        style: {
          left: `${this.getRandomY()}px`,
          top: `${this.getRandomX()}px` } })))));






  }}


ReactDOM.render( /*#__PURE__*/React.createElement(StarrySky, null), document.getElementById("root"));
</script>
<body>
    <?php
        //用于检查登陆的用户名和密码是否正确
        //connect to database
        $db = mysqli_connect("localhost:3306", "www", "www", "www");
        if(!$db){
            die("Connection failed: " . mysqli_connect_error());
        }
        //get the user's input
        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
        //query the database
        $sql = "SELECT * FROM users WHERE username = '" . $user_name . "' AND password = '" . $user_password . "';";
        $result = mysqli_query($db, $sql);
        //judge the result
        if(mysqli_num_rows($result) > 0){    //如果有该用户，且密码正确
            SetCookie("username", $user_name, time()+3600, "/");
            SetCookie("password", $user_password, time()+3600, "/");     //设置cookie,作用域为/，即全局，时间为3600秒
            echo "<div class='alert'>";
            echo "<h1>Welcome, " . $user_name . "!</h1><br>";
            echo "success: user found<br>";
            $row = mysqli_fetch_array($result);
            echo "user id: " . $row['id'] . "<br>";
            echo "user name: " . $row['username'] . "<br>";
            echo "email: " . $row['email'] . "<br><br><br><br><br><br>";
            echo "you will be redirected in a second...<br>";
            echo "<script>setTimeout(function(){window.location.href='../mainpage.php';}, 3000);</script>";
            echo "</div>" . "<br>";            //输出一些基本信息
        }else{   //否则报错
            echo "<div class='alert2'>";
            echo "fail to login, please check your password";
            echo "<p>click <a href='./log-in-page.html'>here</a> to go back</p>";
            echo "</div>" . "<br>";
        }
    ?>
</body>
</html>
<script src='/js/react.production.min.js'></script>
<script src='/js/react-dom.production.min.js'></script>
<script src='/js/anime.min.js'></script><script  src="./script.js"></script>