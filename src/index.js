const visabtn = document.getElementById("visabtn");
const MastercardBtn = document.getElementById("MastercardBtn");
const paypalBtn = document.getElementById("paypalBtn");
const mysubmit = document.getElementById("mysubmit");
const paymentResult = document.getElementById("paymentResult");
const subscribe = document.getElementById("subscribe");
const subResult = document.getElementById("subResult");

mysubmit.onclick = function () {
    if (subscribe.checked) {
        subResult.textContent = "You are subscribed";
    } else {
        subResult.textContent = "You are not subscribed";
    }

    if (visabtn.checked) {
        paymentResult.textContent = "You are paying with Visa";
    } else if (MastercardBtn.checked) {
        paymentResult.textContent = "You are paying with MasterCard";
    } else if (paypalBtn.checked) {
        paymentResult.textContent = "You are paying with PayPal";
    } else {
        paymentResult.textContent = "You must select a payment method";
    }
};

let hrs = document.getElementById("hrs");
let min = document.getElementById("min");
let sec = document.getElementById("sec");

setInterval(() => {
    let currentTime = new Date();
    hrs.innerHTML = (currentTime.getHours() < 10 ? "0" : "") + currentTime.getHours();
    min.innerHTML = (currentTime.getMinutes() < 10 ? "0" : "") + currentTime.getMinutes();
    sec.innerHTML = (currentTime.getSeconds() < 10 ? "0" : "") + currentTime.getSeconds();
}, 1000);

