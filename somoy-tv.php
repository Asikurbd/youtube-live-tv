<?php
 
/**
 * Function to get the .m3u8 URL of a YouTube video.
 *
 * @param string $videoId The YouTube video ID.
 *
 * @return string The .m3u8 URL of the YouTube video.
 */
function getM3U8Url($videoId) {
    // Construct the YouTube video URL
    $youtubeUrl = "https://www.youtube.com/@somoynews360/live" . $videoId;
 
    // Fetch the YouTube video page content
    $videoPageContent = file_get_contents($youtubeUrl);
 
    // Extract the .m3u8 URL from the video page content
    preg_match('/"hlsManifestUrl":"(.*?)"/', $videoPageContent, $matches);
    $m3u8Url = $matches[1];
 
    return $m3u8Url;
}
 
// Example usage
$videoId = "";
$m3u8Url = getM3U8Url($videoId);
echo "{$videoId} 

<meta http-equiv='refresh' content='0; url={$m3u8Url}'/>

";
 
?>
