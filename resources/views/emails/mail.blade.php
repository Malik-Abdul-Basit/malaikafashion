<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    @if($MailSubject=='Order Placed')
      <h3>Hello Dear {{ $ToName }}!</h3>
      @if($MailFor=='admin')
        <p> You Have New Order. </p>
        <h4>Order Detail Below</h4>
        <table width="70%" border="1" cellspacing="0" cellpadding="5">
          <tbody>
            <tr>
              <th scope="row">Tracking Id or Booking Ref.</th>
              <td>SK-BKI-0{{ $TrackingId }}</td>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td>{{ $SenderName }}</td>
            </tr>
            <tr>
              <th scope="row">Phone #</th>
              <td>{{ $Phone }}</td>
            </tr>
            <tr>
              <th scope="row">Email </th>
              <td>{{ $SenderEmail }}</td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td>{{ $address }}</td>
            </tr>
            <tr>
              <th scope="row">Product Code</th>
              <td>Sk-Pr-0{{ $product_id }}</td>
            </tr>
            <tr>
              <th scope="row">Product Name</th>
              <td>{{ $product_name }}</td>
            </tr>
            <tr>
              <th scope="row">Quantity</th>
              <td>{{ $QTY }}</td>
            </tr>
          </tbody>
        </table>
      @elseif($MailFor=='user')
        <p> Your Order Successfully Placed. </p>
        <h4>Order Detail Below</h4>
        <table width="70%" border="1" cellspacing="0" cellpadding="5">
          <tbody>
            <tr>
              <th scope="row">Tracking Id or Booking Ref.</th>
              <td>SK-BKI-0{{ $TrackingId }}</td>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td>{{ $ToName }}</td>
            </tr>
            <tr>
              <th scope="row">Phone #</th>
              <td>{{ $Phone }}</td>
            </tr>
            <tr>
              <th scope="row">Email </th>
              <td>{{ $ToEmail }}</td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td>{{ $address }}</td>
            </tr>
            <tr>
              <th scope="row">Product Code</th>
              <td>Sk-Pr-0{{ $product_id }}</td>
            </tr>
            <tr>
              <th scope="row">Product Name</th>
              <td>{{ $product_name }}</td>
            </tr>
            <tr>
              <th scope="row">Quantity</th>
              <td>{{ $QTY }}</td>
            </tr>
          </tbody>
        </table>
        <p>
          Thank you for choosing to shop with <a href="http://silklondonltd.com/">silklondonltd.com</a>.<br>
          Our representative will contact back you soon.
        </p>
      @endif
      <br/><br/>
      Thanks,
      <br/>
      <a href="mailto:{{$SenderEmail}}?subject=Your Reply">{{ $SenderEmail }}</a>
    @endif
  </body>
</html>
