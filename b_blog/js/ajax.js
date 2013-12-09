function loadPosts(id){
	var ajax = new XMLHttpRequest();
	ajax.addEventListener("readystatechange",function(){
                switch(request.readyState){
                    case 0:
                        load_file(0);
                    break;
                    case 1:
                        load_file(25);
                    break;
                    case 2:
                        load_file(50);
                    break;
                    case 3:
                        load_file(75);
                    break;
                    case 4:
                        load_file(100);
                    break;
                }
                if(request.readyState == 4 && request.status == 200 ){
                    document.getElementById("loading").innerHTML = "课表已加载";
                    document.getElementById("temp").contentWindow.document.body.innerHTML = request.responseText;
                    output(getKB());
                    document.getElementsByTagName("table")[0].style.opacity = 1;
                    document.getElementsByClassName("load_line")[0].style.opacity = 0;
                }
            },false)
}