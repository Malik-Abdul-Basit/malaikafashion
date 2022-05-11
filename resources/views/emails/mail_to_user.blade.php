<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Hello <i>{{ $ToName }}!</i></h2>
    <p>{!! $MessageForReceiver !!}</p>
    <p>{!! $SenderMessage !!}</p>
    <br/><br/>
      Thank You,
    <br/>
    <a href="mailto:{{$SenderEmail}}">{{ $SenderEmail }}</a>
  </body>
</html>