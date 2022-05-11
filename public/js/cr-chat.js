"use strict";

console.log("CR Chatbot script initializing....");
let socket = null;

function sendWSCRChatMessage(e) {
    e.preventDefault();
    //console.log("Sending message...", e);
    if (!socket || socket.readyState === 2 || socket.readyState === 3) {
        socket = new WebSocket("ws://localhost:8090");
        socket.addEventListener("open", function (event) {
            socket.send("testId");
        });
        socket.addEventListener("message", function (event) {
            console.log("Message from server ", event.data);
            displayReceivedMessage(event.data);
        });
    } else {
        //console.log("Socket already exists.");
        const inputText = document.getElementById("wsText");
        socket.send(JSON.stringify({ content: inputText.value }));
    }

    //event.target.preventDefault();
}

function displayReceivedMessage(message) {
    const messageBalloonEl = document.createElement("div");
    const messageParagraphEl = document.createElement("p");
    messageParagraphEl.textContent = message;

    messageBalloonEl.appendChild(messageParagraphEl);
    messageBalloonEl.classList.add("cr-chat-message-balloon");

    const chatDisplay = document.querySelector(".cr-chat-display");

    chatDisplay.insertAdjacentElement("beforeend", messageBalloonEl);
}
