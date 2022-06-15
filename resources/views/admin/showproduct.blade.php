<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

  <body>
    
      @include('admin.sidebar')

      <!-- partial -->
      
      @include('admin.navbar')

        <!-- partial -->
        
        <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
            <div class="container" align="center">

                @if(session()->has('message'))        
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                        {{session()->get('message')}}
                    </div>
                @endif
            
                <table>
                    <tr style="background-color: #000080;">
                        <td style="padding:20px;">
                            Title
                        </td>
                        <td style="padding:20px;">
                            Description
                        </td>
                        <td style="padding:20px;">
                            Quantity
                        </td>
                        <td style="padding:20px;">
                            Price
                        </td>
                        <td style="padding:20px;">
                            Image
                        </td>
                        <td style="padding:20px;">
                            Edit
                        </td>
                        <td style="padding:20px;">
                            Delete
                        </td>
                    </tr>

                    @foreach($data as $product)

                    <tr align="center" style="background-color: #ADD8E6;">
                        <td style="color: black;">
                            {{$product->title}}
                        </td>
                        <td style="color: black;">
                            {{$product->description}}
                        </td>
                        <td style="color: black;">
                            {{$product->quantity}}
                        </td>
                        <td style="color: black;">
                            {{$product->price}}
                        </td>
                        <td>
                            <img height="150px" width="150px" src="/productimage/{{$product->image}}">
                        </td>
                        <td>
                            <a href="{{url('updateview',$product->id)}}" class="btn btn-primary">
                                <i class='fa fa-pencil fa-fw'></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{url('deleteproduct',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class='fa fa-trash fa-fw'></i>
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