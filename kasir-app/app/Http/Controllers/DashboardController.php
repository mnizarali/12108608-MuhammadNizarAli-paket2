<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailSale;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /// Dashboard - view user 
    public function viewUser()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('pages.user.index', compact('users'));
    }
    // Function - view register
    public function register()
    {
        return view('auth.register');
    }
    // function - view update user
    public function viewUpdateUser()
    {
        return view('pages.user.edit');
    }
    // Function add user
    public function createUser(Request $request)
    {
        $request->validate([
            "name"      => "required",
            "email"     => "required",
            "password"  => "required",
            "role"      => "required",
        ]);

        $user = User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => bcrypt($request->password),
            "role"     => $request->role
        ]);

        return redirect('/dashboard/user')->with('success', 'add user success');
    }
    //function delete user
    public function deleteUser($id)
    {
        $user = User::find($id)->first();
        $user->delete();
        return back()->with('success', 'user deleted');
    }
    // function update user
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            "name"      => "required",
            "email"     => "required",
            "password"  => "required",
            "role"      => "required",
        ]);
        $user = User::find($id);
        $user->update([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => bcrypt($request->password),
            "role"     => $request->role
        ]);
        return back()->with('success', 'user updated');
    }
    /// Dashboard - Product Stock - view
    public function viewProduct()
    {
        $products = Product::OrderBy('id', 'desc')->paginate(10);
        return view('pages.product.index', compact('products'));
    }
    // Function add product
    public function createProduct(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "img" => "required",
        ]);

        $file = $request->img;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/product/img';
        $file->move(public_path($path), $filename);

        //generate code
        $now = Carbon::now();
        $yearMonthDay = $now->format('y') . $now->format('m') . $now->format('d');
        $producutCount = Product::count();
        $code = false;

        if ($producutCount == 0) {
            $code = "P" . $yearMonthDay . "1";
        } else {
            $code = "P" . $yearMonthDay . ($producutCount + 1);
        }

        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "code"  => $code,
            "img"  => $filename
        ]);

        return back()->with('success', 'data product created');
    }
    //function tambah stock
    public function addStock(Request $request, $id) {
       $request->validate(["stock"=>"required"]);
        $stock = Product::find($id);

        $stock->update(["stock" => $stock->stock + $request->stock]);

        return back()->with('success', 'updated');
        
    }
    //function edit data
    public function updateStock(Request $request, $id){
        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);

        $product = Product::find($id);

        $product->update([
            "name" => $request->name,
            "price" => $request->price
        ]);

        return back()->with('success', 'data updated');
    }
    /// Dashboard - Sales - Form fields
    public function viewSale() {
        $products = Product::all();
        return view('pages.sales.index', compact('products'));
    }
    //function confirm payment - sales
    public function confirmPayment(Request $request)
    {
        $products = [];
        $codes = $request->code;
        $qtys = $request->quantity;

        foreach ($codes as $index => $code) {
            $products[] = [
                "code" => $code,
                "qty" => $qtys[$index]
            ];
        }

        $codeSearch = array_column($products, 'code');
        $produks = Product::whereIn('code', $codeSearch)->get();

        $errorMessage = [];

        foreach ($products as $product) {
            $locate = false;
            foreach ($produks as $produk) {
                if ($product['code'] == $produk->code) {
                    $locate = true;
                    if ($product['qty'] > $produk->stock) {
                        $errorMessage[] = "Stok barang " . $produk->name . "tidak mencukupi";
                    }
                    break;
                }
            }
            if (!$locate) {
                $errorMessage[] = $product["code"];
            }
        }

        if (!empty($errorMessage)) {
            return back()->with('fail', $errorMessage);
        }

        $name   = $request->name;
        $phone   = $request->phone;
        $address = $request->address;
        session([
            "produk" => $products,
            "pelanggan" => [
                "name"    => $name,
                "phone"    => $phone,
                "address"  => $address
            ]
        ]);

        return view('pages.sales.confirmPayment', compact([
            "name",
            "phone",
            "address",
            "products",
            "produks"
        ]));
    }

    public function pdfInvoice()
    {
        $products = session("produk");
        $codeSearch = array_column($products, 'code');
        $items = Product::whereIn('code', $codeSearch)->get();
        $total_price = 0;

        foreach ($items as $item) {
            foreach ($products as $product) {
                if ($product["code"] == $item->code) {
                    $price = $product["qty"] * $item->price;
                    $total_price += $price;
                }
            }
        }

        $customers = session("pelanggan");
        $name = $customers['name'];
        $address = $customers['address'];
        $phone = $customers['phone'];

        return view('pages.sales.invoice', compact([
            "name",
            "address",
            "phone",
            "products",
            "items",
            "total_price"
        ]));
    }

    public function backToPembelian()
    {
        $products = session("produk");
        $codeSearch = array_column($products, 'code');
        $items = Product::whereIn('code', $codeSearch)->get();
        $total_price = 0;

        foreach ($items as $item) {
            foreach ($products as $product) {
                if ($product["code"] == $item->code) {
                    $price = $product["qty"] * $item->price;
                    $total_price += $price;
                }
            }
        }
        
        $customers = session("pelanggan");
        $name = $customers['name'];
        $address = $customers['address'];
        $phone = $customers['phone'];
        $customer = Customer::create([
            "name" => $name,
            "phone" => $phone,
            "address" => $address
        ]);

        $penjualan = Sale::create([
            "customer_id" => $customer->id,
            "sale_date" => now(),
            "total_price" => $total_price,
            "user_id" => auth()->user()->id
        ]);

        foreach ($items as $item) {
            foreach ($products as $product) {
                if ($product["code"] == $item->code) {
                    DetailSale::create([
                        'sale_id' => $penjualan->id,
                        'product_id' => $item->id,
                        'quantity' => $product["qty"],
                        'subtotal' => $item->price * $product["qty"]
                    ]);

                    $productUpdate = Product::find($item->id);
                    $stock = $productUpdate->stock - $product["qty"];
                    $productUpdate->update([
                        "Stock" => $stock
                    ]);
                }
            }
        }

        return redirect('/dashboard/sales')->with('success', 'transaksi berhasil');
    }

    public function viewHistory() {
        $historys = Sale::with(['customer', 'user'])->get();
        return view('pages.sales.history', compact('historys'));
    }
    
}
