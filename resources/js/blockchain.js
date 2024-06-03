import Web3, { errors } from "web3";
import data from "../../dataECP/dataECP.json";

const ADDRS = data.ADDRS;
const addrs = data.addrs;
const ABI = data.ABI;

async function connectWallet() {
  if (window.ethereum) {
    await window.ethereum.request({ method: "eth_requestAccounts" });
    window.web3 = new Web3(window.ethereum);

    var accounts = await web3.eth.getAccounts();
    window.account = accounts[0];
    document.getElementById("address").textContent = account;
    document.getElementById("connect").className = "hidden";
    document.getElementById("hide-address").className = "block mb-5";
    document.getElementById("checkout-crypto").className =
      "block py-3 font-semibold text-center text-white rounded-lg bg-primaryBg";
    window.contract = new web3.eth.Contract(ABI, ADDRS);
    initContract();
  } else {
    // alert("Yourn't install Metamask, Please Install Metamask");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Yourn't install Metamask, Please Install Metamask",
    });
    window.open("https://metamask.io/download.html");
  }
}

const initContract = async () => {
  let decimals = await contract.methods.decimals().call();
  decimals = Number(decimals);

  const btnBuyA = document.getElementById("checkout-crypto");
  if (btnBuyA) {
    btnBuyA.addEventListener("click", async function () {
      const Price = total * 10 ** decimals;
      // console.log(Price);
      const swalLoading = Swal.fire({
        title: "Confirmation Transaction",
        didOpen: () => {
          Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false,
      });

      try {
        const transaction = await contract.methods
          .transfer(addrs, Price)
          .send({ from: account });

        if (transaction.status) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Transaction Success",
            showConfirmButton: false,
            timer: 1700,
          });
          setTimeout(() => {
            window.location.href = `tracking-order/${codeTrx}`;
          }, 1710);
        }
        await checkout();
        await signout();
      } catch (error) {
        if (error.message.includes("User denied transaction signature")) {
          Swal.fire({
            icon: "error",
            text: "Transaction Canceled",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          Swal.fire({
            icon: "error",
            text: "Transaction Error, pls repeat again",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      }
    });
  }
};

async function switchChain() {
  const chainId = "0x13882";
  try {
    if (window.ethereum.chainId !== chainId) {
      await window.ethereum.request({
        method: "wallet_switchEthereumChain",
        params: [{ chainId: chainId }],
      });
      connectWallet();
    }
  } catch (error) {
    if (error.code === 4902) {
      try {
        await window.ethereum.request({
          method: "wallet_addEthereumChain",
          params: [
            {
              chainId: chainId,
              rpcUrl: "https://rpc-amoy.polygon.technology",
              currencyName: "MATIC",
              blockExplorerUrl: "https://amoy.polygonscan.com",
            },
          ],
        });
        connectWallet();
      } catch (addError) {
        console.error("Error adding new chain:", addError);
      }
    } else {
      console.error("Error switching chain:", error);
    }
  }
}

document.addEventListener("connect-wallet-event", async () => {
  const result = await Swal.fire({
    title: "Are you sure?",
    text: "You want to connect your wallet",
    icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, I want to connect",
  });
  if (result.isConfirmed) {
    await connectWallet();
    await switchChain();
    await Swal.fire({
      title: "Connected!",
      text: "You are now connected to this site",
      icon: "success",
      showConfirmButton: false,
      timer: 1200,
    });
  }
});

async function signout() {
  await window.ethereum.request({
    method: "wallet_revokePermissions",
    params: [
      {
        eth_accounts: {},
      },
    ],
  });
}

async function checkout() {
  console.log("Testttt");
  Livewire.dispatch("Checkout");
}

console.log(total);

console.log("TOTALLLLLL");
