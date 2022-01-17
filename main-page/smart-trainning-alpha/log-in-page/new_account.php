<style>
        body {
            background-color: rgb(255,215,0);
        }
        h1 {
            text-align: center;
        }
</style>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>changing password...</title>
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
</body>
</html>

<?php
    // connect to database
    $conn = mysqli_connect("localhost:3306", "www", "www", "www");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // get data from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // check if username already exists
    //make sure username dosn't contain any special characters
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "<div style='position:absolute;'>";
        echo "Username must contain only letters and numbers";
        //echo a link to redirect to the login page
        echo "<a href='log-in-page.html'>Go back to log in page</a>";
        exit();
    }
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Username already exists</h1>";
        echo "<div style='position: absolute'>";
        echo "faild: Username already exists";
        echo "<br>";
        echo "<a href='new-account.html'>try again</a>";
        echo "</div>";
    } else {
        // insert new user into database
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<h1>successful!</h1>";
            echo "<div style='position: absolute'>";
            echo "New record created successfully";
            echo "<br>";
            echo "username: " . $username;
            echo "<br>";
            echo "password: " . $password;
            echo "<br>";
            echo "email: " . $email;
            echo "<br>";
            echo "<a href='./log-in-page.html'>log in</a>";
            echo "</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    //TODO: 发送邮件，验证邮箱
    // close connection
    mysqli_close($conn);
    // to delete an account: delete from users where username='student1';

?>