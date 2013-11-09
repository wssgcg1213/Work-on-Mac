/**
HAHAHAHAHAHAHAHHAHAHAHAHAHHAHAHAHAHAHA
 * UserNow: B1ackRainFlake
 * Tnanks to Soul
 * Date: 2013-10-13
 * Time: 11:19 P.M.
 */ var d = document;
    var weekend = ["星期一","星期二","星期三","星期四","星期五","星期六","星期日"];
    var hash_time_go = ["first","second","third","fourth","fifth","sixth"];
    var hash_time = ["一二节","三四节","五六节","七八节","九十节","十一二"];
    var student_information;
    var hash_class = {};

    for(var i = 0 ; i< weekend.length; i++){
        hash_class[weekend[i]] = {};
    }
    for(var i = 0, p = 1 ; i < weekend.length; i++){
        hash_class[weekend[i]] = {};
        for(var k = 0,z = 1; k < hash_time.length ; k ++){
            hash_class[weekend[i]][hash_time[k]] = d.getElementsByClassName(hash_time_go[k])[p]
        }
        p++;
    }


        function update(){
            student_information = {};
            for(var i = 0 ; i < hash_time_go.length ; i++){
                for(var k = 1 ; k < d.getElementsByClassName(hash_time_go[i]).length; k++){
                    d.getElementsByClassName(hash_time_go[i])[k].innerText = " ";
                }
            }
            for(var i = 0 ; i< weekend.length; i++){
                student_information[weekend[i]] = {};
            }
        }



        function getNumber(id){    
            return document.getElementById("id").value;
         };


        function getKB(){        
            var iframe = document.getElementById("temp");
            var x = iframe.contentWindow.document.getElementsByTagName("table")[0].rows;
            for(var i = 1 ; i < x.length ; i++){
                for(var k = 1 ; k < x[i].getElementsByTagName("td").length ; k++){
                   // if(x[i].getElementsByTagName("td")[k].innerText.match("选课状态")){
                        var kweek = x[0].getElementsByTagName("td")[k].innerText.slice(0,3);
                        var time = x[i].getElementsByTagName("td")[0].innerText.slice(0,3);
                        student_information[kweek][time] = "";
                        student_information[kweek][time] = x[i].getElementsByTagName("td")[k].innerText;
                        
                   // }

                }
            }

            return student_information;
        };



        function judget_string(who){
            var judgement = /\d{10}/.test(who);
            return judgement;
        }

        function load_file(precent){
            document.getElementById("loading").innerHTML = precent + "%";
            document.getElementById("loading").style.width = precent + "%";
        }

        /* 跨域请求 */
        function getAll(number){
            var request = new XMLHttpRequest();
            request.addEventListener("readystatechange",function(){
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
            request.open("GET","http://test.treeforests.com/homework/getKB.php?number="+number,true);

            request.send();
        };


    function output(stu){
        for(i=0;i<7;i++){
            for(j=0;j<6;j++){
                   if(stu[weekend[i]][hash_time[j]].length > 4){
                     //   document.getElementById("cla"+j+i).setAttribute("class","success");
                        stu[weekend[i]][hash_time[j]] = '<pre>'+stu[weekend[i]][hash_time[j]]+'</pre>';
                   }
                    document.getElementById("cla"+j+i).innerHTML = stu[weekend[i]][hash_time[j]] ;
            }
        }

    }


document.getElementById("get").onclick = function(){
var number = document.getElementById("id").value;
document.getElementsByClassName("load_line")[0].style.opacity = 1;
document.getElementsByClassName("load_line")[0].style.margin = "-10px auto auto atuo";
update();
getAll(number);

};
