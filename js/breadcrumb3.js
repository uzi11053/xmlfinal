var staticurl = location.href;
	staticurl += "";
	staticurl = staticurl.substring(0,staticurl.indexOf('?'));
	var prestaticurl = location.href;
	prestaticurl += "";
	prestaticurl = prestaticurl.substring(0,prestaticurl.lastIndexOf('/')+1);

$(function(){		//
	changepath();											//F5時會改變麵包穴
	$("body").keydown(function(e){
		if (e.which == 116)
		{
			window.history.pushState({},0,staticurl + '?p=000000010000');
			changepath();
			window.reload();
		}
		e.preventDefault();
	});
	document.getElementById('elements').addEventListener('click', function(e) {
        }, false);
		document.getElementById('elementss').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'a')
			{
				window.history.pushState({},0,staticurl + '?p=000000010000');
				changepath();
			}
			else if (which == 'b')
			{
				window.history.pushState({},0,staticurl + '?p=000000010001');
				changepath();
			}
			else if (which == 'c')
			{
				window.history.pushState({},0,staticurl + '?p=000000010010');
				changepath();
			}
			else if (which == 'd')
			{	
				window.history.pushState({},0,staticurl + '?p=000000010011');
				changepath();
			}
			else if (which == 'e')
			{
				window.history.pushState({},0,staticurl + '?p=000000010100');
				changepath();
			}
        }, true);
	
	
	
});


function changepath() {
	$('#breadtext').empty();
	var p = location.href;
	p += "";
	p = p.substring(p.indexOf('?')+3);
	var x;
	x=0;
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
				$('#breadtext').append("<a href='"+prestaticurl+"aboutme.html?p=000000010000'>aboutme</a>");
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
		else if (i==2)
		{
			var temp = p.substring(8,12);
			if (temp == '0000')
			{
				$('#breadtext').append("<a href='javascript:void(0)' '>Introduce</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0001')
			{
				$('#breadtext').append("<a href='javascript:void(0)' '>Skill</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0010')
			{
				$('#breadtext').append("<a href='javascript:void(0)' '>Experience</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0011')
			{
				$('#breadtext').append("<a href='javascript:void(0)' '>?????</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0100')
			{
				$('#breadtext').append("<a href='javascript:void(0)' '>??????????</a>");
				$('#breadtext').append(" > ");
			}
		}
	}
	if (x==0)
	{
		$('#breadtext').append("homepage");
	}
	else if (x==1)
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
	else if (x==2)
	{
		var temp = p.substring(8,12);
		switch (temp)
		{
			case '0000':
				$('#breadtext').append("Introduce");
			break;
			case '0001':
				$('#breadtext').append("Skill");
			break;
			case '0010':
				$('#breadtext').append("Experience");
			break;
			case '0011':
				$('#breadtext').append("?????");
			break;
			case '0100':
				$('#breadtext').append("??????????");
			break;
		}
	}
}