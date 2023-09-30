<form method='post' class="hide-submit d-flex justify-content-center iconContainer align-items-center"
    id="buttonWrapper">

    <input type="hidden" name="action" value="emotion" />
    <label>
        <input type="submit" name=happyIcon id="happyIcon" />
        <svg class="btn emotionIcon happyIcon" id="happyIcon"
            onclick="document.getElementById('msg').innerHTML += ('<?php emotion("happyIcon") ?>');"
            xmlns="http://www.w3.org/2000/svg" height="13em" viewBox="0 0 512 512" style="fill:#25D937">
            <path id="happyIcon"
                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
        </svg>
    </label>
    <label>
        <input type="submit" name=midIcon id="midIcon" />
        <svg class="btn emotionIcon midIcon" id="midIcon" style="fill:#E5E827"
            onclick="document.getElementById('msg').innerHTML += ('<?php emotion("midIcon") ?>'); "
            xmlns="http://www.w3.org/2000/svg" height="13em" viewBox="0 0 512 512">
            <path id="midIcon"
                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM176.4 176a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm128 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM160 336H352c8.8 0 16 7.2 16 16s-7.2 16-16 16H160c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
        </svg>
    </label>
    <label>
        <input type="submit" name=sadIcon id="sadIcon" />
        <svg class="btn emotionIcon sadIcon" id="sadIcon" style="fill:#DA2626"
            onclick="document.getElementById('msg').innerHTML += ('<?php emotion("sadIcon") ?>');"
            xmlns="http://www.w3.org/2000/svg" height="13em" viewBox="0 0 512 512">
            <path id="sadIcon"
                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM159.3 388.7c-2.6 8.4-11.6 13.2-20 10.5s-13.2-11.6-10.5-20C145.2 326.1 196.3 288 256 288s110.8 38.1 127.3 91.3c2.6 8.4-2.1 17.4-10.5 20s-17.4-2.1-20-10.5C340.5 349.4 302.1 320 256 320s-84.5 29.4-96.7 68.7zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
        </svg>
    </label>
</form>

<?php


function emotion($emotionMeter)
{
    $dbConnection = createConnection();
    $idActivity = getIdActivity();
    $sql = "INSERT INTO visitor (idActivity, emotion)
              VALUES ($idActivity, $emotionMeter)";

    if ($dbConnection->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $dbConnection->error;
    }
    endConnection($dbConnection);
}


?>