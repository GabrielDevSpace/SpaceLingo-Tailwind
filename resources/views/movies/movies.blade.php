<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Movies
        </h2>
    </x-slot>
    <div>
        <div id="main" class="grid grid-cols-4 justify-evenly">
            <div class="">
                <div class="max-w-6xl mx-auto py-2 sm:px-6 lg:px-8">
                    <div class="flex flex-col ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-3">
                                    Teste
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="max-w-6xl mx-auto py-2 sm:px-6 lg:px-8">
                    <div class="flex flex-col ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-3">
                                    <div id="main" class="grid grid-cols-1 justify-center items-center text-center">
                                        <input type="file" id="srtFileInput" accept=".srt">
                                        <video id="my-video" class="video-js" controls preload="auto" style="width:100%;height:400px">
                                            <source src="{{ asset('movies/example3.mp4') }}" type="video/mp4">
                                        </video>
                                        <div id="subtitleContainer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            const subtitleLines = [];

            for (let i = 0; i < 5; i++) {
                const line = document.createElement('p');
                line.textContent = subtitles[i].text;
                subtitleLines.push(line);
                subtitleContainer.appendChild(line);
            }

            let currentSubtitleIndex = 2;
            setSubtitleStyle();

            video.addEventListener('timeupdate', displaySubtitle);

            function displaySubtitle() {
                const currentTime = video.currentTime;

                let newSubtitleIndex = currentSubtitleIndex;

                // Find the current subtitle index
                for (let i = 0; i < subtitles.length; i++) {
                    if (currentTime >= subtitles[i].start && currentTime <= subtitles[i].end) {
                        newSubtitleIndex = i;
                        break;
                    }
                }

                if (newSubtitleIndex !== currentSubtitleIndex) {
                    currentSubtitleIndex = newSubtitleIndex;

                    setSubtitleStyle();

                    // Update the displayed lines
                    const startLineIndex = Math.max(0, currentSubtitleIndex - 2);
                    const endLineIndex = Math.min(startLineIndex + 4, subtitles.length - 1);

                    for (let i = 0; i < subtitleLines.length; i++) {
                        subtitleLines[i].textContent = subtitles[startLineIndex + i].text;
                    }

                    // Scroll to the current subtitle line
                    const highlightedLine = subtitleLines[2];
                    subtitleContainer.scrollTop = highlightedLine.offsetTop - subtitleContainer.offsetTop;
                }
            }

            function setSubtitleStyle() {
                for (let i = 0; i < subtitleLines.length; i++) {
                    subtitleLines[i].style.fontWeight = 'normal';
                    subtitleLines[i].style.color = '#c4c4c4';
                }

                if (currentSubtitleIndex === 0 || currentSubtitleIndex === 1) {
                    subtitleLines[currentSubtitleIndex].style.fontWeight = 'bold';
                    subtitleLines[currentSubtitleIndex].style.color = 'black';
                } else if (currentSubtitleIndex === subtitles.length - 1 || currentSubtitleIndex === subtitles.length - 2) {
                    subtitleLines[4 - (subtitles.length - 1 - currentSubtitleIndex)].style.fontWeight = 'bold';
                    subtitleLines[4 - (subtitles.length - 1 - currentSubtitleIndex)].style.color = 'black';
                } else {
                    subtitleLines[2].style.color = 'black';
                    subtitleLines[2].style.fontWeight = 'bold';
                }
            }
        }
    </script>
</x-app-layout>