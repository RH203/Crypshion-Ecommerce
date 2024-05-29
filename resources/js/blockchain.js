import Web3 from "web3";

async function connectWallet() {
  if (window.ethereum) {
    await window.ethereum.request({ method: "eth_requestAccounts" });
    window.web3 = new Web3(window.ethereum);

    var accounts = await web3.eth.getAccounts();
    window.account = accounts[0];
    document.getElementById("address").textContent = account;
    document.getElementById("connect").className = "hidden";
    document.getElementById("hide-address").className = "block mb-5";
    document.getElementById("checkout-crypto").className = "block py-3 font-semibold text-center text-white rounded-lg bg-primaryBg";
  } else {
    alert("Yourn't install Metamask, Please Install Metamask");
    window.open("https://metamask.io/download.html");
  }
}

document.addEventListener("connect-wallet-event", () => {
  // console.log('Test clicked');
  connectWallet();
});
// console.log("Test");
