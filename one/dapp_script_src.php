<script>
var contractAddress = '0x5929e104ab1b186aa56ee337168402d0f12ba1d2';
//var contractAddress = '';
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
      }
   });
 });
}
function getdb(){
  var getval=document.getElementById("newValue1");
  var getval2=document.getElementById("newValue2");
  var getval3=document.getElementById("newValue3");
	
  getval.value = "<?php echo $val;?>";
  getval2.value = "<?php echo $val2;?>";
  getval3.value = "<?php echo $val4;?>";
}
</script>