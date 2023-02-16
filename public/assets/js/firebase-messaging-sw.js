importScripts('https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.4.3/firebase-messaging.js');


const firebaseConfig = {
    apiKey: "AIzaSyD1D-7yw8o6m3YZNYUTlDF_vrNK0S_tGPM",
    authDomain: "fresh-delight-164317.firebaseapp.com",
    projectId: "fresh-delight-164317",
    storageBucket: "fresh-delight-164317.appspot.com",
    messagingSenderId: "1080870077265",
    appId: "1:1080870077265:web:301ff735db4733d4970970",
    measurementId: "G-TZ5K7K871L"
};



firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});
