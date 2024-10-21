<?php


# By default PRODUCTION settings
$adminEmail = 'admin@example.com';
$senderEmail = 'noreply@example.com';
$senderName = 'Example.com mailer';
$bsDependencyEnabled = false;
$defaultPageSize = 10;

$is_production = true;
$resendMailAfter = 120; // seconds
$signupVerificationRequired = 1;

$smtpConfig = [
    'Host' => '',
    'Port' => 587,
    'SMTPSecure' => 'TLS',
    'Username' => 'test',
    'Password' => 'test',
    'From' => 'noreply@test.com',
    'FromName' => '',
];



/***  if production FALSE in root index.php, Then overwrite necessary DEVELOPMENT settings ***/
if (!YII_ENV_PROD) {
    $is_production = false;
    $resendMailAfter = 120; // seconds
    $signupVerificationRequired = 1;

    $smtpConfig = [
        'Host' => 'smtp.gmail.com',
        'Port' => 465,
        'SMTPSecure' => 'ssl',
        'Username' => 'noreplyformyemail@gmail.com',
        'Password' => '',
        'From' => 'noreply@test.com',
        'FromName' => '',
    ];
}

return [
    'adminEmail' => $adminEmail,
    'senderEmail' => $senderEmail,
    'senderName' => $senderName,
    'bsDependencyEnabled' => $bsDependencyEnabled,
    'defaultPageSize' => $defaultPageSize,
    'is_production' => $is_production,
    'smtpConfig' => $smtpConfig,
    'resendMailAfter' => $resendMailAfter,
    'bsVersion' => '5.x',
    'loginAttemptAllowedWithoutCaptcha' => 3,
    'reCaptcha_siteKey' => '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI', // replace with your site key
    'reCaptcha_secret' => '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',// replace with your secret key

    'signupVerificationRequired' => $signupVerificationRequired,
];
