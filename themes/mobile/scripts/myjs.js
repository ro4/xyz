function sendId(id){
	$("#change").val(id);
}

function setCookie(name,value){
    var exp  = new Date();  
    exp.setTime(exp.getTime() + 30*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
function getCookie(name){
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;
}
function delCookie(name){
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

function add2cart(){
	var cart = getCart();
	var tem = {id:$("#change").val(),sugar:$("#sugar").val(),heat:$("#heat").val(),count:$("#count").val(), mark:$("#mark").val()};
	if(cart==null){
		cart = [];
		cart.push(tem);
	}else {
		for(var i = 0; i <cart.length; i++){
		if((cart[i].id == tem.id) && (cart[i].heat == tem.heat) && (cart[i].sugar == tem.sugar)){
			cart[i].count = parseInt(cart[i].count)+parseInt(tem.count);
		} else if(i == cart.length - 1){
			cart.push(tem);
			break;
		}
	}
	}
	console.log(cart);
	setCookie("cart",JSON.stringify(cart));
	setLabel();
}

function getCart(){
	cart = jQuery.parseJSON(getCookie("cart"));
	return cart;
}

function setLabel(){
	$(".footer-ball").text(getCart().length);
	$("#cart").text(getCart().length);
}