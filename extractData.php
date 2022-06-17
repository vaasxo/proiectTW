<?php

require_once __DIR__ . '/vendor/autoload.php';
$app = new core\Application(__DIR__);
use models\Workout;

$IMAGE_DOMAIN="https://d18zdz9g6n5za7.cloudfront.net/video/320/320-";
$workoutList=[];
function string_between_two_string($str, $starting_word, $ending_word)
{
    $substring_start = strpos($str, $starting_word);
    if($substring_start===false)
        return 0;
    //Adding the strating index of the strating word to
    //its length would give its ending index
    $substring_start += strlen($starting_word);
    //Length of our required sub string
    $size = strpos($str, $ending_word, $substring_start) - $substring_start;
    if($size===false)
        return 0;
    // Return the substring from the index substring_start of length size
    return substr($str, $substring_start, $size);
}
function getContext(){
    return stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );
}
function getVideo($url){
    $VIDEO_DOMAIN="https://www.fitnessblender.com/videos/";
    if($url==0)
        return 0;
    $context = getContext();
    $content = file_get_contents($VIDEO_DOMAIN.$url,false,$context);
    preg_match('#<a class="alt-player" href="(.*)" target="_blank"#', $content, $videoURL);
    return $videoURL[1];
}
function screenScrapping($url,$pageNumber){
    $context = getContext();
    $content = file_get_contents($url,false,$context);
    preg_match_all('#window.Laravel.searchInit = \{"current_page":'.$pageNumber.',"data":\[(.*)\]#', $content, $workouts);
    return explode('},{',$workouts[1][0]);
}
function generateURL($pages): array
{
    $url_list=[];
    for($i=0;$i<$pages;$i++)
        if($i==0)
            array_push($url_list,'https://www.fitnessblender.com/videos?exclusive%5B%5D=0');
        else{
            $pageNumber=$i+1;
            array_push($url_list,"https://www.fitnessblender.com/videos?page={$pageNumber}&exclusive%5B%5D=0");
        }

    return $url_list;

}
$url_list=generateURL(30);
$pageNumber=1;
//array_push($workoutList,screenScrapping($item,$pageNumber));
foreach ($url_list as $key=>$item) {
    array_push($workoutList,screenScrapping($item,$pageNumber));
    $pageNumber++;
}

$workoutCount=0;
foreach($workoutList as $key=>$workoutPage)
foreach($workoutPage as $key=>$value)
{
    $calorieMin=string_between_two_string($value,'"burnmin":',',');
    $calorieAvg=string_between_two_string($value,'"burnavg":',',');
    $difficulty=string_between_two_string($value,'"difficulty":',',');
    $image=$IMAGE_DOMAIN.string_between_two_string($value,'"image":"','",');
    $video=getVideo(string_between_two_string($value,'"seo_url":"','",'));
    $duration=string_between_two_string($value,'"minutes":',',');
    $calorieMax=string_between_two_string($value,'"burnmax":',',');
    $title=string_between_two_string($value,'"title":"','",');
    $type=string_between_two_string($value,'"body_focus_output":"','"');
    echo 'Type is: '.$type.PHP_EOL;
    if($calorieMin!=0 &&$calorieAvg!=0 &&$difficulty!=0 &&$image!=0 &&$video!=0 &&$duration!=0 &&$calorieMax!=0 &&$title!=0 &&$type!=0){
        $workout=new Workout($title,$duration,$type,$difficulty,$calorieMin,$calorieAvg,$calorieMax,$image,$video);
        $workout->save();
        $workoutCount=$workoutCount+1;
        echo 'Inserted workout number '.$workoutCount.' in db.'.PHP_EOL;
    }

}
echo $workoutCount;
//preg_match_all(,$workouts,$workout,PREG_OFFSET_CAPTURE);



