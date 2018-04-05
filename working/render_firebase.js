// Initialize Firebase
var config = {
  databaseURL: "https://streetsite-9d853.firebaseio.com",
  projectId: "streetsite-9d853",
};
firebase.initializeApp(config);

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

function changeClasses(error, options, response) {
  console.log('After Load');
	var openClasses = $('li.open').click(function () {
		$('.business-info-wrapper').removeClass('display_none');
		$('.street-info-wrapper').addClass('display_none');
		$('.campaign-info-wrapper').addClass('display_none');
	});
}

var observer = new MutationObserver(changeClasses);

var mapTemplate = document.getElementById("map-template");
var mapSource = mapTemplate.innerHTML;
var compiledMapTemplate = Handlebars.compile(mapSource);

// business_info
var bizTemplate = document.getElementById("business-info-template");
var bizSource = bizTemplate.innerHTML;
var compiledBizTemplate = Handlebars.compile(bizSource);

var ref = firebase.database().ref().child('businesses').child('data');
ref.once('value', function(snapshot) {
  var list = snapshotToArray(snapshot);
  var biz = {business: list};
  var prep_biz = prearePositionGroups(list);
  var mapHtml = compiledMapTemplate(prep_biz);
  //console.log(mapHtml)
  var bizHtml = compiledBizTemplate({biz_info: list});
  //console.log(bizHtml)
  var parser = new DOMParser();
  var convertedMapHtml = parser.parseFromString(mapHtml, 'text/xml');
  var convertedBizHtml = parser.parseFromString(bizHtml, 'text/xml');
  var mapTemplateParent = mapTemplate.parentElement;
  var bizTemplateParent = bizTemplate.parentElement;
  observer.observe(mapTemplateParent, {childList: true});
  mapTemplateParent.appendChild(convertedMapHtml.documentElement);
  bizTemplateParent.appendChild(convertedBizHtml.documentElement);
});
