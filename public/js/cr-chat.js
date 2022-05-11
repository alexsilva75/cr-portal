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
            if (JSON.parse(event.data).msg) {
                displayReceivedMessage(event.data);
            }
        });
    } else {
        //console.log("Socket already exists.");
        const inputText = document.getElementById("wsText");
        socket.send(JSON.stringify({ content: inputText.value }));
        displaySentMessage(inputText.value);
        inputText.value = "";
    }

    //event.target.preventDefault();
}

function displayReceivedMessage(receivedMessage) {
    const messageObject = JSON.parse(receivedMessage);
    const messageBalloonEl = createBalloon(messageObject.msg, "ATTENDANT");

    const chatDisplay = document.querySelector(".cr-chat-display");

    chatDisplay.insertAdjacentElement("beforeend", messageBalloonEl);
    messageBalloonEl.scrollIntoView();
}

function displaySentMessage(message) {
    const messageBalloonEl = createBalloon(message, "USER");

    const chatDisplay = document.querySelector(".cr-chat-display");

    chatDisplay.insertAdjacentElement("beforeend", messageBalloonEl);
    messageBalloonEl.scrollIntoView();
}

function createBalloon(message, from) {
    const messageBalloonEl = document.createElement("div");
    const messageParagraphEl = document.createElement("p");
    //console.log(typeof receivedMessage);

    messageParagraphEl.innerHTML = message;

    messageBalloonEl.appendChild(messageParagraphEl);
    messageBalloonEl.classList.add("cr-chat-message-balloon");

    if (from === "USER") {
        messageBalloonEl.classList.add("cr-chat-user-balloon");
    } else {
        messageBalloonEl.classList.add("cr-chat-attendant-balloon");
    }

    return messageBalloonEl;
}
