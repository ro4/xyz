function sendId(id){
	$("#addBtn").val("加入购物车")
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
	if($("#addBtn").val() == "加入购物车"){
		madd();
	} else {
		mupdate();
	}
}


function mupdate(){
	var flag = getCookie("flag");
	mdel(flag,0);
	madd();
	location.reload();
}

function mdel(flag,opt){
	var cart = getCart();
	if(cart.length == 1){
		delCookie("cart");
	} else {
		cart.splice(flag,1);
		setCookie("cart",JSON.stringify(cart));
	}
	if(opt == 1){
		location.reload();
	}
}

function madd(){
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
	setCookie("cart",JSON.stringify(cart));
	setLabel();
	jump();
}

function updateCart(flag){
	$("#addBtn").val("修改");
	setCookie("flag",flag);
	var cart = getCart();
	$("#change").val(cart[flag].id);
	$("#sugar").val(cart[flag].sugar);
	$("#heat").val(cart[flag].heat);
	$("#sugar").val(cart[flag].sugar);
	$("#count").val(cart[flag].count);
	$("#mark").val(cart[flag].mark);
}

function getCart(){
	cart = jQuery.parseJSON(getCookie("cart"));
	return cart;
}

function setLabel(){
	num = 0;
	cart = getCart();
	for(var i = 0; i <cart.length; i++){
		num = parseInt(cart[i].count) + num;
	}
	//console.log(cart);
	$(".footer-ball").text(num);
	$("#cart").text(num);
}

function jump(){
	$('.footer-ball').css("width","+=5px");
	$('.footer-ball').css("height","+=5px");
}