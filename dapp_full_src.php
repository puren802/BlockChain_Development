<?php

 

 

 

$servername = "localhost";

 

 

 

$username = "root";

 

 

 

$password = "qwerasdf";

 

 

 

$dbname = "test";

 

 

 

 

 

 

 

// Create connection

 

 

 

$conn = new mysqli($servername, $username, $password,$dbname);

 

 

 

 

 

 

 

// Check connection

 

 

 

if (!$conn) {

 

    die("Connection failed: " . $conn->connect_error);

 

} 

 

 

 

$sql="SELECT * FROM test order by id desc lIMIT 1";

 

 

 

$result = $conn->query($sql);

 

 

 

$row = mysqli_num_rows($result);

 

 

 

mysqli_data_seek($result,$row-1);

 

 

 

$data = mysqli_fetch_array($result);

 

 

 

echo "id is :". $data[id];

 

 

 

echo "<br>";

 

 

 

$sql2="SELECT * FROM test Order by id DESC LIMIT 1";

 

 

 

$result2=mysqli_query($conn,$sql2);

 

 

 

$array = mysqli_fetch_array($result2);

 

 

 

//$array[LATEST_ACCOUNT_NUM] = stripslashes($array[uid]);

 

 

 

$val = $array[uid];

 

 

 

$val2 = $array[DEPOSIT];

 

 

 

$val3 = $array[WITHDRAW];

 

 

 

$str1 = "DEPOSIT";

 

 

 

$str2 = "WITHDRAW";

 

 

 

$val4 = "";

 

 

 

echo "last uid is : ".$val;

 

 

 

echo "last money in is : ".$val2;

 

 

 

echo "last money out is : ".$val3;

 

 

 

if($val2 == 0){

 

  if($val3 == 0){

 

    $val4 = "REMAIN";

 

  }

 

  else{

 

    $val2 = $val3;

 

    $val4 = $str2;

 

    }

}

    else{

      $val4 = $str1;

    }

 

 

echo "usage is : ". $val4;

 

 

 

 

 

 

 

?>

 

 

 

 

 

 

 

<!DOCTYPE html>

 

 

 

<html>

 

 

 

<head>

 

 

 

  <meta charset="UTF-8">

 

 

 

  <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">

 

 

 

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.2.3/milligram.min.css">

 

 

 

  <title> Dapp </title>

 

 

 

  <style>

 

 

 

    body {margin-left:50px;}

 

 

 

    #num {font-size:180%; margin-right:10px;}

 

 

 

    #text {font-size:160%; margin-right:10px;}

 

 

 

    #nowtime {font-size:180%; margin-right:10px;}

 

 

 

    #autoget {width: 180px; margin-right:10px; text-align:right;}

 

 

 

    #newValue1 {width: 180px; margin-right:10px; text-align:right;}

 

 

 

    #newValue2 {width: 180px; margin-right:10px; text-align:right;}

 

 

 

    #newValue3 {width: 180px; margin-right:10px; text-align:right;}

 

 

 

  </style>

 

 

 

</head>

 

 

 

<body>

 

 

 

<h3>Dapp</h3>

 

 

 

<ul>

 

 

 

  <li>컨트랙트 주소: <span id="contractAddr"></span></li>

 

 

 

  <li>내 어카운트 주소: <span id="accountAddr"></span></li>

 

 

 

  <li>컨트랙트에 저장된 값:<br> UID,Money : <span id="num"></span> <br>

 

 

 

  time : <span id="nowtime">

 

 

 

   <script>

 

 

 

   document.write(new Date().toLocaleString());

 

 

 

 </script>

 

 

 

   </span>

 

 

 

  <button onclick="get()">새로고침</button> (현재블록: <span id="lastBlock"></span>)</li>

 

 

 

<input type="button" value="generate" onclick="getdb()">

 

 

 

<li>UID:<input id="newValue1" type="text">Money:<input id="newValue2" type="text">For purpose:<input id="newValue3" type="text">

 

 

 

  <button onclick="set()">Upload</button>

 

 

 

  <div id="result"></div></li>

 

 

  <li>새 값을 저장한 후 팬딩 트랜잭션이 블록에 포함되면 자동으로 페이지가 업데이트 됩니다.</li>

 

 

 

</ul>

 

 

 

컨트랙트 소스<script src="https://gist.github.com/puren802/cfa930d530ba8b43cf6f95ca0406d9a7.js"></script>

 

 스크립트 소스<script src="https://gist.github.com/puren802/972e09e1bc0f0421b8d7683092b224dd.js"></script>

 

<!--script>

 

 

 

var str2 = 'abc,def,ghi';

 

 

 

var spl2 = str2.split(',');

 

 

 

for(var i in spl2){

 

 

 

document.write('<p>'+spl2[i]+'</p>');

 

 

 

}

 

 

 

</script-->

 

 

 

 

 

 

 

<br>

 

 

 

 

 

 

 

<script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>

 

 

 

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

 

 

 

<script>

 

 

 

var contractAddress = '0x5929e104ab1b186aa56ee337168402d0f12ba1d2';

 

 

 

