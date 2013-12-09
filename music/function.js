var musicName = new Array(
	"WestLife - My Love",
	"井内舞子 - Dear My Friend"
	);
var musicSrc = new Array(
	"music/mylove.aac",
	"music/dear my friend.mp3"
	);
var musicPic = new Array(
	"album0.jpg",
	"album1.jpg"
	);
window.onload=function(){
	setInterval(scroll,600);
}
function scroll(){
	var message=document.getElementById("title").innerHTML;
	message = message.substring(1,message.length) + message.substring(0,1);
	document.getElementById("title").innerHTML=message;
	document.title=message;
}

function changeM(ele,num){
	var title = document.getElementById("title");
	var audio = document.getElementById("audio");
	var name = ele.innerHTML;
	title.innerHTML = musicName[num];
	audio.src = musicSrc[num];
	var musics = document.getElementsByClassName("musics");
	for(var i = 0;i<musics.length;i++){
		musics[i].lastChild.id ="";
	}
	ele.id = "sd";
	var album = document.getElementById("album");
	album.lastChild.src = "image/"+musicPic[num];
	playit();
	setInterval(scroll,600);
}
function plt() {
	var d = document.getElementsByClassName("playlist_wrap")[0] ;
	if(d.style.opacity == 1){
		d.style.opacity = 0;
	}else{
		d.style.opacity = 1;
	}
}
function settimeone(time,ele){
	switch(time){
		case 0:
			ele.style.backgroundPosition = "0px 0px";
			break;
		case 1:
			ele.style.backgroundPosition = "-9px 0px";
			break;
		case 2:
			ele.style.backgroundPosition = "-18px 0px";
			break;
		case 3:
			ele.style.backgroundPosition = "-26px 0px";
			break;
		case 4:
			ele.style.backgroundPosition = "-35px 0px";
			break;
		case 5:
			ele.style.backgroundPosition = "-44.5px 0px";
			break;
		case 6:
			ele.style.backgroundPosition = "-53px 0px";
			break;
		case 7:
			ele.style.backgroundPosition = "-62px 0px";
			break;
		case 8:
			ele.style.backgroundPosition = "-71px 0px";
			break;
		case 9:
			ele.style.backgroundPosition = "-80px 0px";
			break;
		case 0:
			ele.style.backgroundPosition = "-89px 0px";
			break;
		default:
			ele.style.backgroundPosition = "0px 0px";
			break;
	}
}
function settime(t1,t2,t3,t4){
	var time1 = document.getElementById("time1");
	var time2 = document.getElementById("time2");
	var time3 = document.getElementById("time3");
	var time4 = document.getElementById("time4");
	settimeone(t1,time1);
	settimeone(t2,time2);
	settimeone(t3,time3);
	settimeone(t4,time4);

}
function playit(){
	var audio = document.getElementById("audio");
	var play = document.getElementById("play");
	var pause = document.getElementById("pause");
	audio.play();
	play.style.display="none";
	pause.style.display="block";
		audio.addEventListener("timeupdate" , function (){ 
        	var timeDisplay=document.getElementById("ed");
        	timeDisplay.style.width = Math.floor(audio.currentTime)/Math.floor(audio.duration) *140 +"px"; 
        	var current = Math.floor(audio.currentTime);
        	var t1 = (current - current%600)/600;
        	var t2 = (current - current%60)/60;
        	var t3 = (current%60 - current%10)/10;
        	var t4 = current%10;
        	settime(t1,t2,t3,t4);
     	}, 
     	false 
     	); 
}
function pauseit(){
	var audio = document.getElementById("audio");
	var play = document.getElementById("play");
	var pause = document.getElementById("pause");
	audio.pause();
	pause.style.display="none";
	play.style.display="block";	
}
function jdt(p){
	var ed = document.getElementById("ed");
	var width = p * 1.4;
	ed.style.width = width;
}