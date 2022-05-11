<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  @if($MailSubject=='Contact Us User Message' || $MailSubject=='Request Received')
    <h3>Hello Dear {{ $ToName }}!</h3>
    @if($MailFor=='admin')
      <p> You Have New Message. </p>
      <h4>Detail Below</h4>
      <table width="70%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <th scope="row">Name</th>
            <td>{{ $SenderName }}</td>
          </tr>
          <tr>
            <th scope="row">Email </th>
            <td>{{ $SenderEmail }}</td>
          </tr>
          <tr>
            <th scope="row">Phone #</th>
            <td>{{ $Phone }}</td>
          </tr>
          <tr>
            <th scope="row">Message</th>
            <td>{{ $UserMessage }}</td>
          </tr>
        </tbody>
      </table>
    @elseif($MailFor=='user')
      <p> Your Request Successfully Received. </p>
      <h4>Detail Below</h4>
      <table width="70%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <th scope="row">Name</th>
            <td>{{ $ToName }}</td>
          </tr>
          <tr>
            <th scope="row">Email </th>
            <td>{{ $ToEmail }}</td>
          </tr>
          <tr>
            <th scope="row">Phone #</th>
            <td>{{ $Phone }}</td>
          </tr>
          <tr>
            <th scope="row">Message</th>
            <td>{{ $UserMessage }}</td>
          </tr>
        </tbody>
      </table>
      <p>
        Thank you for choosing <a href="http://silklondonltd.com/">silklondonltd.com</a>.<br>
        Our representative will contact back you soon.
      </p>
    @endif
    <br/><br/>
    Thanks,
    <br/>
    <a href="mailto:{{ $SenderEmail }}?subject=Your Reply">{{ $SenderEmail }}</a>
  @endif
  </body>
</html>