var abi = [

  {

    "constant": true,

    "inputs": [],

    "name": "get",

    "outputs": [

      {

        "name": "",

        "type": "string"

      },

      {

        "name": "",

        "type": "string"

      },

      {

        "name": "",

        "type": "string"

      }

    ],

    "payable": false,

    "stateMutability": "view",

    "type": "function"

  },

  {

    "constant": false,

    "inputs": [

      {

        "name": "uid",

        "type": "string"

      },

      {

        "name": "money",

        "type": "string"

      },

      {

        "name": "prp",

        "type": "string"

      }

    ],

    "name": "set",

    "outputs": [],

    "payable": false,

    "stateMutability": "nonpayable",

    "type": "function"

  }

]

 

 

 

var testContract;

 

 

 

var test;

 

 

 

 

 

 

 

window.addEventListener('load', function() {

 

 

 

 

 

 

 

  // Checking if Web3 has been injected by the browser (Mist/MetaMask)

 

 

 

  if (typeof web3 !== 'undefined') {

 

 

 

    // Use Mist/MetaMask's provider

 

 

 

    window.web3 = new Web3(web3.currentProvider);

 

 

 

  } else {

 

 

 

    console.log('No web3? You should consider trying MetaMask!')

 

 

 

    // fallback - use your fallback strategy (local node / hosted node + in-dapp id mgmt / fail)

 

 

 

    window.web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));

 

 

 

  }

 

 

 

  // Now you can start your app & access web3 freely:

 

 

 

  startApp();

 

 

 

});

 

 

 

 

 

 

 

function startApp() {

 

 

 

  testContract = web3.eth.contract(abi);

 

 

 

  test = testContract.at(contractAddress);

 

 

 

  document.getElementById('contractAddr').innerHTML = getLink(contractAddress);

 

 

 

  web3.eth.getAccounts(function(e,r){

 

 

 

    document.getElementById('accountAddr').innerHTML = getLink(r[0]);

 

 

 

  });

 

 

 

 

 

 

 

  get();

 

 

 

}

 

 

 

 

 

 

 

function getLink(addr) {

 

 

 

  return '<a target="_blank" href=https://testnet.etherscan.io/address/' + addr + '>' + addr +'</a>';

 

 

 

}

 

 

 

 

 

 

 

function get() {

 

 

 

  test.get(function(e,r){

 

 

 

  document.getElementById('num').innerHTML=r;

 

 

 

  //document.getElementById('text').innerHTML=r;

 

 

 

  });

 

 

 

  web3.eth.getBlockNumber(function(e,r){

 

 

 

    document.getElementById('lastBlock').innerHTML = r;

 

 

 

  });

 

 

 

  var d = new Date().toLocaleString();

 

 

 

  document.getElementById("nowtime").innerHTML = d;

 

 

 

}

 

 

 

 

 

 

 

function set() {

 

 

 

  var newValue1 = document.getElementById('newValue1').value;

 

 

 

  var newValue2 = document.getElementById('newValue2').value;

 

 

 

  var newValue3 = document.getElementById('newValue3').value;

 

 

 

  var txid

 

 

 

  test.set(newValue1,newValue2,newValue3,function(e,r){

 

 

 

    document.getElementById('result').innerHTML = 'Transaction id: ' + r + '<span id="pending" style="color:red;">(Pending)</span>';

 

 

 

    txid = r;

 

 

 

  });

 

 

 

  var filter = web3.eth.filter('latest');

 

 

 

  filter.watch(function(e, r) {

 

 

 

    get();

 

 

 

    web3.eth.getTransaction(txid, function(e,r){

 

 

 

      if (r != null && r.blockNumber > 0) {

 

 

 

        document.getElementById('pending').innerHTML = '(기록된 블록: ' + r.blockNumber + ')';

 

 

 

        document.getElementById('pending').style.cssText ='color:green;';

 

 

 

        document.getElementById('num').style.cssText ='color:green; font-size:200%;';

 

 

 

        filter.stopWatching();

 

 

        cleartext();

 

        refresh();

      }

 

 

 

   });

 

 

 

 });

 

 

 

}

 

 

 

 

 

 

 

function getdb(){

 

 

 

  var getval=document.getElementById("newValue1");

 

 

 

  var getval2=document.getElementById("newValue2");

 

 

 

  var getval3=document.getElementById("newValue3");

 

 

 

  //var getval2=document.getElementById("autoget");

 

 

 

  getval.value = "<?php echo $val;?>";

 

 

 

  getval2.value = "<?php echo $val2;?>";

 

 

 

  getval3.value = "<?php echo $val4;?>";

 

 

 

  //getval2.value = "<?php echo $val;?>";

 

 

 

}

 

function cleartext(){

 

 

  document.getElementById("newValue1").value = "";

 

 

  document.getElementById("newValue2").value = "";

 

 

  document.getElementById("newValue3").value = "";

 

 

 

}

 

 function refresh(){

 

  window.location.reload();

 

 }

 

 

 

 

 

</script>

 

 

 

</body>

 

 

 

</html>