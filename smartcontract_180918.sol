pragma solidity ^0.4.25;
contract test{
  //address sender;
  //address receier;
  string num="";
  string message;
  string use;
  function set(string uid, string money, string prp){
      //sender=msg.sender;
      //receiver=receiver;
      num=uid;
      message=money;
      use=prp;
    }
    function get() constant returns(string, string, string){
      //return (receiver==msg.sender)?(sender,message,true):(msg.sender,"",false);
      return (num,message,use);
        }
    }