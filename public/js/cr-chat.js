"use strict";

console.log("CR Chatbot script initializing....");
let socket = null;
let connId = null;
function sendWSCRChatMessage(e) {
    e.preventDefault();
    //console.log("Socket Ready State: ", socket.readyState);
    //0: CONNECTING, 1: OPEN, 2: CLOSING, 3: CLOSED,
    if (socket && (socket.readyState === 2 || socket.readyState === 3)) {
        socket = null;
    }

    if (!socket) {
        console.log("Creating the socket");
        socket = new WebSocket("wss://portalcrtelecom.com.br:8090");
        socket.addEventListener("open", function (event) {
            console.log("Opening the connection");
            socket.send(JSON.stringify(createMessage("customer", "opening")));
        });
        socket.addEventListener("message", function (event) {
            console.log("Message from server ", event.data);

            const receivedMessage = JSON.parse(event.data);

            if (receivedMessage.messageType !== "opening") {
                if (receivedMessage.messageText) {
                    displayReceivedMessage(receivedMessage);
                }

                if (receivedMessage.messageType === "closing") {
                    socket = null;
                }
            }
        });

        socket.addEventListener("error", function (event) {
            console.log("An error has occured when trying to connect.");
            console.log(event);
        });

        socket.addEventListener("close", function (event) {
            console.log("Closing websocket connection");
            console.log(event);
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

function openChat(e) {
    e.preventDefault();
    const chatContainerEl = document.querySelector(".cr-chat");
    chatContainerEl.classList.toggle("cr-show");
    sendWSCRChatMessage(e);

    const chatStartEl = document.querySelector(".chat-start");
    chatStartEl.classList.toggle("cr-hidden");
}

function closeChat(e) {
    console.log("Should close chat");
    e.preventDefault();
    const chatContainerEl = document.querySelector(".cr-chat");
    chatContainerEl.classList.toggle("cr-show");

    const chatStartEl = document.querySelector(".chat-start");
    chatStartEl.classList.toggle("cr-hidden");
}
