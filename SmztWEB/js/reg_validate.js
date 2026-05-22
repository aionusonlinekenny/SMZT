// JavaScript Document
(function($){
    XYUser = {
        checkUsername:function(username){
            if (username.length < 4 || username.length > 20) { return false; }
            var reg = /^[A-Za-z0-9]*$/;
            if (!reg.test(username)) { return false; }
            return true;
        },
        checkPassword:function(password){
            if (password.length < 6 || password.length > 20) {
                return false;
            }else{
                return true;
            }
        },
        checkTwopassword:function(twopassword){
            var reg = /^[A-Za-z0-9]*$/;
            if (!reg.test(twopassword)) { return false; }

            if (twopassword.length < 6 || twopassword.length > 11) {
                return false;
            }else{
                return true;
            }
        },
        checkQQ: function(qq) {
            var reg = /^[1-9]\d{5,11}$/;
            if(qq.length > 0 && qq.length < 12 && reg.test(qq)) {
                return true;
            } else {
                return false;
            }
        },
        /*,
        checkEmail: function(email) {
            var reg = /^[-._A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/;
            if(email.length < 50 && reg.test(email)) {
                return true;
            } else {
                return false;
            }
        },
        checkRealName:function(value){
            var check = /^[\u4e00-\u9fa5]+$/.test(value);
            if(value.length < 2 || value.length > 10){
                return '真实姓名长度不正确';
            }
            if(!check){
                return '真实姓名必须是中文';
            }else{
                return true;
            }
        },
        checkRealCard:function(strRealCard){
            var getAppendZore = function(strNum){
                if(strNum < 10){ strNum = '0'+strNum; }
                return strNum;
            };
            var tmpRealCard = strRealCard;
            var tmpCityCode = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外" };

            if (tmpRealCard == ''){ return '身份证号码不能为空'; }

            // Check real card.
            var tmpRegx=new RegExp(/(^\d{15}$)|(^\d{17}(\d|x|X)$)/i);
            if (!tmpRegx.exec(tmpRealCard)){
                return '身份证号码长度必须正确，请核对！';
            }

            // Check 15 length.
            var tmpRegx=new RegExp(/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/);
            if (tmpRegx.exec(tmpRealCard)){
                tmpBirthday = '19'+tmpRealCard.substring(6,8)+'-'+tmpRealCard.substring(8,10)+'-'+tmpRealCard.substring(10,12);
            }else{
                tmpSum = 0;

                tmpRealCard = tmpRealCard.replace(/x|X$/i,"a");

                for (var i = 17; i >= 0; i--){
                    tmpSum += (Math.pow(2, i) % 11) * parseInt(tmpRealCard.charAt(17 - i), 11);
                }

                if (tmpSum % 11 != 1) {
                    return '身份证号码不符相关标准，请核对！';
                }

                tmpBirthday = tmpRealCard.substring(6,10)+'-'+tmpRealCard.substring(10,12)+'-'+tmpRealCard.substring(12,14);
            }

            // Check City.
            if (tmpCityCode[parseInt(tmpRealCard.substring(0, 2))] == null){
                return '身份证号码证件地区未知，请核对！';
            }

            // Check Birthday.
            var tmpDate = new Date(tmpBirthday.replace(/-/g, "/"));
            if (tmpBirthday != (tmpDate.getFullYear()+'-'+ getAppendZore(tmpDate.getMonth()+1)+'-'+ getAppendZore(tmpDate.getDate()))){
                return '身份证号码出生日期非法，请核对！';
            }

            //alert(tmpBirthday);
            */
            //return true;
        //},
        register: function(username, password,qq, successCall,  errorCall){
            var successCall = successCall || function(){}
            var errorCall   = errorCall || function(){}
            $.getJSON('http://www.xy.com/account/ajax_register?username='+username+'&password='+password+'&twopassword='+twopassword+'&qq='+qq+'&token='+tmpToken+'&time='+tmpTime+"&jsoncallback=?", {}, function(data){
                if (data.status == 'success'){
                    successCall(username, password);
                }else{
                    errorCall(username, password, data.status)
                }
            });
        },

        registerExtra: function(username, password, twopassword, qq, extraAttr, errorCall, successCall) {
            var successCall = successCall || function(){}
            var errorCall   = errorCall || function(){}
            $("#reg_form").submit();
        },

        login: function(username, password, isAuto, successCall, errorCall){
            var isAuto = isAuto || "yes";
            var successCall = successCall || function(){}
            var errorCall   = errorCall || function(){}
            $.getJSON(g_config.url+"Ajax/landerlogin?callback=?", {'username':username, 'password': password,'token':tmpToken,'time':tmpTime,'autologin':isAuto}, function(data){
                if(data.status == "redirect") {
                    document.location.href = "account/login";
                } else if(data.status == 'error'){
                    if(data.msg){
                        alert(data.msg);
                    }else{
                        errorCall(username, password);
                    }
                }else{
                    successCall(username, password);
                }
            });
        },
        
        loginExtra: function(username, password, isAuto, extraAttr, successCall, errorCall){
            var isAuto = isAuto || "yes";
            var successCall = successCall || function(){}
            var errorCall   = errorCall || function(){}
            $.getJSON("http://www.xy.com/account/ajax_login?username="+username+'&password='+password +'&autologin='+isAuto +"&callback=?", extraAttr, function(data){
                if(data.status == "redirect") {
                    document.location.href = "http://www.xy.com/account/login";
                } else if(data.status == 'error'){
                    if(data.msg){
                        alert(data.msg);
                    }else{
                        errorCall(username, password);
                    }
                }else{
                    successCall(username, password);
                }
            });
        },
        end:1
    }
})(jQuery)