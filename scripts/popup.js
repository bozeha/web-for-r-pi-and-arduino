function popUpNow(x)
{

$('#myModal p').text(x['mess']);
$('#myModal h4').text(x['title']);
$('#myModal button').eq(1).text(x['b1']);
$('#myModal button').eq(1).attr('onclick',"runCommand('"+x['comm']+"')");
$('#myModal button').eq(2).text(x['b2']);
$('#myModal').modal();

}