<?php

namespace app\components;

use yii\helpers\Html;
use Yii;
use yii\base\Component;
use kartik\switchinput\SwitchInput;
use yii\data\ActiveDataProvider;


class Utility extends Component
{

    /**
     * Get the password policy configuration.
     *
     * @return object The password policy configuration object containing minimum and maximum length, pattern, and corresponding messages.
     */
    public static function passwordPolicy()
    {
        $reply = [
            "min_length" => 8,
            "min_length_msg" => "Password must contain at least 8 characters",
            "max_length" => 50,
            "max_length_msg" => "Password must contain maximum 50 characters",
            "pattern" => '/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/',
            "pattern_msg" => "Password must contain at least one Lower case, one Upper case character and a digit",
        ];

        return (object)$reply;
    }



    /**
     * Get the currency symbol.
     *
     * @return string The currency symbol.
     */
    public static function getcurrency()
    {
        $reply = 'Rs.';

        return $reply;
    }

    /**
     * Format a currency amount.
     *
     * @param float $amount The amount to format.
     * @param bool $withCurrencySymbol Whether to include the currency symbol (default: true).
     * @return string The formatted currency string.
     */
    public static function formatCurrency($amount = 0, $withCurrencySymbol = true)
    {
        $reply = '';

        $amount = sprintf('%0.2f', $amount);

        if ($withCurrencySymbol) {
            $currency = self::getcurrency();
            $reply = $currency . $amount;
        } else {
            $reply = $amount;
        }

        return $reply;
    }

    /**
     * Masks alternate characters of an email address.
     *
     * @param string $email The email address to mask.
     * @return string The masked email address.
     */
    public static function maskAlternate($email)
    {
        $maskedEmail = '';
        $splitEmail = explode('@', $email);
        $local = (isset($splitEmail[0])) ? $splitEmail[0] : '';

        for ($i = 0; $i < strlen($local); $i++) {
            $maskedEmail .= ($i % 2 !== 0) ? '*' : $local[$i];
        }

        if (isset($splitEmail[1])) // if email id
        {
            $domain = $splitEmail[1];

            $maskedEmail .= '@';

            $maskedEmail .= $domain;
        }

        return $maskedEmail;
    }

    /**
     * Compresses an image and saves it to the specified path.
     *
     * @param string $source The path to the source image file.
     * @param string $path The destination path for the compressed image.
     * @return bool True on success, false on failure.
     */
    public static function compressImage($source, $path)
    {
        $info = getimagesize($source);
        $destination = Yii::getAlias('@webroot') . $path;
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        return imagejpeg($image, $destination);
    }

    /**
     * Gets the name to be used in the "From" field of an email.
     *
     * @return string The name for the "From" field of an email.
     */
    public static function getFromEmailName()
    {
        $fromEmailName = '';

        return $fromEmailName;
    }


    /**
     * Sends an email using SMTP.
     *
     * @param string|array $to The recipient email address(es).
     * @param string $subject The subject of the email.
     * @param string $body The body content of the email.
     * @param string|null $cc The CC email address(es) (optional).
     * @return string The status of the email sending process.
     */
    public static function sendEmail($to, $subject, $body, $cc = NULL)
    {
        $smtpConfig = Yii::$app->params['smtpConfig'];
        $fromEmailName = Utility::getFromEmailName();

        require_once(Yii::$app->basePath . '/components/phpmail/class.phpmailer.php');
        require_once(Yii::$app->basePath . '/components/phpmail/class.smtp.php');

        $mail_obj = new \PHPMailer();
        $mail_obj->IsSMTP();
        //$mail_obj->SMTPDebug = 3;
        $mail_obj->CharSet      = 'UTF-8';
        $mail_obj->SMTPAuth     = true;
        $mail_obj->SMTPSecure   = $smtpConfig['SMTPSecure'];
        $mail_obj->Host         = $smtpConfig['Host'];
        $mail_obj->Port         = $smtpConfig['Port'];
        $mail_obj->Username     = $smtpConfig['Username'];
        $mail_obj->Password     = $smtpConfig['Password'];
        $mail_obj->From         = $smtpConfig['From'];
        $mail_obj->FromName     = ($fromEmailName != '') ? $fromEmailName : $smtpConfig['FromName'];
        $mail_obj->Subject      = $subject;
        $mail_obj->Body         = $body;
        $logoPath = Yii::$app->basePath . '/web/admin/title.png';
        $logoContent = file_get_contents($logoPath);
        $mail_obj->addStringEmbeddedImage($logoContent, 'logo', 'logo.png', 'base64', 'image/png');
        $mail_obj->isHTML(true);
        $mail_obj->addAddress($to);

        if (is_array($cc) && count($cc) > 0) {
            foreach ($cc as $cc_address) {
                $mail_obj->addCC($cc_address);
            }
        } else if (!is_array($cc) && $cc != '') {
            $mail_obj->addCC($cc);
        }

        if ($mail_obj->send()) {
            $reply = 'success';
        } else //
        {
            $res = "Mailer Error: " . $mail_obj->ErrorInfo;
            $reply = $res;
            
        }
        return $reply;
    }

