$(function(){	
	changepath();
});
	var staticurl = location.href;
	staticurl += "";
	staticurl = staticurl.substring(0,staticurl.indexOf('?'));
	var prestaticurl = location.href;
	prestaticurl += "";
	prestaticurl = prestaticurl.substring(0,prestaticurl.lastIndexOf('/')+1);
	
function changepath() {
	var p = location.href;
	p += "";
	p = p.substring(p.indexOf('?')+3);
	var x;
	x=0;
	if (p == "00000000")
	{
		$('#breadtext').append("homepage");
		p=4;
	}	
	for (var i=0;i<((p.length)/4)-1;i++) //add a
	{
		x++;
		if (i==0)
		{
			$('#breadtext').append("<a href='"+prestaticurl+"index.html?p=00000000'>homepage</a>");
			$('#breadtext').append(" > ");
		}
		else if (i==1) 
		{
			var temp = p.substring(4,8);
			if (temp == '0001')
			{
				$('#breadtext').append("<a href='"+prestaticurl+"aboutme.html?p=00000001'>aboutme</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0010')
			{
				$('#breadtext').append("<a href='"+prestaticurl+"service.html?p=00000010'>service</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0011')
			{
				$('#breadtext').append("<a href='"+prestaticurl+"product.html?p=0000001100000000'>product</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0100')
			{
				$('#breadtext').append("<a href='"+prestaticurl+"contactus.html?p=00000100'>contact us</a>");
				$('#breadtext').append(" > ");
			}
		}
	}
	if (x==1)
	{
		var temp = p.substring(4,8);
		switch (temp)
		{
			case '0001':
				$('#breadtext').append("about me");
			break;
			case '0010':
				$('#breadtext').append("service");
			break;
			case '0011':
				$('#breadtext').append("product");
			break;
			case '0100':
				$('#breadtext').append("contact us");
			break;
		}
	}
}