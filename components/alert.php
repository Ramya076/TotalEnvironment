<?php
use kartik\growl\Growl;
?>

<?php 
if(!empty(Yii::$app->session->getAllFlashes()))
{
    foreach(Yii::$app->session->getAllFlashes() as $type => $message)
    {
        $icon = 'fa fa-thumbs-up';
        if($type == 'success')
        {
            $icon = 'fa fa-check-circle';
        }
        else if($type == 'danger')
        {
            $icon = 'fa fa-times-circle';
        }
        else if($type == 'warning')
        {
            $icon = 'fa fa-exclamation-triangle';
        }
        else if($type == 'note')
        {
            $icon = 'fa fa-exclamation-circle';
        }
        
        $type = 'growl';    // default
        
        echo Growl::widget([
            'type' => $type,
            //'title' => 'Title',
            'icon' => $icon,
            'body' => $message,
            'showSeparator' => true,
            'delay' => 0, //This delay is how long before the message shows
            'pluginOptions' => [
                'delay' => 8000, //This delay is how long the message shows for
                'placement' => [
                    'from' => 'top',
                    'align' => 'center',
                ]
            ]
        ]);
    }
}
?>
