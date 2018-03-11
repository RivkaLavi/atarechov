var mySpreadsheet = 'https://docs.google.com/spreadsheets/d/1bKSwg7AncfiV6KZKO8b-IaqVdgMe9doLWJdxkY7QMto/edit#gid=0';
Handlebars.registerHelper('equal', function (lvalue, rvalue, options) {
    if (arguments.length < 3)
        throw new Error("Handlebars Helper equal needs 2 parameters");
    if (lvalue != rvalue) {
        return options.inverse(this);
    } else {
        return options.fn(this);
    }
});
// Compile the Handlebars template
var biz_template = Handlebars.compile($('#biz-template').html());
var biz2_template = Handlebars.compile($('#biz2-template').html());
var biz3_template = Handlebars.compile($('#biz3-template').html());
var biz4_template = Handlebars.compile($('#biz4-template').html());
var biz5_template = Handlebars.compile($('#biz5-template').html());
var biz6_template = Handlebars.compile($('#biz6-template').html());
var biz7_template = Handlebars.compile($('#biz7-template').html());
$('#biz').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz_template,
    // Call changeClasses AFTER finishing with the template
    callback: changeClasses
});
$('#biz2').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz2_template
});
$('#biz3').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz3_template
});
$('#biz4').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz4_template
});
$('#biz5').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz5_template
});
$('#biz6').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz6_template
});
$('#biz7').sheetrock({
    url: mySpreadsheet,
    rowTemplate: biz7_template
});
// business_info
var business_info_template = Handlebars.compile($('#business-info-template').html());
$('#business_info').sheetrock({
    url: mySpreadsheet,
    rowTemplate: business_info_template
});



function changeClasses(error, options, response) {
    var openClasses = $('li.open').click(function () {
        $('.business-info-wrapper').removeClass('display_none');
        $('.street-info-wrapper').addClass('display_none');
        $('.campaign-info-wrapper').addClass('display_none');
        }
    )
}
