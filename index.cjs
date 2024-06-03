const admin = require('firebase-admin');

const serviceAccout = require('./serviceAccountKey.json');  // service account credentials from step 1

admin.initializeApp({
    credential: admin.credential.cert(serviceAccout),
    databaseURL: 'https://my-emart-admin-default-rtdb.firebaseio.com'
});

const db = admin.firestore();
// exports.db = db;

async function setDataToFireStore(){

    // this data should be as per the firestore collection structure

    const dataToStore ={
        firstName: "Shubham",
        lastName: "Verma"
    };

    // Firestore collection name: UserCollection
    // Firestore collectionID name: fullName1234

    await db.collection('UserCollection').doc('userfullName1234')
        .set(dataToStore);
    console.log('user Full name inserted to the firestore database');
}

setDataToFireStore();
