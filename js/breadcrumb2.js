$(function(){		//
	listenClick();
	changepath();											//F5時會改變麵包穴
	$("body").keydown(function(e){
		if (e.which == 116)
		{
			window.history.pushState({},0,staticurl + '?p=0000001100000000');
			changepath();
			window.reload();
		}
		e.preventDefault();
	});
	var containerW = $("#container").width();
	$("iframe").width((containerW*2/3)-70);
	$("iframe").height(((containerW*2/3)-70)*0.5625);
	
	$(window).resize(function() {
			var containerW = $("#container").width();
			$("iframe").width((containerW*2/3)-70);
			$("iframe").height(((containerW*2/3)-70)*0.5625);
	});
});
	var staticurl = location.href;
	staticurl += "";
	staticurl = staticurl.substring(0,staticurl.indexOf('?'));
	var prestaticurl = location.href;
	prestaticurl += "";
	prestaticurl = prestaticurl.substring(0,prestaticurl.lastIndexOf('/')+1);
function listenClick() {
        document.getElementById('elements').addEventListener('click', function(e) {
        }, false);
		document.getElementById('elementss').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'a')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100000000');
				changepath();
			}
			else if (which == 'b')
			{	
				window.history.pushState({},0,staticurl + '?p=0000001100010000');
				changepath();
			}
			else if (which == 'c')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100100000');
				changepath();
			}
			else if (which == 'd')
			{	
				window.history.pushState({},0,staticurl + '?p=0000001100110000');
				changepath();
			}
			else if (which == 'e')
			{
				window.history.pushState({},0,staticurl + '?p=0000001101000000');
				changepath();
			}
        }, false);
		
		document.getElementById('elements1').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'a1')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100000000');
				changepath();
			}	
			else if (which == 'a2')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100000001');
				changepath();
			}
        }, false);
		
		document.getElementById('elements2').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'b1')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100010000');
				changepath();
			}
			else if (which == 'b2')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100010001');
				changepath();
			}
				
        }, false);
		
		document.getElementById('elements3').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'c1')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100100000');
				changepath();
			}
			else if (which == 'c2')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100100001');
				changepath();
			}
        }, false);
		
		document.getElementById('elements4').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'd1')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100110000');
				changepath();
			}
			else if (which == 'd2')
			{
				window.history.pushState({},0,staticurl + '?p=0000001100110001');
				changepath();
			}
        }, false);
		
		document.getElementById('elements5').addEventListener('click', function(e) {
            var url = e.target.href;
			var which = url.substring(url.indexOf('#')+1);
			if (which == 'e1')
			{
				window.history.pushState({},0,staticurl + '?p=0000001101000000');
				changepath();				
			}
			else if (which == 'e2')
			{
				window.history.pushState({},0,staticurl + '?p=0000001101000001');
				changepath();
			}
        }, false);
    }
	function chlefttab() {
		
		$('.changetab li:eq(2) a').tab('show'); // Select third tab (0-indexed)
		$('.changetab li:eq(0) a').tab('show');
		$('.changetab li:eq(4) a').tab('show');
		$('.changetab li:eq(6) a').tab('show');
		$('.changetab li:eq(8) a').tab('show');
		var tempp = location.href;
		tempp += "";
		tempp = tempp.substring(0,(tempp.length)-1);
		tempp += "0";
		window.history.pushState({},0,tempp);
		changepath();
	}

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
		else if (i==2)
		{
			var temp = p.substring(8,12);
			if (temp == '0000')
			{
				$('#breadtext').append("<a href='javascript:void(0)' onclick='chlefttab()'>TOSdraw_lots</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0001')
			{
				$('#breadtext').append("<a href='javascript:void(0)' onclick='chlefttab()'>小蜜蜂Music by8051</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0010')
			{
				$('#breadtext').append("<a href='javascript:void(0)' onclick='chlefttab()'>LCD display</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0011')
			{
				$('#breadtext').append("<a href='javascript:void(0)' onclick='chlefttab()'>8*8 dot matrix -1</a>");
				$('#breadtext').append(" > ");
			}
			else if (temp == '0100')
			{
				$('#breadtext').append("<a href='javascript:void(0)' onclick='chlefttab()'>8*8 dot matrix -2</a>");
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
				$('#breadtext').append("TOSdraw_lots");
			break;
			case '0001':
				$('#breadtext').append("小蜜蜂Music by8051");
			break;
			case '0010':
				$('#breadtext').append("LCD display");
			break;
			case '0011':
				$('#breadtext').append("8*8 dot matrix -1");
			break;
			case '0100':
				$('#breadtext').append("8*8 dot matrix -2");
			break;
		}
	}
	else if (x==3)
	{
		var temp = p.substring(12,16);
		switch (temp)
		{
			case '0000':
				$('#breadtext').append("demo");
			break;
			case '0001':
				$('#breadtext').append("code");
			break;
		}
	}
}