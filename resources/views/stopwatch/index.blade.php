<!DOCTYPE html>
<html>
<head>
    <title>Online Stopwatch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .stopwatch {
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 20px;
        }
        .stopwatch p {
            display: inline-block;
            margin: 0 5px;
        }
        .controls {
            text-align: center;
        }
        .controls button {
            font-size: 1.2em;
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .controls button.pause {
            background-color: #f44336;
            color: white;
        }
        .controls button.resume {
            background-color: #4caf50;
            color: white;
        }
        .controls button:hover {
            background-color: #ddd;
        }
        .laps {
            margin-top: 20px;
            text-align: center;
        }
        .laps button {
            font-size: 1em;
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .laps ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .laps ul li {
            display: inline-block;
            margin-right: 10px;
        }
        #backToMenu {
            text-align: center;
            margin-top: 20px;
        }
        #backToMenu button {
            font-size: 1.2em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4caf50;
            color: white;
            transition: background-color 0.3s ease;
        }
        #backToMenu button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Online Stopwatch</h1>
        <div class="stopwatch">
            <p id="stopwatchDisplay">00:00:00:00</p>
        </div>
        <div class="controls">
            <button id="start">&#x25B6; Start</button>
            <button id="stop" class="pause">&#x2016; Stop</button>
            <button id="reset">Reset</button>
        </div>
        <div class="laps">
            <button id="lapButton" disabled>Lap</button>
            <ul id="lapTimes"></ul>
        </div>
    </div>

    <div id="backToMenu">
        <a href="{{ route('home') }}"><button>Back to Menu</button></a>
    </div>

    <script>
        let btnStart = document.getElementById("start");
        let btnStop = document.getElementById("stop");
        let btnReset = document.getElementById("reset");
        let btnLap = document.getElementById("lapButton");
        let stopwatchDisplay = document.getElementById("stopwatchDisplay");

        let startTimer;
        let ms = 0;
        let seg = 0;
        let min = 0;
        let hr = 0;

        function start() {
            startTimer = setInterval(function () {
                ms++;

                if (ms === 100) {
                    seg++;
                    ms = 0;
                }

                if (seg == 60) {
                    min++;
                    seg = 0;
                }

                if (min == 60) {
                    hr++;
                    min = 0;
                }

                updateStopwatchDisplay();
            }, 10);
            btnStart.classList.add("ativo");
            btnStop.classList.remove("ativo");
            btnLap.disabled = false;
        }

        function stop() {
            clearInterval(startTimer);
            btnStop.classList.add("ativo");
            btnStart.classList.remove("ativo");
            btnLap.disabled = true;
        }

        function reset() {
            clearInterval(startTimer);
            ms = 0;
            seg = 0;
            min = 0;
            hr = 0;
            updateStopwatchDisplay();
            btnStart.classList.remove("ativo");
            btnStop.classList.remove("ativo");
            btnLap.disabled = true;
            clearLapTimes();
        }

        function lap() {
            let lapTime = `${pad(hr)}:${pad(min)}:${pad(seg)}:${pad(ms)}`;
            appendLapTime(lapTime);
        }

        function updateStopwatchDisplay() {
            stopwatchDisplay.textContent = `${pad(hr)}:${pad(min)}:${pad(seg)}:${pad(ms)}`;
        }

        function pad(value) {
            return value < 10 ? "0" + value : value;
        }

        function clearLapTimes() {
            let lapTimesList = document.getElementById('lapTimes');
            lapTimesList.innerHTML = '';
        }

        function appendLapTime(lapTime) {
            let lapTimesList = document.getElementById('lapTimes');
            let lapItem = document.createElement('li');
            lapItem.textContent = lapTime;
            lapTimesList.appendChild(lapItem);
        }

        btnStart.addEventListener("click", start);
        btnStop.addEventListener("click", stop);
        btnReset.addEventListener("click", reset);
        btnLap.addEventListener("click", lap);
    </script>
</body>
</html>
