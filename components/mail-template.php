<?php
use yii\helpers\Url;
?>
<html>
<head>
	<title></title>
</head>
<body style="padding: 0px; margin: 0px;">

<div style="background: #edecfa;">
    <table width="760" align="center" style="background:#fff;-webkit-box-shadow: 0px 0px 11px 0px rgba(201,201,201,1);-moz-box-shadow: 0px 0px 11px 0px rgba(201,201,201,1); box-shadow: 0px 0px 11px 0px rgba(201,201,201,1);">
        <thead>
            <tr>
                <th style="padding: 15px 30px; border-bottom: 1px solid #ededed;">
                    <img src="cid:logo" width="200px" alt="logo" />
                </th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td style="padding: 50px 0;">
                    
                    <?php echo (isset($content) ? $content : ''); ?>
                    
              </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" align="center" style="background:#007bff; color:#fff; margin-top:21px;">
        <tbody>
            <tr align="center">
                <td style="padding:8px 0px 8px;">©<?php echo date('Y'); ?> Yii Basic Project - All rights reserved.</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>