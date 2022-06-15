<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

  <body>
    
      @include('admin.sidebar')

      <!-- partial -->
      
      @include('admin.navbar')

        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <table>
                    <tr style="background-color: #000080;">
                        <td style="padding: 20px; color: white;">
                            Customer Name
                        </td>
                        <td style="padding: 20px; color: white;">
                            Phone
                        </td>
                        <td style="padding: 20px; color: white;">
                            Address
                        </td>
                        <td style="padding: 20px; color: white;">
                            Product Title
                        </td>
                        <td style="padding: 20px; color: white;">
                            Price
                        </td>
                        <td style="padding: 20px; color: white;">
                            Quantity
                        </td>
                        <td style="padding: 20px; color: white;">
                            Status
                        </td>
                        <td style="padding: 20px; color: white;">
                            Action
                        </td>
                    </tr>

                    @foreach($order as $orders)

                    <tr align="center" style="background-color: #ADD8E6;">
                        <td style="padding: 20px; color: black;">
                            {{$orders->name}}
                        </td>
                        <td style="padding: 20px; color: black;">
                            {{$orders->phone}}
                        </td>
                        <td style="padding: 20px; color: black;">
                            {{$orders->address}}
                        </td>
                        <td style="padding: 20px; color: black;">
                            {{$orders->product_name}}
                        </td>
                        <td style="padding: 20px; color: black;">
                            {{$orders->quantity}}
                        </td>
                        <td style="padding: 20px; color: black;">
                            {{$orders->price}}
                        </td>
                        <td style="padding: 20px; color: black;">
                            {{$orders->status}}
                        </td>
                        <td style="padding: 20px;">
                            <a href="{{url('updatestatus',$orders->id)}}" class="btn btn-success">
                                <i class="fas fa-shipping-fast"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>

          <!-- partial -->
        
        @include('admin.script')

  </body>
</html>