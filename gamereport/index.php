<head>
    <link rel="stylesheet" href="../app.css">
    <script src="jquery.js"></script>
    <script type="text/javascript" src="gamereport/gr.js"></script>
</head>
<body>
    <h1>Report Game Reslts</h1>
    Opponent username: <input type="text" id="u2"><br>
    Did you win? 
    <select id="winner">
        <option>Yes</option>
        <option>No</option>
    </select></br>
    League ID (If this was a league match): <input type="number" id="id"><br>
    Season Number (If this was a season match): <input type="number" id="sn"><br>
    <br>
    <button onclick="submit()">Submit</button><br>
    <p style="color: red" id="error"></p>
</body>
