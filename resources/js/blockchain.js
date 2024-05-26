import Web3 from "web3";

async function connectWallet() {
  if (window.ethereum) {
      await window.ethereum.request({ method: "eth_requestAccounts" });
      window.web3 = new Web3(window.ethereum);

      var accounts = await web3.eth.getAccounts();
      window.account = accounts[0];
      document.getElementById("address-info").textContent = account;
      initContract();
  } else {
      alert("Please download Metamask");
      window.location.href = "https://metamask.io/download.html";
  }
}

var connectBtn = document.getElementById('');
