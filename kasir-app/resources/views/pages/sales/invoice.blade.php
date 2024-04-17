<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Invoice - </title>
  <link rel="stylesheet" href="{{ asset('css/invoice.css')}}" media="all" />
</head>

<body>
  <header class="clearfix">
    <h1>Cashier invoice </h1>
    <div id="company" class="clearfix">
      <div>Toko Cashier</div>
      <div>STAFF : </div>
    </div>
    <div id="project">
      <div><span>ClIENT :</span></div>
      <div><span>ADDRESS :</span> </div>
      <div><span>PHONE :</span> </div>
      <div><span>DATE : </span></div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th class="no">NO</th>
          <th class="product">DESCRIPTION</th>
          <th>PRICE</th>
          <th>QTY</th>
          <th>TOTAL</th>
        </tr>
      </thead>
      <tbody>





      
            <tr>
              <td class="no"></td>
              <td class="product"></td>
              <td class="unit"></td>
              <td class="qty"></td> 
              <td class="total"></td>
            </tr>
            
            





        <tr>
          <td colspan="4" class="grand total">GRAND TOTAL</td>
          <td class="grand total"> </td>
        </tr>
      </tbody>
    </table>
  </main>
  <footer>
    Invoice ini valid walau tanpa tanda tangan.
  </footer>
  <script>
    window.onload = function() {
      window.print();
      setTimeout(function() {
        window.close();
      }, 3000);
    }

    window.onafterprint = function() {
      window.close();
    }

    window.onbeforeunload = function() {
      window.close();
    }
  </script>
</body>

</html>