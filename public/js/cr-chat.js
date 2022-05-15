"use strict";

console.log("CR Chatbot script initializing....");
let socket = null;
let connId = null;
function sendWSCRChatMessage(e) {
    e.preventDefault();
    //console.log("Sending message...", e);
    if (!socket) {
        socket = new WebSocket("ws://localhost:8090");
        socket.addEventListener("open", function (event) {
            socket.send(JSON.stringify(createMessage("customer", "opening")));
        });
        socket.addEventListener("message", function (event) {
            console.log("Message from server ", event.data);

            const receivedMessage = JSON.parse(event.data);

            if (receivedMessage.messageType !== "opening") {
                if (receivedMessage.messageText) {
                    displayReceivedMessage(receivedMessage);
                }
            }
        });
    } else {
        //console.log("Socket already exists.");
        const inputText = document.getElementById("wsText");
        socket.send(JSON.stringify(createMessage(inputText.value, "chat")));
        displaySentMessage(inputText.value);
        inputText.value = "";
    }

    //event.target.preventDefault();
}

function createMessage(messageText, messageType) {
    const message = {
        messageType,
        messageText,
        connType: "customer",
    };
    return message;
}

function displayReceivedMessage(receivedMessage) {
    //const messageObject = JSON.parse(receivedMessage);
    console.log("Received message: ", receivedMessage);
    const messageBalloonEl = createBalloon(
        receivedMessage.messageText,
        "ATTENDANT"
    );

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
