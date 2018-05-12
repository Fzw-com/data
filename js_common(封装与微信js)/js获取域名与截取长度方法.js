/* 
* @Author: Marte
* @Date:   2018-04-25 21:00:53
* @Last Modified by:   Marte
* @Last Modified time: 2018-05-12 23:50:38
*/

//原生js实现字符串长度截取
function cutstr (str,len){
    var temp;
    var icount = 0;
    var patrn = /[^\x00-\xff]/; //匹配双字节字符（包括汉字在内）
    var strren = "";
    for(var i = 0;i<str.length;i++){
        if(icount<len-1){
            temp = str.substr(i,1);
            if(patrn.exec(temp)==null){
                icount = icount+1;
            }else{
                icount = icount +2;
            }
        }else{
            break;
        }
    }
    return strre + "...";
}
//原生js获取域名主机
function getHost(url){
    var host = 'null';
    if(typeof url ==undefined || url ===null){
        url = window.location.href;
    }
    var regex = /^\w+\:\/\/([^\/]*).*/;
    var match = url.match(regex);
    if(typeof match != undefined && match !=null){
        host = match[1];
    }
    return host;
}