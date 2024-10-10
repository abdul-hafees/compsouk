<head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <style type="text/css">
        body {margin: 0; padding: 0; min-width: 100%!important; font-family: 'Ubuntu', sans-serif;}
        img {height: auto;}
        .content {width: 100%; max-width: 660px;}
        .innerpadding {padding: 30px 30px 30px 30px; line-height: 25px;}
        .borderbottom {border-bottom: 1px solid #f2eeed;}
        .button a {color: #ffffff; text-decoration: none;}
        .footer {padding: 20px 30px 20px 30px;}
        .footercopy {font-size: 14px; color: #ffffff;}
        .footercopy a {color: #ffffff; text-decoration: underline;}
        @media  only screen and (max-width: 550px), screen and (max-device-width: 550px) {
            body[yahoo] .hide {display: none!important;}
            body[yahoo] .buttonwrapper {background-color: transparent!important;}
            body[yahoo] .button {padding: 0px!important;}
            body[yahoo] .button a {background-color: #effb41; padding: 15px 15px 13px!important;}
            body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
        }
    </style>
</head>
<body>
<br>
<table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <td class="innerpadding borderbottom" style="padding-top: 0px;">
            Hi ,
            <br />
            <br />
            Please login with your otp code. otp code is {{ $attributes['otp_code'] }} <br>
            Thanks & Regards <br>
            Zedeo
        </td>
    </tr>
    <tr>
        <td class="footer" bgcolor="#F0F0F0">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td align="center" class="footercopy" style="color: black;">
                        © {{ date('Y') }} Zedeo, All rights reserved.
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
