// Initialize Firebase
var config = {
  databaseURL: "https://streetsite-9d853.firebaseio.com",
  projectId: "streetsite-9d853",
};
firebase.initializeApp(config);

// Convert firebase snapshot to Array - from https://bit.ly/2Ejxtxo
function snapshotToArray(snapshot) {
  var returnArr = [];
  snapshot.forEach(function (childSnapshot) {
    var item = childSnapshot.val();
    item.key = childSnapshot.key;
    returnArr.push(item);
  });
  return returnArr;
};

// Make an object with groups out of firebase array
function preparePositionGroups(bizArray) {
  var rv = {}
  for (var i = 0; i < bizArray.length; i++) {
    var row = bizArray[i];
    group = row['position_group']
    if (Object.keys(rv).includes(group)) {
      rv[group].push(row)
    } else {
      rv[group] = [];
      rv[group].push(row)
    }
  }
  return rv;
};

// Filter rows with empty campaign strings
function filterCampaigns(bizArray) {
  var rv = [];
  for (var i = 0; i < bizArray.length; i++) {
    var row = bizArray[i];
    var campaign = row['campaign_string'];
    if (campaign != "") {
      rv.push(row)
    }
  }
  return rv;
}

function changeClasses(error, options, response) {
  console.log('Should run after loading the biz-map template');
  var openClasses = $('li.open').click(function () {
    $('.business-info-wrapper').removeClass('display_none');
    $('.street-info-wrapper').addClass('display_none');
    $('.campaign-info-wrapper').addClass('display_none');
  });
}

var observer = new MutationObserver(changeClasses);

// compile map
var mapTemplate = document.getElementById("map-template");
var compiledMapTemplate = Handlebars.compile(mapTemplate.innerHTML);

// compile business_info
var bizTemplate = document.getElementById("business-info-template");
var compiledBizTemplate = Handlebars.compile(bizTemplate.innerHTML);

// compile sales
var salesTemplate = document.getElementById("sales-template");
var compiledSalesTemplate = Handlebars.compile(salesTemplate.innerHTML);

// Fetch data from firebasem massage it, then compile and replace the templates
var ref = firebase.database().ref().child('businesses').child('data');
ref.once('value', function (snapshot) {
  var list = snapshotToArray(snapshot);
  var prep_biz = preparePositionGroups(list);
  var mapHtml = compiledMapTemplate(prep_biz);
  var bizHtml = compiledBizTemplate({biz_info: list});
  var salesHtml = compiledSalesTemplate({sale: filterCampaigns(list)});

  var bizTemplateParent = bizTemplate.parentElement;
  // Watch for changes on bizTemplateParent
  observer.observe(bizTemplateParent, {childList: true});
  mapTemplate.parentElement.innerHTML = mapHtml;
  bizTemplateParent.innerHTML = bizHtml;
  salesTemplate.parentElement.innerHTML = salesHtml;
  console.log('Replaced biz...');
});