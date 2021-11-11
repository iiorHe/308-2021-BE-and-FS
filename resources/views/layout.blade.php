<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>@yield("app-title")</title>
</head>
<body>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/project">Project</a></li>
    <li><a href="/credits">Credits</a></li>
</ul>
<h1>@yield("page-title")</h1>

@yield("page-content")
</body>
</html>