    /**
     * Gets the status label based on the status value.
     *
     * @param int $status The status value.
     * @return string The status label.
     */
    public static function getStatus($status)
    {
        if ($status == 1) {
            return 'Active';
        } else if ($status == 0) {
            return 'Inactive';
        } else if ($status == -1) {
            return 'Deleted';
        } else {
            return '--';
        }
    }
    /**
     * Formats a datetime string into 'd-m-Y h:i A' format.
     *
     * @param string $data The datetime string.
     * @return string The formatted datetime string.
     */

    public static function getDateTime($data)
    {
        if ($data != '') {
            return date('d-m-Y h:i A', strtotime($data));
        } else {
            return '--';
        }
    }
    /**
     * Formats a date string into 'd-m-Y' format.
     *
     * @param string $data The date string.
     * @return string The formatted date string.
     */
    public static function getDate($data)
    {
        if ($data != '') {
            return date('d-m-Y', strtotime($data));
        } else {
            return '--';
        }
    }
    /**
     * Generates a SwitchInput widget for status control.
     *
     * @param int $id The ID of the item.
     * @param int $status The status value.
     * @return string The HTML markup for the SwitchInput widget.
     */
    public static function getStatusWidget($id, $status)
    {
        return SwitchInput::widget([
            'name' => 'status',
            'value' => $status,
            'pluginEvents' => [
                'switchChange.bootstrapSwitch' => "function (e) { change_status($id, e.currentTarget.checked); }"
            ],
            'pluginOptions' => [
                'size' => 'mini',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Active',
                'offText' => 'Inactive',
            ],
        ]);
    }

    /**
     * Clears HTML tags from a string, ensuring balanced tag sequences.
     *
     * @param string $string The input string containing HTML tags.
     * @param int $offset The starting offset within the string to search for tags.
     * @return array An array containing the modified content and the updated offset.
     */
    public static function cleartags($string, $offset)
    {
        $stringlength = strlen($string);
        //$dummystring = htmlentities($string); // Unused

        if ($offset >= $stringlength) {
            // This offset is at the end of the string
            return [
                'content' => $string,
                'offset' => strlen($string) + 1
            ];
        }

        $content = $string;

        $starting_position = strpos(($string), '<', $offset);
        $end_position = strpos($string, '>', $offset);
        $second_start_position = strpos($string, '<', $starting_position + 1);

        // If there is no closing > for the opening < character then decode it with &lt;
        if (($starting_position === false || $starting_position > $end_position) && $end_position !== false) {
            $content = substr_replace($string, '&gt;', $end_position, 0);
            $content = substr($content, 0, $end_position + 4) . substr($content, $end_position + 5);
            $offset = $end_position + 1;
        } else if ($second_start_position !== false && $end_position !== false && $end_position > $second_start_position) {
            $content = substr_replace($string, '&lt;', $starting_position, 0);
            $content = substr($content, 0, $starting_position + 4) . substr($content, $starting_position + 5);

            $offset = $second_start_position;
        } else if ($end_position !== false) {
            /*
            * Else If it has closing > then we need to check whether it's a html element or not if it's non html then we
            * need to decode the < > characters of the string because it's non-html
            */

            $length = $end_position - $starting_position;
            $fetchword = substr($string, $starting_position, $length);

            $fetchword = explode(" ", htmlentities($fetchword));

            $tags = [
                '<span', '</span', '<em', '</em', '<ul', '</ul',
                '<ol', '</ol', '<li', '</li', '<strong', '</strong',
                '<sup', '</sup', '<br', '</br', '<div', '</div',
                '<s', '</s', '<hr', '</hr', '<a', '</a', '<u', '</u',
                '<b', '</b', '<strike', '</strike',
                '<p', '</p', '<td', '</td', '<tr', '</tr', '<th', '</th',
                '<table', '</table', '<tbody', '</tbody', '<font', '</font', '<i', '</i'
            ];

            $fetchword[0] = html_entity_decode($fetchword[0]);
            //If it's html then skip it.
            if (in_array(trim($fetchword[0]), $tags)) {
                $offset = $end_position + 1;
            } else { //If it's non-html then decode  < > characters
                if (strpos($string, '<', $offset) !== false && strpos($string, '>', $offset) !== false) {
                    $starting_position = strpos($string, '<', $offset);
                    $content = substr_replace($string, '&lt;', $starting_position, 0);
                    $content = substr($content, 0, $starting_position + 4) . substr($content, $starting_position + 5);

                    $ending_position = strpos($content, '>', $offset);
                    $content = substr_replace($content, '&gt;', $ending_position, 0);
                    $content = substr($content, 0, $ending_position + 4) . substr($content, $ending_position + 5);

                    $stringlength = strlen($content);
                    if ($stringlength > $ending_position) {
                        $offset = $ending_position + 1;
                    }
                } else if (strpos($string, '<', $offset) !== false) {
                    $content = str_replace('<', "&lt;", $string);
                    $stringlength = strlen($content);
                    $offset = $stringlength + 1;
                } else {
                    $stringlength = strlen($content);
                    $offset = $stringlength + 1;
                    $content = $string;
                }
            }
        } else if ($starting_position !== false) {
            $starting_position2 = strpos($string, '<', $offset);
            $content = substr_replace($string, '&lt;', $starting_position2, 0);
            $content = substr($content, 0, $starting_position2 + 4) . substr($content, $starting_position2 + 5);
            $offset = $starting_position2 + 1;
        }

        return [
            'content' => $content,
            'offset' => $offset
        ];
    }
    /**
     * Formats a text editor string for display.
     *
     * @param string|null $string The input string to be formatted (optional).
     * @return string The formatted string.
     */

