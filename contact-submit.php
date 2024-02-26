<?PHP
if(empty($_POST['email']) || empty($_POST['message'])){
    echo "Message or EMail field empty!";
    exit;
}

//
//-- https://gist.github.com/Mo45/cb0813cb8a6ebcd6524f6a36d4f8862c
//
    function discordmsg($msg, $webhook) {
        if($webhook != "") {
            $ch = curl_init( $webhook );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $msg);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
 
            $response = curl_exec( $ch );
            // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
            echo $response;
            curl_close( $ch );
        }
    }
 
    // URL FROM DISCORD WEBHOOK SETUP
    $webhook = "https://discord.com/api/webhooks/1211822396722642975/N7PHrdTAu7Oi1TB0NmYdSLctUxJ3-zMYl9sj9gi1C8i4VVgX3wXVL7L-KyyHTj8yhdb3"; 
    $timestamp = date("c", strtotime("now"));
    $msg = json_encode([
    // Message
    "content" => "",
 
    // Username
    "username" => "ARNCH.TOP Support",
 
    // Avatar URL.
    // Uncomment to use custom avatar instead of bot's pic
    "avatar_url" => "https://arnch.top/static/images/ARNCH.TOP.png",
 
    // text-to-speech
    "tts" => false,
 
    // file_upload
    // "file" => "",
 
    // Embeds Array
    "embeds" => [
        [
            // Title
            "title" => $_POST['email'],
 
            // Embed Type, do not change.
            "type" => "rich",
 
            // Description
            "description" => $_POST['message'],
 
            // Link in title
            //"url" => "https://gist.github.com/Mo45/cb0813cb8a6ebcd6524f6a36d4f8862c",
 
            // Timestamp, only ISO8601
            "timestamp" => $timestamp,
 
            // Left border color, in HEX
            "color" => hexdec( "3366ff" ),
 
            // Footer text
            //"footer" => [
            //    "text" => "GitHub.com/Mo45",
            //    "icon_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=375"
            //],
 
            // Embed image
            //"image" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=600"
            //],
 
            // thumbnail
            //"thumbnail" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=400"
            //],
 
            // Author name & url
            "author" => [
                "name" => "ARNCH.TOP Support",
                "url" => "https://arnch.top/"
            ],
 
            // Custom fields
            "fields" => [
                // Field 1
                //[
                //    "name" => "Field #1",
                //    "value" => "Value #1",
                 //   "inline" => false
                //],
                // Field 2
                //[
                 //   "name" => "Field #2",
                    //"value" => "Value #2",
                   // "inline" => true
                //]
                // etc
            ]
        ]
    ]
 
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
 
    discordmsg($msg, $webhook); // SENDS MESSAGE TO DISCORD
    echo "Your message hes been sent!";
?>