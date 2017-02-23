window.onload = function () {
	var show_container = document.getElementById('play-container');
	var list = document.getElementById('list');
	var buttons = document.getElementById('buttons').getElementsByTagName('span');
	var timer;
	var index = 1;//按钮下标变量
	var interval = 3000;//动画切换间隔
	var animated = false;//动画状态animated，只有为false才可以执行下一个动画
	//展示按钮，因为只有唯一的按钮是亮的所以找到后可以直接退出循环
	function showButton () {
		for(var i = 0;i < buttons.length;i++){
			if (buttons[i].className == 'on') {
				buttons[i].className = '';
				break;
			}
		}
		buttons[index-1].className = 'on';
	}
	//为每一个按钮添加事件
	for(var i = 0;i < buttons.length;i++){
		buttons[i].onclick = function () {
			if (animated) {
				return;
			}
			if (this.className == 'on') {
				return;
			}
			var myIndex = parseInt(this.getAttribute('index'));
			var offset = -730 * (myIndex - index);

			animate(offset);
			index = myIndex;	
			showButton();
		}
	}
	//动画展示animate
	function animate (offset) {
		animated = true;
		var moveTimes = 300;//切换图片时长
		var times = 10;//切换次数
		var speed = offset/(moveTimes/times);//切换速度，像素/帧
		var newLeft = parseInt(list.style.left) + offset;

		var go = function() {
			if (speed < 0 && parseInt(list.style.left) > newLeft || speed > 0 && parseInt(list.style.left) < newLeft) {
			 	list.style.left = parseInt(list.style.left) + speed + 'px';
			 	setTimeout(go, times);
			}else {
				list.style.left = newLeft + 'px';
				if (newLeft < -2190 || newLeft > -730) {
					list.style.left = '-730px';
				}		
				animated = false;	
			}
		}
		go();
	}

    function play () {
    	timer = setTimeout(function () {
    		if (animated) {
    			return;
    		}
    		if (index == 3) {
				index = 1;
			}else {
				index += 1;
			}
			// 如果改成如下，效果是不同的自己参考，反正只有上面的顺序才行
			// index += 1;
			// if(index == 3){
			// 	index = 1;
			// }
    		animate(-730);
    		showButton ();		
    		play(); 		
    	},interval)
    }
    function stop () {
    	clearTimeout(timer);
    }

	show_container.onmouseover = stop;
	show_container.onmouseout = play;
	play();
}
checkcookie();
// 检测cookie
function checkcookie() {
	var cookie = getcookie();
	var user_mes = document.getElementsByClassName('user-mes');
	var login_cont = document.getElementsByClassName('login-cont');
	if (!cookie["userId"] && !cookie["userName"]) {		
		login_cont[0].style.display = 'block';		
		user_mes[0].style.display = 'none';
	}
	else {
		login_cont[0].style.display = 'none';		
		user_mes[0].style.display = 'block';
	}
}
// 获取所有cookie
function getcookie() {
	var cookie = {};
	var all = document.cookie;
	if (all === "") return cookie;
	var list = all.split("; ");
	for(var i = 0; i < list.length; i++) {
		var coo = list[i];
		var p = coo.indexOf("=");
		var name = coo.substring(0, p);
    	var value = coo.substring(p + 1);
    	cookie[name] = value;
	}
	return cookie;
}

