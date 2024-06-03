const admin = require('firebase-admin');
// import admin from 'firebase-admin';
const serviceAccout = require('./serviceAccountKey.json');  // service account credentials from step 1
// import serviceAccout from './serviceAccountKey.json';
admin.initializeApp({
    credential: admin.credential.cert(serviceAccout),
    databaseURL: 'https://my-emart-admin-default-rtdb.firebaseio.com'
});

const db = admin.firestore();
exports.db = db;

setDataToFireStore();
