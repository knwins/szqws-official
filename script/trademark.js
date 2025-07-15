String.prototype.trim = function() {
    return this.replace(/(^\s*)|(\s*$)/g, "")
};

$(document).ready(function() {
						   
    $(".topselect ").hover(function() {
        $(".topselect .select").show();
    },
    function() {
        $(".topselect .select").hide();
    });
	
    $(".topselect .select li").click(function() {
        $(".showselect").html($(this).html());
        var tip = $(this).html();
        if (tip == "全部") {
            tip = "商标名/申请人/注册号";
        }
        $("#keyword").attr('placeholder', '请输入' + tip + "关键词！")
		$("#stT").val($(this).attr("data-st"));
        $(".topselect .select li").removeClass("active");
        $(this).addClass("active");
        $(".topselect .select").hide();
    });

});

function goSearchTM() {
    
	/*
	if ($("#topSearchKey").val() == null || $("#topSearchKey").val() == "" || $.trim($("#topSearchKey").val()) == "录入商标名/注册号/申请人，超1500万海量商标任你搜！") {
        alert("必须输入待查询的关键字！");
        return
    }
	*/
	
	var stT=$("#stT").val();
	

	
	if(stT==1){
	window.open("http://wcjs.sbj.cnipa.gov.cn/txnT01.do");
	}else if(stT==2){
		window.open("http://wcjs.sbj.cnipa.gov.cn/txnT01.do");
	}
	
	else if(stT==3){
	window.open("http://wcjs.sbj.cnipa.gov.cn/txnT01.do");
	 }
	 else if(stT==4){
	window.open("http://wcjs.sbj.cnipa.gov.cn/txnT01.do");
	 }
	 
  
    //$("#topSearch").submit()
};


function goUrl(_url, target){
	if(_url.indexOf('?') > -1){
		_url = _url + "&";
	}else{
		_url = _url + "?";
	}
	if(target == null || target == ""){
		window.location = _url + 'locale=zh_CN';
	}else{
		window.open(_url + 'locale=zh_CN', target);
	}
}