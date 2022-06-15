<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                return view('admin.product');
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }

        else
        {
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request)
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $data=new product;

                $image=$request->file;

                $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->file->move('productimage',$imagename);

                $data->image=$imagename;

                $data->title=$request->title;
                $data->price=$request->price;
                $data->description=$request->des;
                $data->quantity=$request->quantity;

                $data->save();

                return redirect()->back()->with('message','Product Added Successfully');
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }
        
        else
        {
            return redirect('login');
        }
    }

    public function showproduct()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $data=product::all();
        
                return view('admin.showproduct',compact('data'));
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }
            
        else
        {
            return redirect('login');
        }
    }

    public function deleteproduct($id)
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $data=product::find($id);

                $data->delete();

                return redirect()->back()->with('message','Product Delete');
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }
            
        else
        {
            return redirect('login');
        }
    }

    public function updateview($id)
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $data=product::find($id);

                return view('admin.updateview',compact('data'));
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }
            
        else
        {
            return redirect('login');
        }
    }
    
    public function updateproduct(Request $request ,$id)
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $data=product::find($id);

                $image=$request->file;

                if($image)
                {
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->file->move('productimage',$imagename);
                    $data->image=$imagename;
                }

                $data->title=$request->title;
                $data->price=$request->price;
                $data->description=$request->des;
                $data->quantity=$request->quantity;

                $data->save();

                return redirect()->back()->with('message','Product Updated');
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }

        else
        {
            return redirect('login');
        }
    }

    public function showorder()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $order = order::all();

                return view('admin.showorder',compact('order'));
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }

        else
        {
            return redirect('login');
        }
    }

    public function updatestatus($id)
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $order = order::find($id);

                $order->status='Delivered';

                $order->save();

                return redirect()->back();
            }

            else
            {
                return redirect()->back()->with('message','Only Admin Can Access This URL');
            }
        }

        else
        {
            return redirect('login');
        }
    }
}
