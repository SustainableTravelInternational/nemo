function checkSideMenuStatus()
{
  var value = Cookies.get('sideMenuStatus');
  console.log(value);

  if(value == '1') {
  	$('.sidebar-toggle').trigger('click');
  }
}

checkSideMenuStatus();

$('.sidebar-toggle').click(function() {
	var value = Cookies.get('sideMenuStatus');
	console.log(value);
    if (value == '1') { 
		Cookies.set('sideMenuStatus', '0' , { expires: 10 });
		console.log('HERE');
    } else {
		Cookies.set('sideMenuStatus', '1' , { expires: 10 });
		console.log('NOOOTTTT');
    }
});