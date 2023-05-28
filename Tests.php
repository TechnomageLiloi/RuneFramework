<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Rune Framework Tests</title>

  <link rel="shortcut icon" type="image/png" href="/Tests/Jasmine/jasmine_favicon.png">
  <link rel="stylesheet" href="/Tests/Jasmine/jasmine.css">

  <script src="/Tests/Jasmine/jasmine.js"></script>
  <script src="/Tests/Jasmine/jasmine-html.js"></script>
  <script src="/Tests/Jasmine/boot0.js"></script>
  <!-- optional: include a file here that configures the Jasmine env -->
  <script src="/Tests/Jasmine/boot1.js"></script>

  <!-- include spec files here... -->
  <script src="/Tests/CheckTest.js"></script>

</head>

<div style="background-color: black; color: white;padding: 5px;margin: 0px;">
    <?php echo str_replace("\n", "<br/>", shell_exec('phpunit')); ?>
</div>

<hr/>

<body>
</body>
</html>
