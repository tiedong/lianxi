
//封装一个通用的方法，兼容各个版本的浏览器
//参数1：给哪个标签监视事件
//参数2：监视的事件类型
//参数3：事件发生时执行的函数
function bindEvent(element,eventType,fn){
	if(window.addEventListener){
		element.addEventListener(eventType, fn, false);
	}else{
		element.attachEvent("on"+eventType, fn);
	}
}

//封装一个简化document.getElementById();
function $(id){
	//根据id属性的值返回其对应的对象
	return document.getElementById(id);
}

//封装的拖拽效果
//鼠标按下事件
//参数1：拖拽的元素
//参数2：
function drag(obj,parent,content,box){
	obj.onmousedown = function(){
		//鼠标按下的时候，再来移动，就会产生拖拽的效果
		obj.onmousemove = function(e){
			var ev = e || window.event;
			var mouseX = ev.clientX;
			var mouseY = ev.clientY;
			//想让图片跟着鼠标移动，只需要让图片的坐标等于鼠标的坐标
			var imgX = mouseX - parent.offsetLeft -obj.clientWidth/2;
			var imgY = mouseY - parent.offsetTop - obj.clientHeight/2;

			//判断图片是否出界
			if(imgX <= 0){
				imgX = 0;
			}
			if(imgY <=0 ){
				imgY = 0;
			}
			if(imgX >= parent.clientWidth - obj.clientWidth){
				imgX = parent.clientWidth - obj.clientWidth;
			}
			if(imgY >= parent.clientHeight - obj.clientHeight){
				imgY = parent.clientHeight - obj.clientHeight;
			}

			obj.style.left = imgX+'px';
			obj.style.top = imgY+'px';

			//获得滑轮拖拽的距离
			var btnLeft = obj.offsetLeft;
			// btnLeft / (odrag.clinetWidth - btn.clientWidth) == contentTop  / (content.offsetHeight -box.offsetHeight )
	 		var contentTop = btnLeft / (parent.clientWidth - obj.clientWidth) * (content.offsetHeight -box.offsetHeight );
	 		content.style.top = -contentTop+'px';

		}
		//在整个body的范围内，只要鼠标抬起，就阻止移动的行为
		// oImg.onmouseup = function(){
		// 	//取消移动事件
		// 	oImg.onmousemove = null;
		// }
		document.onmouseup = function(){
			//取消移动事件
			obj.onmousemove = null;
		}
		//阻止鼠标按下时，可能出现的浏览器的默认行为
		return false;
	}
}


// alert(opacity);
function getStyle(obj,attr){
	//返回该属性的值
	if(obj.currentStyle){
		//说明是ie浏览器
		return obj.currentStyle[attr];	//如果属性是一个变量的时候，使用 []语法表示对象属性语法
	}else{
		return getComputedStyle(obj,false)[attr];
	}
}

//参数1：执行动画的元素
//参数2：执行动画的css属性们
//参数3：回调函数

function animation(obj,json,fn){
	clearInterval(obj.timer);
	obj.timer = setInterval(function(){
		//默认是到达目的地了
		var flag = true;
		//遍历每个属性
		for(var attr in json){
			//让每个属性执行动画
			if(attr == 'opacity'){
				var now = parseInt(getStyle(obj,attr) * 100);
			}else{
				var now = parseInt(getStyle(obj,attr));
			}
			//计算速度
			var speed = (parseInt(json[attr]) - now)/10;
			speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);

			if(now != parseInt(json[attr])){
				//有任何一个属性还没有到达目的地，就等着
				flag = false;
			}

			//开始加、减
			if(attr =='opacity'){
				obj.style[attr] = (now + speed)/100;
			}else{
				obj.style[attr] = now + speed +'px';
			}
		}
		if(flag){
			//说明所有的属性都到达目的地了
			clearInterval(obj.timer);
			if(fn){
				fn();
			}
		}

	}, 50)
}

//删除某个标签上面的class属性值
//参数1：操作的元素对象
//参数2：删除的class类名
//例如: <div id="content" class="page show">  ---> <div id="content" class="page show hide">
function removeClass(element,clsName){
	var cName = element.className;


	var arr= cName.split(' ');//删除数组元素

	for ( var i=0;i<arr.length;i++) {
		if ( arr[i] == clsName ) {
			arr.splice(i,1);
		}
	}
    //将数组拼接成一个字符串class属性
	cName = arr.join(' ');
	element.className = cName;

}

//给某个标签添加class属性
//参数1：标签对象
//参数2：添加的类名
//例如：<div id="content" class="page">  ---->	<div id="content" class="page show">
function addClass(element,clsName){
	var cName = element.className;

	//标签可能没有class属性
	if ( !cName ) {
		element.className = clsName;
	}
	var arr = cName.split(' ');
	for ( var i=0;i<arr.length;i++ ) {
		if ( arr[i] == clsName ) {
			return ;
		}
	}
	element.className += ' '+clsName;
}

//封装ajax操作
var $$= {
	request:function ( options ) {
        //兼容各个浏览器的xmlHttpRequest对象
        var xhr;
        try{
            //尝试执行
            xhr = new XMLHttpRequest();

        }catch (e){
            //尝试使用IE6
            try{
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }catch(e){
                //尝试使用IE5.5
                try {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }catch(e){
                    alert('你的浏览器太破了，不值得拥有,去百度下载一个吧');
                    location.href = "http://www.baidu.com";
                }
            }
        }
        //判断提交的方式
		if ( options.method == 'GET' ) {
        	//url地址传递中文，特殊字符符号
			var content = encodeURIComponent(options.data);
			//缓存怎么解决
			var url = options.url+'?'+Math.random()+'&'+content;
            xhr.open(options.method,url,true);
            xhr.send();
		} else if (options.method == 'POST') {
        	xhr.open(options.method,options.url,true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send(options.data);
		}

		//监视xhr请求的状态，以及服务器的状态
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200 ) {
				if (options.dataType == 'text') {
					var result = xhr.responseText;

				} else if(options.dataType == 'xml') {
                    var result = xhr.responseXML;
				} else if (options.dataType == 'json') {
                     eval('var result='+xhr.responseText);
				}

				//拿到数据后怎么处理
				options.success(result);
			}
        }
    }
};
// $$.request({
// 	method:"post",
// 	url:"1.php",
// 	data:"name=love&hate",
// 	//期望服务器返回什么类型的数据：text字符串,xml文档,json:、JavaScript对象
// 	dataType:"json",
// 	success:function (result) {
// 		console.log(result);
// 		//成功之后的业务处理
//
//     }
// });