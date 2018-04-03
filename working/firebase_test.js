// Initialize Firebase
var config = {
	databaseURL: "https://streetsite-9d853.firebaseio.com",
	projectId: "streetsite-9d853",
};
firebase.initializeApp(config);

var businesses = document.getElementById('businesses');
var ref = firebase.database().ref().child('businesses').child('data');

ref.on('value', function(snapshot) {
  snapshot.forEach(function(childSnapshot) {
    var childKey = childSnapshot.key;
    var childData = childSnapshot.val();
    //console.log(childKey);
    //console.log(childData);
    var node = document.createElement("li");
    node.className="collection-repeat";
    node.textContent = JSON.stringify(childSnapshot.val(), null, 2);
    businesses.appendChild(node)
  });
});
