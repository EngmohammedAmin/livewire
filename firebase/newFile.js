let { db } = require('./index.cjs');

{

    // this data should be as per the firestore collection structure
    const dataToStore = {
        firstName: "Shubham",
        lastName: "Verma"
    };

    // Firestore collection name: UserCollection
    // Firestore collectionID name: fullName1234
    return db.collection('UserCollection').doc('fullName1234')
        .set(dataToStore).then(() => {
            console.log('Full name inserted to the firestore database');
        });
}
