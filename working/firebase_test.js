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

function prearePositionGroups(bizArray) {
  rv = {}
  for (var i=0; i<bizArray.length; i++) {
    var row = bizArray[i];
    group = row['position_group']
    if (Object.keys(rv).includes(group)) {rv[group].push(row)}
    else {rv[group] = []; rv[group].push(row)}
  }
  return rv;
};

var ref = firebase.database().ref().child('businesses').child('data');
ref.once('value', function(snapshot) {
  var list = snapshotToArray(snapshot);
  var biz = {business: list};
  var prep_biz = prearePositionGroups(list);
  //console.log(prep_biz);
  var html = template(prep_biz);
  console.log(html)
  var parser = new DOMParser();
  var convertedHtml = parser.parseFromString(html, 'text/xml');
  document.getElementById("biz-template").parentElement.appendChild(convertedHtml.documentElement);
});
