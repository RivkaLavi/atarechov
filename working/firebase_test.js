// Initialize Firebase
var config = {
	databaseURL: "https://streetsite-9d853.firebaseio.com",
	projectId: "streetsite-9d853",
};
firebase.initializeApp(config);

/*
// On document ready:
document.addEventListener('DOMContentLoaded', function() {
    var source   = document.getElementById("entry-template").innerHTML;
    var template = Handlebars.compile(source);
    var context = {title: "My New Post", body: "This is my first post!"};
    var html    = template(context);
    var parser = new DOMParser();
    var convertedHtml = parser.parseFromString(html, 'text/xml');
    document.getElementById("entry-template").parentElement.appendChild(convertedHtml.documentElement);
});
*/

var source = document.getElementById("biz-template").innerHTML;
var template = Handlebars.compile(source);
// From https://bit.ly/2Ejxtxo
function snapshotToArray(snapshot) {
    var returnArr = [];
    snapshot.forEach(function(childSnapshot) {
        var item = childSnapshot.val();
        item.key = childSnapshot.key;
        returnArr.push(item);
    });
    return returnArr;
};

var ref = firebase.database().ref().child('businesses').child('data');
ref.on('value', function(snapshot) {
  var biz = {business: snapshotToArray(snapshot)};
  var html = template(biz);
  //console.log(html)
  var parser = new DOMParser();
  var convertedHtml = parser.parseFromString(html, 'text/xml');
  //console.log(convertedHtml.documentElement);
  document.getElementById("biz-template").parentElement.appendChild(convertedHtml.documentElement);
});

