<?php
    require_once "jssdk.php";
    $jssdk = new JSSDK("wx66bb8cb770df5279", "b26c3485761665874b4a14f6911b51e1");
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title></title>
</head>
<body>
  	<input type="button" id="btnScan" value="Scan">
    <p><?php echo $signPackage["rawString"];?></p>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: true,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: <?php echo $signPackage["timestamp"];?>,
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                'scanQRCode'
            ]
        });

        wx.ready(function () {
            document.getElementById('btnScan').onclick = function(){
                wx.scanQRCode({
                    desc: 'scanQRCode desc',
                    needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
                    scanType: ["qrCode","barCode"], // 可以指定扫二维码还是一维码，默认二者都有
                    success: function (res) {
                        var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
                    }
                });     
            }
        });

        wx.error(function(){
            console.log('error');
        })
    </script>
</body>
</html>
