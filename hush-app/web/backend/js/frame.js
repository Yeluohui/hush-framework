//保存当前链接名称
var current_link = '';

//是否折叠其他菜单
var close_others = true;

//domready
$(function(){

	//快捷菜单
	bindQuickMenu();

	//菜单切换(测试)
	bindAdminMenu();

	//菜单开关
	LeftMenuToggle();

	//全部功能开关
	AllMenuToggle();

	//取消菜单链接虚线
	$(".head").find("a").click(function(){$(this).blur()});
	$(".menu").find("a").click(function(){$(this).blur()});
	
}).keydown(function(event){//快捷键

	if(event.keyCode == 116){
		url = $("#main").attr("src");
		main.location.href = url;
		return false;
	}
	
	if(event.keyCode == 27){
		$("#qucikmenu").slideToggle("fast")
	}
	
});

function bindQuickMenu() //快捷菜单
{
	$("#ac_qucikmenu").bind("mouseenter",function(){
		$("#qucikmenu").slideDown("fast");
	}).dblclick(function(){
		$("#qucikmenu").slideToggle("fast");
	}).bind("mouseleave",function(){
		hidequcikmenu = setTimeout('$("#qucikmenu").slideUp("fast");',700);
		$(this).bind("mouseenter",function(){clearTimeout(hidequcikmenu);});
	});
	
	$("#qucikmenu").bind("mouseleave",function(){
		hidequcikmenu = setTimeout('$("#qucikmenu").slideUp("fast");',700);
		$(this).bind("mouseenter",function(){clearTimeout(hidequcikmenu);});
	}).find("a").click(function(){
		$(this).blur();
		$("#qucikmenu").slideUp("fast");
		$("#ac_qucikmenu").text($(this).text());
	});
}

function bindAdminMenu() //菜单点击
{
	$("#nav").find("a").click(function(){
		ChangeNav($(this).attr("_for"));
	});

	$("#menu").find("dt").click(function(){
		
		if (close_others) {
			$("#menu").find("dt").css("background-position","left bottom");
			$("#menu").find("dt").next("dd").slideUp("fast");
		}
		
		click_dt = $(this);
		click_dd = $(this).next("dd");
		if(click_dd.css("display") == "none"){
			click_dd.slideDown("fast");
			click_dt.css("background-position","left top");
		}else{
			click_dd.slideUp("fast");
			click_dt.css("background-position","left bottom");
		}
	});

	$("#menu dd ul li a").click(function(){
		$(this).addClass("thisclass").blur().parents("#menu").find("ul li a").not($(this)).removeClass("thisclass");
		current_link = $(this).html();
	});
}

function ChangeNav(nav) //菜单跳转
{

	
	$("#nav").find("a").removeClass("thisclass");
	$("#nav").find("a[_for='"+nav+"']").addClass("thisclass").blur();
	$("body").attr("class","showmenu");
	$("#menu").find("div[class^=items]").hide(); // hide all first then show menu
	$("#menu").find(".items_"+nav).show().find("dl dd").show().find("ul li a").removeClass("thisclass");
	$("#menu").find(".items_"+nav).css("display", "inline"); // fix bug in firefox
	// judge which link should be selected by link name
	link_name = arguments[1] ? arguments[1] : current_link;
	curr_link = $("#menu").find(".items_"+nav).find("dd ul li a:contains('"+link_name+"')");
	curr_link.addClass("thisclass").blur();
	
	if (close_others) {
		$("#menu").find("dt").css("background-position","left bottom");
		$("#menu").find("dt").next("dd").hide();
		curr_dl = curr_link.parent().parent().parent().parent();
		curr_dt = curr_dl.children("dt");
		curr_dd = curr_dl.children("dd");
		curr_dd.slideDown("fast");
		curr_dt.css("background-position","left top");
	}
	
	current_link = link_name;
}

function LeftMenuToggle(){
	$("#togglemenu").click(function(){
		if($("body").attr("class") == "showmenu"){
			$("body").attr("class","hidemenu");
			$(this).html("[显示菜单]");
		}else{
			$("body").attr("class","showmenu");
			$(this).html("[隐藏菜单]");
		}
	});
}

function AllMenuToggle(){
	mask = $(".pagemask,.iframemask,.allmenu");
	$("#allmenu").click(function(){
			mask.show();
	});
	mask.click(function(){mask.hide();});
}
