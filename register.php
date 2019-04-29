<html>
<head>
<title>test</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-database.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDefx9owB03dGBnxkBSyGl_KRDKx-bZhPc",
    authDomain: "testlilylisa.firebaseapp.com",
    databaseURL: "https://testlilylisa.firebaseio.com",
    projectId: "testlilylisa",
    storageBucket: "testlilylisa.appspot.com",
    messagingSenderId: "193330080498"
  };
  firebase.initializeApp(config);
</script>
<script>

function saveData(){
    var username = document.getElementById('txtUsername');
    var password = document.getElementById('txtPassword');
    var conpassword = document.getElementById('txtConPassword');
    var name = document.getElementById('txtName');
    var status = document.getElementById('ddlStatus');
    insertData(txtUsername.value, txtPassword.value, txtConPassword.value, txtName.value, ddlStatus.value)
}

function insertData(username, password, conpassword, name, status){
    var firebaseRef = firebase.database().ref("user");
    firebaseRef.push({
        txtUsername: username,
        txtPassword: password,
        txtConPassword: conpassword,
        txtName: name,
        ddlStatus: status
    });
    console.log("Insert Success");
}

</script>

  
</head>
<body>
<form name="form1" method="post">
  Register Form <br>
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;Username</td>
        <td width="180">
          <input name="txtUsername" type="text" id="txtUsername" size="20">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword">
        </td>
      </tr>
      <tr>
        <td>&nbsp;Name</td>
        <td><input name="txtName" type="text" id="txtName" size="35"></td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td>
          <select name="ddlStatus" id="ddlStatus">
            <option value="ADMIN">ADMIN</option>
            <option value="USER">USER</option>
          </select>
</td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="Save" oncilck="saveData()">
</form>
</body>
</html>
