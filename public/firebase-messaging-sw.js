// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: 'AIzaSyC_qaCjN-Lrgq3NFwwA5DgTjOUTWUdYM18',
    authDomain: 'nafazapp-b0544.firebaseapp.com',
    databaseURL: 'https://project-id.firebaseio.com',
    projectId: 'nafazapp-b0544',
    storageBucket: 'nafazapp-b0544.appspot.com',
    messagingSenderId: '847453852775',
    appId: '1:847453852775:web:81021ec7072b68aa7b30c2',
    measurementId: 'G-measurement-id',
});


// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);

    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };

    return self.registration.showNotification(
        title,
        options,
    );
});
