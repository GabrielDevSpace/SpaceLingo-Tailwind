<!DOCTYPE html>
<html>

<head>
    <title>Video Player</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <input type="file" id="srtFileInput" accept=".srt">
    <br>
    <video id="my-video" class="video-js" controls preload="auto">
        <source src="{{ asset('movies/example.mp4') }}" type="video/mp4">
        <track label="English" kind="subtitles" src="{{ asset('movies/example.srt') }}" srclang="en" default>
    </video>
    <br>
    <br>  
    <div id="subtitleContainer"></div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var player = videojs('my-video');
        });
    </script>


    <script>
        document.getElementById('srtFileInput').addEventListener('change', handleFileSelect);

        function handleFileSelect(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                const contents = event.target.result;
                const subtitles = parseSRT(contents);

                displaySubtitles(subtitles);
            };

            reader.readAsText(file);
        }

        function parseSRT(contents) {
            const subtitleLines = contents.trim().split('\n\n');
            const subtitles = [];

            for (const line of subtitleLines) {
                const lines = line.split('\n');
                const timeLine = lines[1];
                const textLines = lines.slice(2);

                const [startTime, endTime] = timeLine.split(' --> ');

                const subtitle = {
                    start: parseTime(startTime),
                    end: parseTime(endTime),
                    text: textLines.join(' '),
                };

                subtitles.push(subtitle);
            }

            return subtitles;
        }

        function parseTime(timeString) {
            const [hours, minutes, seconds] = timeString.split(':');
            const [secondsStr, milliseconds] = seconds.split(',');

            const totalSeconds =
                parseInt(hours, 10) * 3600 +
                parseInt(minutes, 10) * 60 +
                parseInt(secondsStr, 10);

            return totalSeconds + parseFloat(`0.${milliseconds}`);
        }

        function displaySubtitles(subtitles) {
            const video = document.getElementById('my-video');
            const subtitleContainer = document.getElementById('subtitleContainer');

            video.addEventListener('timeupdate', displaySubtitle);

            function displaySubtitle() {
                const currentTime = video.currentTime;

                const currentSubtitle = subtitles.find(subtitle =>
                    currentTime >= subtitle.start && currentTime <= subtitle.end
                );

                if (currentSubtitle) {
                    subtitleContainer.textContent = currentSubtitle.text;
                } else {
                    subtitleContainer.textContent = '';
                }
            }
        }
    </script>
</body>

</html>