    public static function display_text_editor_string($string = null)
    {
        $string = trim($string);

        if (empty($string)) {
            // Empty string
            return '';
        }

        //Replacing + with another keyword
        $string = str_replace('+', '-@-plus-@-', $string);

        /* $string = urldecode($string); */

        // Decode angle brackets
        $string = str_replace('&lt;', '<', $string);
        $string = str_replace('&gt;', '>', $string);

        // Encode apostrophes and quotation marks
        $string = str_replace("'", "&#39;", $string);
        //$string = str_replace('"', '&quot;', $string);

        // Fixed broken quotation mark entities
        $string = str_replace('& quot', '&quot', $string);

        // Spot encode HTML tags
        $string = Utility::string_replace_html($string);

        if (strpos($string, '<') === false) {
            // Put + symbols back
            $string = str_replace('-@-plus-@-', '+', $string);

            return Utility::string_replace_except_tag($string);
        }

        for ($offset = 0; $offset < strlen($string);) {
            $content_array = Utility::cleartags($string, $offset);
            $string = $content_array['content'];
            $offset = $content_array['offset'];

            if ($offset >= strlen($string)) {
                // Offset is at the end of the string
                break;
            }

            $lt_chevron = strpos($string, '<', $offset);
            $gt_chevron = strpos($string, '>', $offset);

            if ($lt_chevron === false && $gt_chevron === false) { //If no chevron after offset
                break;
            }
        }

        // Put + symbols back
        $string = str_replace('-@-plus-@-', '+', $string);

        return Utility::string_replace_except_tag($string);
    }

    /**
     * Replaces HTML entities with their corresponding characters.
     *
     * @param string|null $content The input content to be processed (optional).
     * @return string The processed content.
     */
    public static function string_replace_html($content = NULL)
    {
        $content = str_replace('&nbsp;', " ", $content);
        $content = str_replace("&amp;", "&", $content);
        $content = str_replace("&#39;", "'", $content);
        $content = str_replace('&lt;', "<", $content);
        $content = str_replace('&gt;', ">", $content);

        return $content;
    }

    /**
     * Replaces HTML entities with their corresponding characters.
     *
     * @param string|null $content The input content to be processed (optional).
     * @return string The processed content.
     */
    public static function string_replace_except_tag($content = NULL)
    {
        $content = str_replace('&nbsp;', " ", $content);
        $content = str_replace("&amp;", "&", $content);
        $content = str_replace("&#39;", "'", $content);

        return $content;
    }

    /**
     * Calculate age from date of birth.
     *
     * @param string $dob The date of birth in the format 'YYYY-MM-DD'.
     * @return int The calculated age.
     */
    function calculateAge($dob)
    {
        $dobTimestamp = strtotime($dob);
        $now = time();
        $age = date('Y', $now) - date('Y', $dobTimestamp);
        if (date('md', $now) < date('md', $dobTimestamp)) {
            $age--;
        }
        return $age;
    }
    /**
     * Generate a random password.
     *
     * @param int $length The length of the password to generate.
     * @return string The randomly generated password.
     */
    function generateRandomPassword($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    
    /**
     * Validate an email address.
     *
     * @param string $email The email address to validate.
     * @return bool True if the email address is valid, false otherwise.
     */
    function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
